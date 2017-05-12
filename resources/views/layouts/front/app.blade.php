<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>

        .carousel-inner {
          /* make sure your .items will get correct height */
          height: 100%;
        }

        .item {
          background-size: cover;
          background-position: 50% 50%;
          width: 100%;
          height: 100%;
        }

        .item img {
          visibility: hidden;
        }
    </style>

</head>
<body style="padding-top: 50px">
    @include('layouts.front.navbar')

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
