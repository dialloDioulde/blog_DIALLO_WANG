@extends('layouts.app')

@section('content')

    <div class="container border-top border-bottom bg-white">
        <div class="card mt-5 ml-5 mr-5 mb-5 col-md-10">
            <div class="card-header bg-white">Créer Votre Post</div>
            <div class="container card-body ">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title"
                               value="{{ old('post_title') }}" placeholder="Titre" name="post_title">
                        @error('post_title')
                        <div class="invalid-feedback">
                            {{$errors->first('post_title')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_type') is-invalid @enderror " id="post_type"
                               value="{{ old('post_type') }}" placeholder="Type de l'article" name="post_type">
                        @error('post_type')
                        <div class="invalid-feedback">
                            {{$errors->first('post_type')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea type="text" rows="7" class="form-control  @error('post_content') is-invalid @enderror" id="post_content"
                                  value="{{ old('post_content') }}" placeholder="Contenu de l'article" name="post_content"></textarea>
                        @error('post_content')
                        <div class="invalid-feedback">
                            {{$errors->first('post_content')}}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <button class="btn btn-secondary text-white mr-2">Publier Votre Post</button>
                        <a class="btn btn-secondary mr-2" href="/welcome">ANNULER</a>
                    </div>
                </form>
            </div>

        </div>

    </div>


@endsection
