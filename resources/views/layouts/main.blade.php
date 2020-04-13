<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">


</head>
<body>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li><a href="/welcome">Home</a></li>
            <li><a href="/send_contact">Contactez-Moi</a></li>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/email_contact">Liste Des Rendez-Vous</a></li>
        </ul>
    </div>
</div>

<div class="callout large primary">
    <div class="row column text-center">
        <h1>Our Blog</h1>
        <h2 class="subheader">Such a Simple Blog Layout</h2>
    </div>
</div>

<div class="row medium-8 large-7 columns">

    @yield('content')

</div>

<!-- footer -->
<div>
    @include('footer')
</div>
<!-- end footer-->

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
