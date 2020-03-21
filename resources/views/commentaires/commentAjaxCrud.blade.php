@extends('layouts/app')

@section('content')

    <div class="col-md-6">
        <div class="card my-5 ml-5 ">
            <div class="card-header bg-info">Commentez l'actualité</div>
            <div class="container card-body">

                <div class="alert" style="display: none">
                    Votre message nous est bien parvenu, merci !
                </div>

                <form id="addCom" method="post" action="{{ route('addComment) }}">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="nom">Votre Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Saisir le nom du Post">
                        </div>

                        <div class="form-group">
                            <label for="email">Votre Email :</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Saisir votre email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Votre Commentaire :</label>
                            <textarea type="text" class="form-control" rows="8" id="comment" name="comment"
                                      placeholder="Saisir votre Commentaire">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Commenter</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection



