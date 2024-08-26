<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--shrikhand font style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">

    <!--Time New Roman font style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>



    <div>
        {{ $slot }}
    </div>

    <style>
        .custom-font {
                font-family: "Shrikhand", serif;
                font-weight: 400;
                font-style: normal;
                font-size: 40px;

        }

        .custom-font-2 {
                font-family: "Tinos", serif;
                font-weight: 700;
                font-style: normal;
                font-size: 30px;
        }


</style>

</body>
</html>
