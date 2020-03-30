@extends('layouts/app')

@section('content')
    <div class="card my-5  ml-5 col-md-10">
        <div class="container card-body">
            <a class="btn btn-info mb-2 mr-2 offset-md-10" href="{{route('post.create')}}">Créer un Nouveau Post</a>

            <div class="container-fluid">
                <ul>
                    @foreach ( $p as $post )
                        <a  href="/article/{{$post->post_name}}"><li>Titre : {{ $post->post_title}}</li></a>
                        <br/>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

@endsection
