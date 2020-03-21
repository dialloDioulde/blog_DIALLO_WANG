@extends('layouts/app')


@section('content')

   <div class="container-fluid">

       <!-- Modal d'Ajout De Posts -->
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
                               <button type="submit" class="btn btn-primary" id="idAction">ENREGISTRER</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       <!-- Fin Du Modal D'Ajout De Posts -->

       <div class="offset-md-10 mr-2">
           <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPostModal">
               AJOUTER UN POST
           </button>
       </div>
       <br>


       <!-- Tableau D'Affichage Du Panel D'Administration -->

       <table class="table  table-responsive ml-2 ml-2">
           <thead class="bg-info">
           <tr>
               <th scope="row">ID</th>
               <th scope="col">Nom</th>
               <th scope="col">Titre</th>
               <th scope="col">Contenu</th>
               <th scope="col">Statut</th>
               <th scope="col">Categorie</th>
               <th scope="col">Type</th>
               <th class="text-right">Actions</th>
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
                   <td>{{$post->post_type}}</td>
                   <td><a href="#"><button class="btn btn-warning editbtn">EDITER</button></a></td>
                   <td><a href="#"><button class="btn btn-danger deletebtn">SUPPRIMER</button></a></td>
               </tr>
           @endforeach
           </tbody>
       </table>
       <!-- Fin de l'Affichage Du Panel D'Administration -->


   </div>

   <!-- Modal d'Edition De Post -->
   <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">EDITION DE POST</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form id="editform">
                       @csrf
                       @method('PUT')
                       <input type="hidden" id="e_id" name="e_id">
                       <div class="form-group">
                           <label for="name">Nom Du Post :</label>
                           <input type="text" class="form-control" id="e_name" name="e_name" placeholder="Saisir le nom du Post">
                       </div>
                       <div class="form-group">
                           <label for="title">Titre Du Post :</label>
                           <input type="text" class="form-control" id="e_title" name="e_title" placeholder="Saisir le titre du Post">
                       </div>

                       <div class="form-group">
                           <label for="category">Catégorie Du Post :</label>
                           <input type="text" class="form-control" id="e_category" name="e_category" placeholder="Saisir la Catégorie du Post">
                       </div>

                       <div class="form-group">
                           <label for="status">Statut Du Post :</label>
                           <input type="text" class="form-control" id="e_status" name="e_status" placeholder="Saisir le statut du Post">
                       </div>

                       <div class="form-group">
                           <label for="type">Type Du Post :</label>
                           <input type="text" class="form-control" id="e_type" name="e_type" placeholder="Saisir le type du Post">
                       </div>

                       <div class="form-group">
                           <label for="content">Contenu Du Post :</label>
                           <textarea type="text" class="form-control" rows="8" id="e_content" name="e_content" placeholder="Saisir votre Post"></textarea>
                       </div>

                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">FERMER</button>
                           <button type="submit" class="btn btn-primary" id="edit">METTRE À JOUR</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   <!-- Fin Du Modal D'édition Des Posts -->


   <!-- Modal De Suppression Des Posts -->
   <div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">SUPPRESSION DE POST</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
                   <form id="deleteform">
                       @csrf
                       @method('DELETE')
                       <div class="modal-body">
                           <input type="hidden" name="id" id="delete_id">
                           <p>Êtes vous sûr de vouloir Supprimer ce Post ?</p>
                       </div>

                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                           <button type="submit" class="btn btn-primary">OUI</button>
                       </div>
                   </form>
           </div>
       </div>
   </div>

   <!-- Fin Du Modal De Suppression Des Posts -->




   <script type="text/javascript">
        $(document).ready(function (){

            // Cette fonction nous permet d'enregsitrer des posts en Base De Données
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
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Post non Enrégistrer, Veuillez recommencer');
                    }
                });
            });


            // Avec ce bout de code ci-dessous on peut appeler le formulaire d'édition de posts avec les données existantes déjà
            $('.editbtn').on('click', function () {
                $('#editPostModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#e_id').val(data[0]);
                $('#e_name').val(data[1]);
                $('#e_title').val(data[2]);
                $('#e_content').val(data[3]);
                $('#e_status').val(data[4]);
                $('#e_category').val(data[5]);
                $('#e_type').val(data[6]);
                console.log(data);
            });


            // Cette partie permet d'effectuer la mise à jour des posts
            $('#editform').on('submit', function (e) {
                e.preventDefault();

                let id = $('#e_id').val();

                $.ajax({
                    type: "PUT",
                    url: "/updatePost/" +  id,
                    data: $('#editform').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#editPostModalPostModal').modal('hide');
                        alert('Mise à Jour Effectuée avec Succès');
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Attention votre mise à jour n'a pas été Enrégistrer ! ");
                    }
                });
            });


            // Dans cette partie on va réaliser la possibilité de Supprimer un Post
            $('.deletebtn').on('click', function () {
                $('#deletePostModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
            });

            $('#deleteform').on('submit', function (e) {
                e.preventDefault();

                let id = $('#delete_id').val();

                $.ajax({
                    type: "DELETE",
                    url: "/deletePost/" +  id,
                    data: $('#deleteform').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#deletePostModal').modal('hide');
                        //alert('Le Post a été Supprimé avec Succès !');
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });




        });


    </script>

@endsection
