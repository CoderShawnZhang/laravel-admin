
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="//{{ Request::getHost() }}:6002/socket.io/socket.io.js"></script>
    </head>
    <body>
    <div id="app">
        <example-component></example-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
    </html>
