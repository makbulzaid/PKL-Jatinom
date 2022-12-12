<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    {{-- css --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    {{-- template css --}}
    <link rel="stylesheet" href="/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/assets/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="/assets/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/assets/node_modules/prismjs/themes/prism.css">
    
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    
    @yield('extracss')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            {{-- navbar --}}
            @include('partials.navbar')

            {{-- sidebar --}}
            @include('partials.sidebar')

            
            {{-- content --}}
            <div class="container-fluid">
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            @yield('header')
                        </div>
                        <div class="section-body">
                            @yield('success')
                            @yield('container')
                        </div>
                    </section>
                </div>
            </div>
            @yield('modal')

            {{-- footer --}}
            @include('partials.footer')
            
            <!-- General JS Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
            <script src="/assets/js/stisla.js"></script>

            <!-- JS Libraies -->
            
            <script src="/assets/node_modules/cleave.js/dist/cleave.min.js"></script>
            <script src="/assets/node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
            <script src="/assets/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
            <script src="/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script src="/assets/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
            <script src="/assets/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
            <script src="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
            <script src="/assets/node_modules/select2/dist/js/select2.full.min.js"></script>
            <script src="/assets/node_modules/selectric/public/jquery.selectric.min.js"></script>
            <script src="/assets/node_modules/prismjs/prism.js"></script>

            <!-- Template JS File -->
            <script src="/assets/js/scripts.js"></script>
            <script src="/assets/js/custom.js"></script>

            <!-- Page Specific JS File -->
            <script src="/assets/js/page/forms-advanced-forms.js"></script>
            <script src="/assets/js/page/bootstrap-modal.js"></script>
            
            @yield('extrajs')
</body>

</html>
