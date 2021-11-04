@component('mail::message')
    <p>Dear {{$customer->BillingFirstName . " " . $customer->BillingLastName}},</p>
    <p>You have requested to change password. Please click on the below link to reset the password within 24 hours</p>
    @component('mail::button', ['url' => $url])
        Change Password
    @endcomponent
    <p>Thanks,</p>
    {{ config('app.name') }}
@endcomponent
