@extends('layouts/app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"><strong>BLOG DIALLO & WANG</strong></p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="card">
                    <div class="card-header bg-white text-dark">Contactez-moi</div>
                    <div class="container card-body">
                        <form action="{{route('contatcs.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('contact_name') is-invalid @enderror " id="contact_name"
                                       value="{{ old('contact_name') }}" placeholder="Votre Nom" name="contact_name">
                                @error('contact_name')
                                <div class="invalid-feedback">
                                    {{$errors->first('contact_name')}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control  @error('contact_email') is-invalid @enderror" id="contact_email"
                                       value="{{ old('contact_email') }}" placeholder="Votre Email" name="contact_email">
                                @error('contact_email')
                                <div class="invalid-feedback">
                                    {{$errors->first('contact_email')}}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                <textarea type="text" rows="8" class="form-control @error('contact_message') is-invalid @enderror" id="contact_message"
                          value="{{ old('contact_message') }}" placeholder="Votre Message" name="contact_message"></textarea>
                                @error('contact_message')
                                <div class="invalid-feedback">
                                    {{$errors->first('contact_message')}}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-info">Envoyer</button>
                        </form>
                        <div>
                            <a href="/welcome"><button class="btn btn-info offset-4 mt-2">PAGE D'ACCUEIL</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



