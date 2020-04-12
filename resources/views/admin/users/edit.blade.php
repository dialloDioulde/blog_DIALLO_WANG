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
                    <div class="card-header text-center bg-info">{{ __('MODIFICATION DES RÔLES') }}</div>

                    <div class="card-body">
                        <form action=" {{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @foreach($roles as $role)
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->id}}"
                                           @foreach($user->roles as $userRole)
                                           @if($userRole->id == $role->id) checked @endif
                                        @endforeach>
                                    <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Modifier Les Rôles</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
