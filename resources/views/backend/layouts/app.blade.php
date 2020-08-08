<!DOCTYPE html>

<html lang="en">
    
    <head>
        <title>@yield('title', app_name())</title>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
       
        
        <link rel="manifest" href="{{ asset('assets/images/manifest.json') }}" />
        
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,400italic,600,700|Raleway:100,300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/vendors.bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/themes/theme-1.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>
        <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.css')}}">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link rel="stylesheet"
              href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet"
              href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
        <link rel="stylesheet"
              href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>

        @stack('before-styles')
        @stack('after-styles')
    </head>
    
    <body>
        <div id="app">
            @include('backend.includes.sidebar')

            <div class="app-content">

                @include('backend.includes.header')
                <div class="main-content">
                    <div class="wrap-content container" id="container">

                        @yield('content')
                        
                    </div>
                </div>
            </div>
            
            @include('backend.includes.footer')
            
        </div>
        <script src="{{ asset('assets/js/vendors.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.min.js') }}"></script>

        <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>


        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>

        <script>
            NProgress.configure({ showSpinner: !1 }), NProgress.start(), NProgress.set(0.4);
            var interval = setInterval(function () {
                NProgress.inc();
            }, 1e3);
            jQuery(document).ready(function () {
                NProgress.done(), clearInterval(interval), Main.init();
            });
        </script>

        <script>
            window._token = '{{ csrf_token() }}';
        </script>
        @stack('after-scripts')
    </body>
    
</html>
