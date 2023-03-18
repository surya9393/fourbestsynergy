<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <title>Test PT Four Best Synergy</title>
</head>

<body>
    @include('layouts.partials.header')
    @yield('content')
    @include('layouts.partials.footer')
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session()->has('loginError'))
        <script>
            swal("We are Sorry!", "Login Error!", "error");
        </script>
    @endif

    @if (session()->has('successRegister'))
        <script>
            swal("Thank you!", "your're Already Registered!", "success");
        </script>
    @endif
    
    @if (session()->has('logout'))
        <script>
            swal("Thank you!", "You're Already Logout!", "success");
        </script>
    @endif

    @if (session()->has('suksesPresensi'))
        <script>
            swal("Thank you!", "You're Already Come!", "success");
        </script>
    @endif
</body>

</html>
