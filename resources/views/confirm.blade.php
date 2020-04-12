@extends('layouts/app')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"><strong>BLOG DIALLO & WANG</strong></p>
            </div>
        </div>
    </div>


    <div class="col-md-6 mt-5 bg-white ml-5">
        <div class="card-header">
            <h4 class="container card-body">Contactez-moi</h4>
            <div class="card-body">
                <p class="card-text">Merci. Votre message a été transmis à l'administrateur du site. Vous recevrez une réponse rapidement.</p>
            </div>
            <div>
                <a href="/welcome"><button class="btn btn-info">PAGE D'ACCUEIL</button></a>
            </div>
        </div>
    </div>
@endsection
