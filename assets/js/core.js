// === QTY JS === //
function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function (a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}

String.prototype.getDecimals || (String.prototype.getDecimals = function () {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function () {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function () {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function () {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});

// wishlist script //
$(document).ready(function () {
    $('.like-icon, .like-button').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('liked');
        $(this).children('.like-icon').toggleClass('liked');
    });
});

// menu script //
$(document).ready(function () {
    var fixHeight = function () {
        $(".navbar-nav").css(
            "max-height",
            document.documentElement.clientHeight - 8000
        );
    };

    fixHeight();

    $(window).resize(function () {
        fixHeight();
    });

    $(".navbar .navbar-toggler").on("click", function () {
        fixHeight();
    });

    $(".navbar-toggler, .overlay").on("click", function () {
        $(".mobileMenu, .overlay").toggleClass("open");
        console.log("clicked");
    });
});
// === Dropdown === //

$('.ui.dropdown')
    .dropdown()
;

$('.dropdown').dropdown({transition: 'drop', on: 'hover'});

// === Tab === //
$('.menu .item')
    .tab()
;

// === checkbox Toggle === //
$('.ui.checkbox')
    .checkbox()
;

// === Toggle === //
$('.enable.button')
    .on('click', function () {
        $(this)
            .nextAll('.checkbox')
            .checkbox('enable')
        ;
    })
;


// Payment Method Accordion //
$('input[name="paymentmethod"]').on('click', function () {
    var $value = $(this).attr('value');
    $('.return-departure-dts').slideUp();
    $('[data-method="' + $value + '"]').slideDown();
});


//  Countdown //
$(".product_countdown-timer").each(function () {
    var $this = $(this);
    $this.countdown($this.data('countdown'), function (event) {
        $(this).text(
            event.strftime('%D days %H:%M:%S')
        );
    });
});


// === Banner Home === //
$('.offers-banner').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        },
        1200: {
            items: 3
        },
        1400: {
            items: 3
        }
    }
})

// Category Slider
$('.cate-slider').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        },
        1200: {
            items: 6
        },
        1400: {
            items: 6
        }
    }
})

// Featured Slider
$('.featured-slider').owlCarousel({
    items: 8,
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        },
        1200: {
            items: 4
        },
        1400: {
            items: 5
        }
    }
})

// === Date Slider === //
$('.date-slider').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 3
        },
        600: {
            items: 4
        },
        1000: {
            items: 5
        },
        1200: {
            items: 6
        },
        1400: {
            items: 7
        }
    }
})

// === Banner Home === //
$('.life-slider').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        },
        1200: {
            items: 3
        },
        1400: {
            items: 3
        }
    }
})

// === Testimonials Slider === //
$('.testimonial-slider').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        },
        1200: {
            items: 3
        },
        1400: {
            items: 3
        }
    }
})

// Category Slider
$('.team-slider').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        },
        1200: {
            items: 4
        },
        1400: {
            items: 4
        }
    }
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on("click", ".edit-billing-address", function (e) {
    var addressid = $(this).attr("data-addressid");
    if (addressid) {
        $("#save_billing").attr("data-action", "edit").attr("data-addressID", addressid);
        $.ajax({
            url: base + "ajax/get_address",
            type: "POST",
            data: {
                addressid: addressid,
                addresstype: "billing"
            },
            success: function (data) {
                $("#BillingTitle").val(data.BillingTitle);
                $("#BillingFirstName").val(data.BillingFirstName);
                $("#BillingLastName").val(data.BillingLastName);
                $("#BillingCompanyName").val(data.BillingCompanyName);
                $("#BillingEmail").val(data.BillingEmail);
                $("#BillingMobile").val(data.BillingMobile);
                $("#BillingAddress1").val(data.BillingAddress1);
                $("#BillingAddress2").val(data.BillingAddress2);
                $("#BillingTownCity").val(data.BillingTownCity);
                $("#BillingCountyState").val(data.BillingCountyState);
                $("#BillingPostCode").val(data.BillingPostCode);
                $("#BillingCountry").val(data.BillingCountry);
            }
        });
    }
});

$(document).on("click", ".add-billing-address", function (e) {
    $("#save_billing").attr("data-action", "add");
    $("#billing_address").trigger('reset');
});
$(document).on("click", ".edit-delivery-address", function (e) {
    var addressid = $(this).attr("data-addressid");
    if (addressid) {
        $("#save_delivery").attr("data-action", "edit").attr("data-addressID", addressid);
        $.ajax({
            url: base + "ajax/get_address",
            type: "POST",
            data: {
                addressid: addressid,
                addresstype: "delivery"
            },
            success: function (data) {
                $("#DeliveryTitle").val(data.DeliveryTitle);
                $("#DeliveryFirstName").val(data.DeliveryFirstName);
                $("#DeliveryLastName").val(data.DeliveryLastName);
                $("#DeliveryCompanyName").val(data.DeliveryCompanyName);
                $("#DeliveryEmail").val(data.DeliveryEmail);
                $("#DeliveryMobile").val(data.DeliveryMobile);
                $("#DeliveryAddress1").val(data.DeliveryAddress1);
                $("#DeliveryAddress2").val(data.DeliveryAddress2);
                $("#DeliveryTownCity").val(data.DeliveryTownCity);
                $("#DeliveryCountyState").val(data.DeliveryCountyState);
                $("#DeliveryPostCode").val(data.DeliveryPostCode);
                $("#DeliveryCountry").val(data.DeliveryCountry);
            }
        });
    }
});

$(document).on("click", ".add-delivery-address", function (e) {
    $("#save_delivery").attr("data-action", "add");
    $("#delivery_address").trigger('reset');
});
$(document).on("click", "#save_billing", function (e) {
    submit($(this), $('#billing_address'))
});
$(document).on("click", "#login_btn", function (e) {
    submit($(this), $('#login_form'))
});

$(document).on("click", "#register_btn", function (e) {
    submit($(this), $('#register_form'),true)
});


