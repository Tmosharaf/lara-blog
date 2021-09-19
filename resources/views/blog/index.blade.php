<x-app-layout>
    <x-slot name="header">
    </x-slot>




@if (session()->get('m'))
    {{ session()->get('m') }}
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <section class="w-4/5 m-auto">
        <div class="my-8 py-4">
            
            <h1 class="text-5xl text-center mb-4">Blog Section
                <span class="text-2xl">{{ Auth::user()->name }}</span>
            </h1>
            @if (auth()->check())
            <a href="blog/create" class="mb-8 w-2/12 m-auto text-center block text-indigo-50 py-2 px-3 bg-green-600 rounded-xl ">Create Blog</a>
            @endif
            <hr>
        </div>
        <div>
            
            @foreach ($posts as $post)
            
            <div class="w-3/6 text-center m-auto mb-8">
                <h1 class="text-4xl mb-2"><a href="{{ 'blog/'.$post->slug }}">{{ $post->title }}</a></h1>
                <span class="block py-2">Created BY: {{ $post->user->name }}  | Created At: @php
                    $dt = \Carbon\Carbon::parse($post->created_at);
                    echo $dt->diffForHumans();
                    @endphp
                    @if (auth()->user()->id == $post->user_id)
                    | <a href="{{ 'blog/'.$post->slug.'/edit' }}" class="bg-yellow-500 text-white p-1 rounded-sm ">Update</a>
                    <form class="inline" method="POST" action="blog/{{ $post->slug }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white p-1 rounded-sm ">Delete</button>
                    </form>
                    @endif
                    </span>
                <p class="mb-4">{{ $post->description }}</p>
                <a href="{{ 'blog/'.$post->slug }}" class="text-indigo-50 py-2 px-3 bg-green-600 rounded-xl ">Read More</a>
            </div>
            @endforeach
            
        </div>
    </section>
</body>
</html>

</x-app-layout>