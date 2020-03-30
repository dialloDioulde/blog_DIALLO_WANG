@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="ml-5 w-75 container-fluid">
                <div class="card my-5 justify-content-center ">
                    <div class="card-header bg-dark text-white">Commentez l'actualité</div>
                    <div class="container card-body">

                        <form action= "{{route('addComment.update', $comment->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('comment_name') is-invalid @enderror " id="comment_name"
                                       value="{{ old('comment_name') ?? $comment->comment_name }}" placeholder="Votre Nom" name="comment_name">
                                @error('comment_name')
                                <div class="invalid-feedback">
                                    {{$errors->first('comment_name')}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control  @error('comment_email') is-invalid @enderror" id="comment_email"
                                       value="{{ old('comment_email') ?? $comment->comment_email }}" placeholder="Votre Email" name="comment_email">
                                @error('comment_email')
                                <div class="invalid-feedback">
                                    {{$errors->first('comment_email')}}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                <textarea type="text" rows="8" class="form-control @error('comment_content') is-invalid @enderror" id="comment_content"
                          value="{{ old('comment_content') ?? $comment->comment_content }}" placeholder="Votre Commentaire" name="comment_content"></textarea>
                                @error('comment_content')
                                <div class="invalid-feedback">
                                    {{$errors->first('comment_content')}}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary bg-dark">Commenter</button>
                        </form>

                    </div>
                </div>
        </div>
    </div>




@endsection
