<div class="dashboard-group">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-dt">
                    <div class="user-img">
                        <img src="{{URL('assets/images/avatar/img-5.jpg')}}" alt="">
                        <div class="img-add">
                            <input type="file" id="file">
                            <label for="file"><i class="uil uil-camera-plus"></i></label>
                        </div>
                    </div>
                    <h4>{{$UserData->BillingFirstName .' ' . $UserData->BillingLastName}}</h4>
                    <p>{{$UserData->UserEmail}}<a href="#"><i class="uil uil-edit"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
