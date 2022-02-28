<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
        }


        .flex-center {
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            width: 100%;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .c-title {
            text-align: center;
        }
        .c-title--h1 {
            font-size: 50px;
        }
        .c-title--h2 {
            font-size: 40px;
        }
        .c-title--h3 {
            font-size: 30px;
        }
        .c-title--h4 {
            font-size: 25px;
        }

        .c-properties-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-gap: 15px;
        }
        .c-properties-grid__wrapper {
            padding: 0 15px 15px 15px;
        }
        .c-properties-grid__item {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .c-properties-grid-item__title {
            font-size: 24px;
        }
        .c-properties-grid-item__list {
            padding-left: 20px;
        }
        .pagination {
            float: right;
        }
    </style>

    @stack('css')
</head>
<body>
<div class="flex-center">
    <div class="content">
        @yield('content')
    </div>
</div>
@stack('js')
</body>
</html>
