<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kayruchenkov">
    <meta name="generator" content="Hugo 0.98.0">

    {{-- <title>UD. NH JAYA | {{ Request::is('/') ? 'Dashboard' :
        (Request::is('admin/bahanbaku*') ? 'Bahan Baku' :
        (Request::is('admin/sparepart*') ? 'Sparepart' :
        (Request::is('admin/kategori*') ? 'Kategori' :
        (Request::is('admin/pemesanan*') ? 'Pemesanan' :
        (Request::is('admin/pemakaian*') ? 'Pemakaian' :
        (Request::is('admin/transaksi*') ? 'Transaksi' :
        (Request::is('admin/eoq*') ? 'Economic Order Quantity' :
        (Request::is('admin/user*') ? 'Users' :
        ''))))))))  }}</title> --}}

    <title>UD. NH Jaya | {{ ucwords(str_replace('_', ' ', explode('.', Request::route()->getName())[0])) }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    {{-- Bootstrap core CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    {{-- <link href="/cssdashboard.css" rel="stylesheet"> --}}
    {{-- Link dataTables --}}
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }


        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body>

    @include('admin.layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')

            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="/js/dashboard.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    @yield('js_custom')
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();
        });
    </script>
</body>

</html>
