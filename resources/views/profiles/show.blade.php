@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"><strong>BLOG DIALLO & WANG</strong></p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-info">{{ __('MES INFORMATIONS') }}</div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead class="bg-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Date de Création</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(',', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 d-flex">
        <div class="col-md-6 offset-3">
            <a href="{{route('profiles.edit', auth()->id() )}}"><button class="btn btn-info mt-2">Modifier EMAIL & NOM</button></a>
            <a href="{{route('changePassword.create')}}"><button class="btn btn-info mt-2">Changer Mot De Passe</button></a>
            <a href="/welcome"><button class="btn btn-info mt-2">PAGE D'ACCUEIL</button></a>
        </div>
    </div>
@endsection
