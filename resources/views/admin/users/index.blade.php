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
                    <div class="card-header text-center text-dark bg-info">{{ __('LISTE DES UTILISATEURS') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rôle(s)</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(',', $user->roles()->get()->pluck('name')->toArray())}}</td>

                                    <td>
                                        <div class="d-flex">
                                           <div class="mr-2">
                                               @can('edit-users')
                                                   <a href=" {{ route('users.edit', $user->id) }}"class="btn btn-primary "><i class="fa fa-pencil"></i></a>
                                               @endcan
                                           </div>
                                            @can('delete-users')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row d-flex justify-content-center mt-2">
        {{$users->links()}}
    </div>
    <div>
        <a href="/welcome"><button class="btn btn-info offset-5 mt-2">PAGE D'ACCUEIL</button></a>
    </div>
@endsection
