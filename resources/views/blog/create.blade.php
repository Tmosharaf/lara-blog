{{ $errors->first() }}

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
            <h1 class="text-5xl text-center mb-4">Create Blog</h1>
            <hr>
        </div>

        <div class="w-4/5 m-auto">
            <form action="/blog" method="post">
                @csrf
                <input value="{{ old('title') }}" class="block p-1 mb-5 w-4/5" type="text" name="title" placeholder="Title">
                <textarea class="block p-1 w-4/5 mb-5" name="description" id="" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-md" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>