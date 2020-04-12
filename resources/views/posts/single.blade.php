@extends('layouts/app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"><strong>BLOG DIALLO & WANG</strong></p>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="">
            @foreach( $post as $posts)
                <h2>{{$posts->author->name}} :</h2>
                <div class="row">
                    <div class="col-md-6">
                        {{$posts->post_content}}
                    </div>
                    <div class="col-md-4">
                        @if($posts->image)
                            <img class="img-thumnnail" src="{{asset('images/posts/' . $posts->image)}}" width="400">
                        @endif
                    </div>

                    <div class="col-md-2">
                        <div class="d-flex ml-4">
                            @can('update', $posts)
                                <a href="{{route('post.edit', $posts->id)}}" class="btn btn-primary mr-2 offset-md-10"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('delete', $posts)
                                <form action="{{route('post.delete', $posts->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <div class="col">
                        <p><strong>{{$posts->post_type}}</strong> publié le {{$posts->created_at}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white text-dark">Commentez l'actualité</div>
                            <div class="container card-body">
                                <form action= "{{route('addComment.store', $posts->id)}}" method="POST" id="addCom">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('comment_name') is-invalid @enderror " id="comment_name"
                                               value="{{ old('comment_name') }}" placeholder="Votre Nom" name="comment_name">
                                        @error('comment_name')
                                        <div class="invalid-feedback">
                                            {{$errors->first('comment_name')}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control  @error('comment_email') is-invalid @enderror" id="comment_email"
                                               value="{{ old('comment_email') }}" placeholder="Votre Email" name="comment_email">
                                        @error('comment_email')
                                        <div class="invalid-feedback">
                                            {{$errors->first('comment_email')}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    <textarea type="text" rows="8" class="form-control @error('comment_content')
                                        is-invalid @enderror" id="comment_content" value="{{ old('comment_content') }}"
                                              placeholder="Votre Commentaire" name="comment_content"></textarea>
                                        @error('comment_content')
                                        <div class="invalid-feedback">
                                            {{$errors->first('comment_content')}}
                                        </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-info" id="">Commenter</button>
                                </form>
                            </div>
                        </div>
                        <!-- Fin d'ajout des Commentaires -->
                    </div>

                    <div class="col-md-6">
                        <h2>Les Commenatires : </h2>
                        @foreach($posts->comments()->latest()->get() as $comment)
                            <div class="mb-2">
                                <strong>{{$comment->user->name}}</strong>:
                                {{$comment->comment_content}},
                                {{$comment->created_at->diffForHumans()}}
                            </div>

                            <div class="d-flex mb-2 offset-11">
                                @can('update', $comment)
                                    <a href="{{route('addComment.edit', $comment->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                @endcan

                                @can('delete', $comment)
                                    <form action="{{route('addComment.delete', $comment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ml-1"><i class="fa fa-trash"></i></button>
                                    </form>
                                @endcan
                            </div>


                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


