<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="h-screen w-full bg-gray-100">
        @include('layouts.includes.header')
        <div class="overflow-auto">
            @yield('content')
        </div>
    </div>
    

    
</body>
</html>