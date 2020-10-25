<!DOCTYPE html>
    <html lang="en">
        <head>
            @include('admin.layout.top')
        </head>
        <body>
        <!-- topbar starts -->
            @include('admin.layout.navbar')
        <!-- topbar ends -->
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- left menu starts -->
                @include('admin.layout.menu')
                <!-- left menu ends -->
                @yield('content')
            <footer>
            </footer>
            </div><!--/.fluid-container-->

        <!-- external javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- jQuery -->
                @include('admin.layout.bottom')
        </body>
    </html>
