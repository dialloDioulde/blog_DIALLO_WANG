@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"><strong>BLOG DIALLO & WANG</strong></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 mt-2 offset-3 bg-white">
        <strong><p>PRISE DE RENDEZ-VOUS DEPUIS LE SITE WEB :</p></strong>
        @foreach($contacts as $contact)
           <div class="col-md-6 border-bottom">
               <div class="row mt-3">
                   <strong>{{ $contact->contact_name }} : </strong>
                   {{ $contact->contact_message }} et voici mon mail
                   ({{ $contact->contact_email }})
               </div>

           </div>

        @endforeach
    </div>

    <div class="row d-flex justify-content-center mt-2">
        {{$contacts->links()}}
    </div>

    <div>
        <a href="/welcome"><button class="btn btn-info offset-5">PAGE D'ACCUEIL</button></a>
    </div>

@endsection
