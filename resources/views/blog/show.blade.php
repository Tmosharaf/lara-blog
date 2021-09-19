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
        <div>
            
            
            
            <div class="w-3/6 text-center m-auto mb-8">
                <h1 class="text-4xl mb-2">{{ $post->title }}</h1>
                <span class="block py-2">Created BY: {{ $post->user->name }}  | Created At: @php
                    $dt = \Carbon\Carbon::parse($post->created_at);
                    echo $dt->diffForHumans();
                    @endphp
                    | <a href="{{ $post->slug.'/edit' }}" class="bg-yellow-500 text-white p-1 rounded-sm ">Update</a>
                    
                    </span>
                <p class="mb-4">{{ $post->description }}</p>
               
            </div>
            
            
        </div>
    </section>
</body>
</html>
