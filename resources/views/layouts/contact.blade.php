<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="stylesheet" href= "{{ asset('css/contact.css') }}">
    <head>
    <body>
        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('js/admin/common.js') }}"></script>
        <script>
            window.onload = function () {
                window.onload = function () {
                    $("body").show();
                };
            }
        </script>
    </body>
</html>
