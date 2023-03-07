<!DOCTYPE html> 
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title></title>
</head>
<body>
    
    <div class="container mt-5">
        <h2 class="text-center mb-5">Laravel JSON Columns</h2>
        <a href="{{ route('products.create') }}"><button type="button" class="btn btn-primary float-end">Create</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Properties</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name ?? '' }}</td>
                    <td>{{ $product->price ?? '' }}</td>
                    <td>
                        @foreach ($product->properties as $property)
                            <b>{{ $property['key'] }}</b>: {{ $property['value'] }}<br />
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('products.edit',$product->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>