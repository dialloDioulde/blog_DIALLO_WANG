@component('mail::message')
# Bonjour

Vous avez reçu un message de la part de {{$contact['contact_name']}} ({{$contact['contact_email']}}).

Message
{{$contact['contact_message']}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
