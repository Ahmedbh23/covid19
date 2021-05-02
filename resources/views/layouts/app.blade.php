
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @if($title = 'Home')
                {{config('app.name', 'Covid19')}}
            @else
                {{title}}
            @endif
        </title>
        <link rel='stylesheet' href="{{asset('css/app.css')}}">
    </head>
    <body>
        @include('inc.navbar')
        @include('inc.messages')
        @yield('content')
    </body>
</html>