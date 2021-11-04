@component('mail::message')
    <p>Dear {{$customer->BillingFirstName . " " . $customer->BillingLastName}},</p>
    <p>You account is registered on our website. In order to activate your account, please click on the link below</p>
    @component('mail::button', ['url' => $url])
        Activate Account
    @endcomponent
    <p>Thanks,</p>
    {{ config('app.name') }}
@endcomponent
