@extends('layouts.app')

@section('content')
    <div class="col-md-6 ml-5">
        <div class="card bg-white">
            <div class="card-header bg-white text-dark">EDITER VOTRE POST</div>
            <div class="container bg-white card-body">
                <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title"
                               value="{{ old('post_title') ?? $post->post_title  }}" placeholder="Titre" name="post_title">
                        @error('post_title')
                        <div class="invalid-feedback">
                            {{$errors->first('post_title')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('post_type') is-invalid @enderror " id="post_type"
                               value="{{ old('post_type') ?? $post->post_type }}" placeholder="Type de l'article" name="post_type">
                        @error('post_type')
                        <div class="invalid-feedback">
                            {{$errors->first('post_type')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea type="text" rows="8" class="form-control  @error('post_content') is-invalid @enderror" id="post_content"
                                  value="{{ old('post_content') ?? $post->post_content }}" placeholder="Contenu de l'article" name="post_content"></textarea>
                        @error('post_content')
                        <div class="invalid-feedback">
                            {{$errors->first('post_content')}}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                   id="image" aria-describedby="inputGroupFileAddon04" name="image">
                            <label class="custom-file-label" for="image">Choisir une image</label>
                        </div>
                        @error('image')
                        <div class="invalid-feedback">
                            {{$errors->first('image')}}
                        </div>
                        @enderror
                        <div class="input-group-append mb-2">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Image</button>
                        </div>
                    </div>

                    <div class="d-flex">
                        <button class="btn btn-secondary mr-2">METTRE À JOUR</button>
                        <a class="btn btn-secondary mr-2" href="/welcome">ANNULER</a>
                    </div>
                </form>
            </div>

        </div>

    </div>


@endsection
