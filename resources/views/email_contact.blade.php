@extends('layouts/app')

@section('content')

    <div class="container-fluid">
        <h2>Prise de contact sur mon beau site</h2>
        <p>Réception d'une prise de contact avec les éléments suivants :</p>
        @foreach($contacts as $contact)
            <ul>
                <li><strong>Nom</strong> : {{ $contact->contact_name }}</li>
                <li><strong>Email</strong> : {{ $contact->contact_email }}</li>
                <li><strong>Message</strong> : {{ $contact->contact_message }}</li>
            </ul>
        @endforeach
    </div>

@endsection
