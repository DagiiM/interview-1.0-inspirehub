<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scrollbar-width:none;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'eleso') }}</title>
             <link href="{{asset('css/eleso.css')}}" rel="stylesheet">

      <!-- Styles -->
     
    </head>
    <body>
            {{ $slot }}
    </body>
    <!-- Scripts -->
          <script src="{{ asset('js/eleso.js') }}" defer></script>
</html>
