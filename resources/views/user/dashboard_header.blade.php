<div class="dashboard-group">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-dt">
                    <div class="user-img">
                        <img src="{{URL('assets/images/avatar/img-21.jpg')}}"
                             alt="{{$UserData->BillingFirstName .' ' . $UserData->BillingLastName}}" id="CustomerProfilePicture">
                        <div class="img-add">
                            <input type="file" id="ProfilePicture" name="ProfilePicture">
                            <label for="ProfilePicture"><i class="uil uil-camera-plus"></i></label>
                        </div>
                    </div>
                    <h4>{{$UserData->BillingFirstName .' ' . $UserData->BillingLastName}}</h4>
                    <p>{{$UserData->UserEmail}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
