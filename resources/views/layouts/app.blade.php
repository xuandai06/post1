<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
  <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex">
            <li class="p-3">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="p-3">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="{{route('posts')}}">Posts</a>
            </li>
        </ul>

        <ul class="flex">
        @if(auth()->user())
            <li class="p-3">
                <a href="">{{auth()->user()->name}}</a>
            </li>
            <li class="p-3">
                <a href="{{route('logout')}}">Log out</a>
            </li>
        @else
            <li class="p-3">
                <a href="{{route('login')}}">Log in</a>
            </li>
            <li class="p-3">
                <a href="{{route('register')}}">Register</a>
            </li>
        @endif
        </ul>
  </nav>
    @yield('content')
</body>
</html>