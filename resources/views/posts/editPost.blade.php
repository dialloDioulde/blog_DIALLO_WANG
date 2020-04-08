@extends('layouts.app')

@section('content')
    <div class="container border">
        <br>
        <div class="card mt-5 ml-5 mr-5 mb-5">
            <div class="card-header bg-info text-white">Publier Votre Post</div>
            <div class="container card-body">
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
                        <textarea type="text" rows="5" class="form-control  @error('post_content') is-invalid @enderror" id="post_content"
                                  value="{{ old('post_content') ?? $post->post_content }}" placeholder="Contenu de l'article" name="post_content"></textarea>
                        @error('post_content')
                        <div class="invalid-feedback">
                            {{$errors->first('post_content')}}
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Publier</button>
                </form>
            </div>

        </div>

    </div>


@endsection
