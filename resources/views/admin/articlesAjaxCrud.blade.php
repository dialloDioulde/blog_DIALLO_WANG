@extends('layouts/app')

@section('content')


    <!-- Modal d'Ajout De Post -->
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">AJOUT DE POST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addform">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom Du Post :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom du Post">
                            </div>
                            <div class="form-group">
                                <label for="title">Titre Du Post :</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Saisir le titre du Post">
                            </div>

                            <div class="form-group">
                                <label for="category">Catégorie Du Post :</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Saisir la Catégorie du Post">
                            </div>

                            <div class="form-group">
                                <label for="status">Statut Du Post :</label>
                                <input type="text" class="form-control" id="status" name="status" placeholder="Saisir le statut du Post">
                            </div>

                            <div class="form-group">
                                <label for="type">Type Du Post :</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Saisir le type du Post">
                            </div>

                            <div class="form-group">
                                <label for="content">Contenu Du Post :</label>
                                <textarea type="text" class="form-control" rows="8" id="content" name="content" placeholder="Saisir votre Post"></textarea>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">FERMER</button>
                            <button type="submit" class="btn btn-primary" id="add">ENREGISTRER</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPostModal">
            AJOUTER UN POST
        </button>
    </div>
    <br>


    <!-- Modal d'Edition De Post -->
    <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">AJOUT DE POST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editform">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="name">Nom Du Post :</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom du Post">
                        </div>
                        <div class="form-group">
                            <label for="title">Titre Du Post :</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Saisir le titre du Post">
                        </div>

                        <div class="form-group">
                            <label for="category">Catégorie Du Post :</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Saisir la Catégorie du Post">
                        </div>

                        <div class="form-group">
                            <label for="status">Statut Du Post :</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Saisir le statut du Post">
                        </div>

                        <div class="form-group">
                            <label for="type">Type Du Post :</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Saisir le type du Post">
                        </div>

                        <div class="form-group">
                            <label for="content">Contenu Du Post :</label>
                            <textarea type="text" class="form-control" rows="8" id="content" name="content" placeholder="Saisir votre Post"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">FERMER</button>
                            <button type="submit" class="btn btn-primary" id="edit">MAJ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Tableau D'Affichage Du Panel D'Administration -->
    <table class="table table-bordered table-responsive ml-2 ml-2">
        <thead class="bg-info">
        <tr>
            <th scope="row">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col">Statut</th>
            <th scope="col">Categorie</th>
            <th class="text-center">Actions</th>
            <th></th>

        </tr>
        </thead>

        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->post_name}}</td>
                <td>{{$post->post_title}}</td>
                <td>{{$post->post_content}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->post_category}}</td>
                <td><a href="#"><button class="btn btn-warning editbtn">EDITER</button></a></td>
                <td><a href="#"><button class="btn btn-danger deletebtn">SUPPRIMER</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Fin de l'Affichage Du Panel D'Administration -->




    <script type="text/javascript">

        $(document).ready(function (){

            // Enregistrement des Posts en Base De Données
            $('#addform').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/addPost",
                    data: $('#addform').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#addPostModal').modal('hide');
                        alert('Post Enrégistrer');
                        //location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Post non Enrégistrer, Veuillez recommencer');
                    }
                });
            });


            // Edition Des Posts Déjà Enregistrer en Base De Données
            $('.editbtn').on('click', function () {
                $('#editPostModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#name').val(data[1]);
                $('#title').val(data[2]);
                $('#category').val(data[3]);
                $('#status').val(data[4]);
                $('#type').val(data[5]);
                $('#content').val(data[6]);
                console.log(data);
            });



        });
    </script>







@endsection
