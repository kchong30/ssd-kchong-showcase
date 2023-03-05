<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
</style>
<x-header></x-header>
@if (session()->has('success'))
<div class="flex justify-center items-center bg-gray-100 w-full py-3">
    <p class="text-xs font-bold bg-white uppercase border border-green-700 rounded px-4 py-2">
        {{ session()->get('success') }}
    </p>
</div>
@elseif (session()->has('error'))
<div class="flex justify-center items-center bg-gray-100 w-full py-3">
    <p class="text-xs color-red-500 font-bold bg-white uppercase border border-red-700 rounded px-4 py-2">
        {{ session()->get('error') }}
    </p>
</div>
@endif
<body class="font-nunito">
    {{ $content }} 
</body>
<x-footer></x-footer>
</html>