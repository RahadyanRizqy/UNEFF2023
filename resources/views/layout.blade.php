<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('csrf-token')

    {{-- FROM EVENTRE --}}
    <!-- Bootstrap -->
    <link href="/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Slick Carousel -->
    <link href="/plugins/slick/slick.css" rel="stylesheet">
    <link href="/plugins/slick/slick-theme.css" rel="stylesheet">

    <title>@yield('title')</title>
    @stack('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    @stack('script')
</head>
<body>
    @yield('content')
</body>
</html>