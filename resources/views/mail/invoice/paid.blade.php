@component('mail::message')
# Introduction

The body of your message111111.

@component('mail::button', ['url' => $url])
Button Text
@endcomponent
@component('mail::button', ['url' => $url, 'color' => 'green'])
    View Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
