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
<div class="container">
    <h2 class="text-center">Laravel JSON Columns Update</h2>
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="form-group mt-5">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name ?? '' }}" />
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price ?? '' }}" />
        </div>
        <div class="form-group">
            <label for="properties">Properties</label>
            <div class="row">
                <div class="col-md-2">
                    Key:
                </div>
                <div class="col-md-4">
                    Value:
                </div>
            </div>
            @for ($i=0; $i <= 4; $i++)
                <div class="row">
                    <div class="col-md-2 mt-1">
                        <input type="text" name="properties[{{ $i }}][key]" class="form-control"
                        value="{{ $product->properties[$i]['key'] ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="properties[{{ $i }}][value]" class="form-control"
                        value="{{ $product->properties[$i]['value'] ?? '' }}">
                    </div>
                </div>
            @endfor
        </div>
        <div class="d-flex justify-content-between mt-2">
            <a href="{{ route('products.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
            <input class="btn btn-danger mt-2" type="submit" value="Update" />
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>