@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-1/3 bg-white p-6 rounded-lg">

           
            <form action="{{route('login')}}" method="post">
            
            @csrf
           
            <input type="text" name="email" id="email" placeholder="your email"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg" value="{{old('email')}}">
            @error('email')
                <div class="text-red-500">{{$message}}</div>
            @enderror

            <input type="password" name="password" id="password" placeholder="your password"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg">

            <div>
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Remember me</label>
            </div>
            
        
            <button type="submit" class="bg-blue-500 w-full p-4 text-white">Log in</button>
            </form>
    </div>
</div>
@endsection