<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shortener</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,500&display=swap" rel="stylesheet">

        @vite(['resources/js/app.js' , 'resources/css/app.css'])
        
    </head>
    <body class="antialiased">
       <div id="app">
        
       </div>
    </body>
</html>
