@extends('layouts/app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"><strong>BLOG DIALLO & WANG</strong></p>
            </div>
        </div>
    </div>

    <div class="offset-md-5 offset-md-10">
        <a class="btn btn-info mb-2 mt-2" href="{{route('post.create')}}">CRÉER UN POST</a>
    </div>

    <div class="container mb-2 mt-2">
        <div class="row">
            <div class="col-md-4 offset-md-3">
               <strong>
                   L'Information Rapide et Fiable est Notre Priorité !
               </strong>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        @foreach ( $p as $post )
            <div class="col-4">
                <div class="container-fluid">
                    @if($post->image)
                        <img class="img-thumnnail" src="{{asset('images/posts/' . $post->image)}}" width="400">
                    @endif
                </div>

                <div class="mt-2 container-fluid">
                    <a  href="/article/{{$post->post_title}}">Titre : {{ $post->post_title}}</a>
                </div>

                <div class="mt-2 container-fluid">
                    Date De Publication du Post : {{$post->created_at}}
                </div>

            </div>
        @endforeach
    </div>





@endsection
