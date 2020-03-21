@extends('layouts/app')

@section('content')

    <!-- Modal Des Post -->
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

    <div class="container-fluid">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPostModal">
            AJOUTER UN POST
        </button>
    </div>
    <br>
@endsection
