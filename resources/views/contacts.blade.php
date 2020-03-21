@extends('layouts/app')


@section('content')

    <div class="container-fluid">
        <div class="container-fluid ">
            <br>
            <div class="card my-5 ml-5">
                <div class="card-header bg-info">Contactez-moi</div>
                <div class="container card-body w-50">
                    <form action="contacts" method="POST">
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

                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection



