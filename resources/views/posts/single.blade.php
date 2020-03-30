@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="ml-5 w-75 container-fluid">
            @foreach( $post as $posts)
                <div class="card my-2 bg-dark text-white">
                    <div class="container card-body border">

                        <h2>{{$posts->post_type}}</h2>
                        <p>Catégorie : {{$posts->post_category}}</p>
                        <p>{{$posts->post_content}} </p>
                        <p>Publié par {{$posts->author->name}}</p>
                        <p>Publié par {{$posts->author->email}}</p>

                        <div class="d-flex">
                            @can('update', $posts)
                            <a class="btn btn-warning mr-2" href="{{route('post.edit', $posts->id)}}">EDITER</a>
                            @endcan

                            @can('delete', $posts)
                            <form action="{{route('post.delete', $posts->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger">SUPPRIMER</button>
                            </form>
                            @endcan
                        </div>

                    </div>
                </div>


                <div class="card my-5 justify-content-center ">
                    <div class="card-header bg-dark text-white">Commentez l'actualité</div>
                    <div class="container card-body">
                        <form action= "{{route('addComment.store', $posts->id)}}" method="POST">
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
                <textarea type="text" rows="8" class="form-control @error('comment_content') is-invalid @enderror" id="comment_content"
                          value="{{ old('comment_content') }}" placeholder="Votre Commentaire" name="comment_content"></textarea>
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
                <br/>
            @endforeach

            <div class="card my-2 ml-2 ">
                <div class="container card text-white">
                    @foreach($posts->comments as $comment)
                        <div class="card-body border mb-2 mt-2 bg-dark">
                            <div>
                                {{$comment->user->name}},
                                {{$comment->created_at->diffForHumans()}}
                            </div>
                            <div class="card-body bg-dark">
                                {{$comment->comment_content}}
                            </div>

                            <div class="d-flex">

                                    <a class="btn btn-warning mr-2" href="{{route('addComment.edit', $comment->id)}}">EDITER</a>

                                    <form action="{{route('addComment.delete', $comment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-danger">SUPPRIMER</button>
                                    </form>

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>


@endsection

