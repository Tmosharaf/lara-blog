<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel Pagination Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="css/app.css">
    </head>

    <body>
        <div class="table w-full p-2">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($name as $data)
                    <tr class="bg-gray-400 text-center text-white">
                        
                        <td  class="p-2 border-r border-b">{{  $name->firstItem() + $loop->index }}</td>
                        <td class="p-2 border-r border-b">{{ $data->id }}</td>
                        <td class="p-2 border-r border-b">{{ $data->name }}</td>
                        <td class="p-2 border-r border-b">{{ $data->email }}</td>
                        <td class="p-2 border-r border-b">{{ $data->created_at }}</td>
                        <td class="p-2 border-r border-b">{{ $data->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table> {{-- Pagination --}}
            {{ $name->links() }}
        </div>
    </body>
</html>
