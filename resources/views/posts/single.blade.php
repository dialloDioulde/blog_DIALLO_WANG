@extends('layouts/app')

@section('content')
    <div class="ml-5 w-75 container-fluid">

            <div class="card my-2 ml-2">
                <div class="container card-body">
                    @foreach( $post as $posts)
                        {{$posts->id}}
                        <h2>{{$posts->post_type}}</h2>
                        <p>Catégorie : {{$posts->post_category}}</p>
                        <p>{{$posts->post_content}} </p>
                        <p>Publié par {{$posts->author->name}}</p>
                        <p>Date De Publication : {{$posts->created_at}}</p>
                    @endforeach
                </div>
            </div>

        <br/>

        <div class="card my-2 ml-2">
            <div class="container card-body">
                @foreach($comments as $comment)
                    {{$comment->comment_content}} <br>
                @endforeach
            </div>
        </div>



        <br/>
        <div class="card my-5 ml-5 ">
            <div class="card-header bg-info">Commentez l'actualité</div>
            <div class="container card-body">
                <form action= "/addComment" method="POST" id="formComment">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control"  id="comment_name" placeholder="Votre Nom" name="comment_name">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control"  id="comment_email" placeholder="Votre Email" name="comment_email">
                    </div>

                    <div class="form-group">
                        <textarea type="text" rows="8" class="form-control" id="comment_content" placeholder="Votre Commentaire"
                                  name="comment_content"></textarea>
                    </div>

                    <button class="btn btn-primary" id="add">Envoyer</button>
                </form>
            </div>
        </div>
        <br/>
    </div>


    <script type="text/javascript">
        $('#add').click(function (event) {
            event.preventDefault();

            let form = $('#formCommen');
            let url = form.attr('action');

            // reset

            form.find('help-block').remove();
            form.find('form-group').removeClass('has-error');


            $.ajax({
                url: url,
                method: 'POST',
                data: form.serialize(),
                success: function (response) {

                },
                error: function (xhr) {
                    let errors = xhr.responseJSON;
                    if($.isEmptyObject(errors) === false){
                        $.each(errors, function (key, value) {
                            $('#' + key).closest('.form-group')
                                .addClass('has-error')
                            .append('<span class="help-block"><strong> + value +</strong></span>')

                        })
                    }

                }

            })
        })
    </script>


@endsection

