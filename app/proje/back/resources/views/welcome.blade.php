<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container card p-3 mt-5">
        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">İsim</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="İsim" required>
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Resim Ekle</label>
                <input type="file" name="picture" id="picture" class="form-control" placeholder="Resim Ekle"
                    required>
            </div>

            <div class="post_button">
                <button type="submit" class="btn btn-success">Ekle</button>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>
