@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            <form action="{{ route('posts') }}" method="post">
                @csrf
                <textarea name="body" id="body" cols="30" rows="5" class="bg-gray-200
                border-2 w-full rounded-lg" placeholder="Post something"></textarea>
                @error('body')
                    <div class="text-red-500 text-sm">
                        {{$message}}
                    </div>
                 @enderror
                <button type="submit" class="bg-blue-500 px-5 py-2 rounded-lg text-white">Post</button>
            </form>

            @if($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4">
                        <a href="{{route('user.posts',$post->user)}}" class="font-bold">{{$post->user->name}}</a> 
                        <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        <p class="mb-2">{{$post->body}}</p>
                    </div>
                    
                    @auth
                        <div class="flex items-center">
                        @if(!$post->likedBy(auth()->user()))
                            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-2">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @else
                            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-2">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        @endif
                            <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}
                            </span>
                        </div>
                        
                        @can('delete', $post)
                            <form action="{{route('posts.destroy', $post)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        @endcan

                    @endauth
                @endforeach

                {{$posts->links()}}
            @else
                <p>There are no posts</p>
            @endif
          
        </div>
    </div>
@endsection

