@extends('layouts/app')


@section('content')

    <div class="container-fluid bg-white mb-2">
        <!-- Tableau D'Affichage Du Panel D'Administration -->

        <a href="{{route('post.create')}}" class="btn btn-info offset-md-10 mt-2 mb-2 text-white"><i class="fa fa-eye">AJOUTER UN POST</i></a>

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
                            <a href="{{route('postCrud.edit', $post->id )}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil">EDITER</i></a>
                            <form action="{{ route('postCrud.destroy', $post->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger ml-1"><i class="fa fa-trash">SUPPRIMER</i></button>
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
