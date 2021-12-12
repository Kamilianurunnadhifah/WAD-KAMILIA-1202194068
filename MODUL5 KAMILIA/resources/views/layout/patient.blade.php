<!doctype html>
<html lang="en">
    <!--Head-->
        @include('include.head')

    <!--End Head-->
    <body class="d-flex flex-column h-100">
        <div class="container">
            <!--header-->
                @include('include.header')
            <!--End header-->

            <!--Content-->
                @yield('content')
            <!--End Content-->
        
            
        </div>

        @include('include.script')
    </body>
</html>