<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <h2>Add new</h2>
        <a href="http://localhost:8000/cars">Back to list</a>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form" action="" method="post" enctype= multipart/form-data>//phai co enctype= multipart/form-data neu ko nos ko hien thi 
            @csrf
            <label for="img" class="form-label"></label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" value="{{isset($image)?$image:''}}">

            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Input description">

            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="text" name="model" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Input model">

            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="date" name="produced_on" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Input produced-on"><br>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</body>

</html>