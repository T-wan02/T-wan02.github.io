<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Admin</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    {{-- toastify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    {{-- css --}}
    <link rel="stylesheet" href=" {{ asset('asset/css/style.css') }} ">

    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            height: 100%;
            width: 100%;
        }

        .row {
            width: 100%;
        }

        .container-item {
            display: flex
        }

        .container-item>.left {
            height: 100vh;
            width: 22%;
            background-color: #f9f9f9;
            /* box-shadow: 10px 20px 20px rgba(0, 0, 0, 0.8); */
            position: relative;
        }

        .logout {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            color: rgb(44, 44, 44);
            transition: color 0.3s linear;
        }

        .logout:hover {
            color: rgb(75, 75, 75);
            opacity: .9;
        }

        .logout i {
            font-size: 1.5rem
        }

        .container-item>.right {
            height: 100vh;
            width: 78%;
            background-color: #f0ecec;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 10px 50px -12px inset;
            padding: 2rem 1rem;
            overflow: scroll;
        }

        .nav-style a {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .nav-style a {
            font-size: 1.2rem;
            color: rgb(44, 44, 44);
            text-decoration: none;
            padding: .5rem 0 .5rem 1rem;
            transition: letter-spacing 0.3s ease-in, color 0.3s ease;
            font-weight: 400;
            text-align: center;
        }

        .nav-style a i {
            margin-right: 10px
        }

        .nav-style a:hover {
            color: #000;
            background-color: rgba(0, 0, 0, 0.1);
            letter-spacing: .5px;
        }

        .nav-style a.active {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

@yield('masterContent')

@yield('style')

<body>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/9d8e63c428.js" crossorigin="anonymous"></script>

    {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- toastify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    {{-- summerNote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @if (session()->has('success'))
        <script>
            Toastify({
                text: '{{ session('success') }}',
                className: "bg-success",
                position: "center",
            }).showToast();
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            Toastify({
                text: '{{ session('error') }}',
                className: "bg-danger",
                position: "center",
            }).showToast();
        </script>
    @endif

    <script>
        const items = document.QuerySelectorAll('.nav-style a')

        items.forEach(item => {
            if (item.click()) {
                console.log('clicked');
            }
        });
    </script>

    <script>
        const nav = document.querySelectorAll('.navActive a');

        console.log(window.location.pathname);
        nav.forEach(d => {
            console.log(d.pathname);
            if (window.location.pathname == d.pathname) {
                d.classList.add('active');
            }
        })
    </script>

    @yield('script')
</body>

</html>
