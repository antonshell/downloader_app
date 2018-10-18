<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @include('includes.header')

            <div class="content">
                @yield('content')
            </div>

            @include('includes.footer')
        </div>
    </body>
</html>
