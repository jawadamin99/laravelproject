function validate(a) {
    if ("email" == $(a).attr("type") || "email" == $(a).attr("name")) {
        if (null == $(a).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/)) return !1
    } else if ("name" == $(a).attr("name") || "lname" == $(a).attr("name")) {
        if (null == $(a).val().trim().match(/^[a-z ,.'-]+$/i)) return !1
    } else if ("phone" == $(a).attr("name")) {
        if (null == $(a).val().trim().match(/^(\(?(0|\+44)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/)) return !1
    } else if ("password" == $(a).attr("type") || "password" == $(a).attr("name")) {
        if (2 >= $(a).val().trim().length) return !1
    } else if ("" == $(a).val().trim()) return !1
}

function showValidate(a) {
    var t = $(a).parent();
    $(t).addClass("alert-validate")
}

function hideValidate(a) {
    var t = $(a).parent();
    $(t).removeClass("alert-validate")
}

$(".validate-field").each(function () {
    $(this).focus(function () {
        hideValidate(this)
    })
});

$('.modal').on('hidden.bs.modal', function (e) {
    var fields = $(this).find('.validate-input .validate-field');
    for (var i = 0; i < fields.length; i++) {
        hideValidate(fields[i]);
    }
});

function checkValidation(el) {
    var check = true;
    var fields = $(el).find('.validate-input .validate-field');
    for (var i = 0; i < fields.length; i++) {
        if ($(fields[i]).is(':visible')) {
            if (validate(fields[i]) == false) {
                showValidate(fields[i]);
                check = false;
            }
        }
    }

    return check;
}

function btnWait(el, message) {
    if (!el) {
        return;
    }

    var _spinnerClasses = 'spinner spinner-right spinner-white pr-15';

    el.prop('disabled', true);
    el.addClass(_spinnerClasses);

    el.data('text', el.text());
    el.text(message);
}

function btnRelease(el) {
    if (!el) {
        return;
    }

    var _spinnerClasses = 'spinner spinner-right spinner-white pr-15';

    el.prop('disabled', false);
    el.removeClass(_spinnerClasses);

    el.text(el.data('text'));
    el.removeAttr('data-text');
}

var showPass = 0;
$('.btn-show-pass').on('click', function () {
    if (showPass == 0) {
        $(this).parent().find('input').attr('type', 'text');
        $(this).find('i').removeClass('fa-eye');
        $(this).find('i').addClass('fa-eye-slash');
        showPass = 1;
    } else {
        $(this).parent().next('input').attr('type', 'password');
        $(this).find('i').removeClass('fa-eye-slash');
        $(this).find('i').addClass('fa-eye');
        showPass = 0;
    }
});

// OTP Form (Focusing on next input)
$("#recover-form .form-control").keyup(function () {
    if (this.value.length == 0) {
        $(this).blur().parent().prev().children('.form-control').focus();
    } else if (this.value.length == this.maxLength) {
        $(this).blur().parent().next().children('.form-control').focus();
    }
});

function submit(btn, form, alert = false, reload = false, modal = false) {
    var validate = checkValidation(form);
    if (validate) {
        btnWait(btn, 'Please wait');
        form.ajaxSubmit({
            type: 'post',
            success: function (response) {
                // Release button
                btnRelease(btn);
                if (modal) {
                    modal.find('.btn-close').click();
                }
                toastr.options = {
                    preventDuplicates: true,
                    tapToDismiss: false,
                    newestOnTop: true,
                    progressBar: true,
                };

                if (response.status) {
                    if (alert) {
                        toastr.success('', response.message, {
                            onHidden: function () {
                                if (reload) {
                                    location.reload();
                                } else {
                                    window.location = response.link;
                                }
                            }
                        });
                    } else if (reload) {
                        location.reload();
                    } else {
                        window.location = response.link;
                    }
                } else {
                    toastr.error(response.message);
                }
            }
        });
    }
}
