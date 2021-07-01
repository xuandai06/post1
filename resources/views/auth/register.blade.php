@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-white p-6 rounded-lg">
            <form action="{{route('register')}}" method="post">
            
            @csrf
            <input type="text" name="name" id="name" placeholder="your name"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg" value="{{old('name')}}">
            @error('name')
                <div class="text-red-500">{{$message}}</div>
            @enderror

            <input type="text" name="username" id="username" placeholder="user name"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg" value="{{old('username')}}">
            @error('username')
                <div class="text-red-500">{{$message}}</div>
            @enderror
            
            <input type="text" name="email" id="email" placeholder="your email"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg" value="{{old('email')}}">
            @error('email')
                <div class="text-red-500">{{$message}}</div>
            @enderror

            <input type="password" name="password" id="password" placeholder="your password"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg" value="{{old('')}}">
            @error('password')
                <div class="text-red-500">{{$message}}</div>
            @enderror

            <input type="password" name="password_confirmation" id="password_confirmation" 
            placeholder="Repeat your password"
            class="bg-gray-100 w-full p-4 mb-2 border-2 rounded-lg" value="{{old('name')}}">
            @error('password_confirmation')
                <div class="text-red-500">{{$message}}</div>
            @enderror
             

            <button type="submit" class="bg-blue-500 w-full p-4 text-white">Register</button>

            </form>
        </div>
    </div>
@endsection

