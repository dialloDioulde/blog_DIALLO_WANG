@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="ml-5 w-75 container-fluid">
            @foreach( $post as $posts)
                <div class="card my-2">
                    <div class="container card-body">
                        <h2>{{$posts->post_type}}</h2>
                        <div class="border-top border-bottom">
                            <div class="d-flex offset-md-9 mt-2">
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
                            <div class="d-flex col-md-8">
                                <p>{{$posts->post_content}} </p>
                            </div>
                        </div>
                        <p>Publié par {{$posts->author->name}}</p>
                    </div>
                </div>


                <div class="card my-5 justify-content-center">
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
                            <button class="btn btn-secondary bg-secondary" id="">Commenter</button>
                        </form>
                    </div>
                </div>
                <br/>



            @endforeach

            <div class="card my-2 ml-2 bg-white text-dark">
                <div class="container card">
                    @foreach($posts->comments as $comment)
                        <div class="card-body border mb-2 mt-2">
                            <div class="d-flex col-md-6">
                                {{$comment->id}}
                                {{$comment->posts_id}},
                                {{$comment->user->name}},
                                {{$comment->created_at->diffForHumans()}}
                            </div>
                            <div class="">
                                <div class="d-flex offset-md-9">
                                    <a class="btn btn-warning mr-2 editbtn" href="{{route('addComment.edit', $comment->id)}}">EDITER</a>
                                    <form action="{{route('addComment.delete', $comment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-danger">SUPPRIMER</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    {{$comment->comment_content}}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>


@endsection



