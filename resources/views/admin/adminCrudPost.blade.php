@extends('layouts/app')


@section('content')

    <div class="container-fluid bg-white mb-2">
        <!-- Tableau D'Affichage Du Panel D'Administration -->

        <a href="{{route('post.create')}}"><button class="btn btn-info offset-10 mt-2 mb-2">AJOUTER UN POST</button></a>

        <table class="table container-fluid table-responsive">
            <thead class="bg-info">
            <tr>
                <th scope="row">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Contenu</th>
                <th scope="col">Statut</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>

            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->post_title}}</td>
                    <td>{{$post->post_content}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->post_type}}</td>
                    <td>
                        @if($post->image)
                            <img class="img-thumnnail" src="{{asset('images/posts/' . $post->image)}}" width="100">
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('postCrud.edit', $post->id )}}"><button class="btn btn-warning editbtn">EDITER</button></a>
                            <form action="{{ route('postCrud.destroy', $post->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">SUPPRIMER</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Fin de l'Affichage Du Panel D'Administration -->

    </div>

@endsection
