
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
        <head>
            @include('front.layout.top')
        </head>


        <body id="pkp-common-openJournalSystems">
            <div id="container">

                @include('front.layout.header')

                <div id="body">

                    @include('front.layout.sidebar')
                
                                    
                        @include('front.layout.menu')                
                                                
                                                
                    @yield('content')

                                                <!-- /Google Analytics -->
        @include('front.layout.footer')