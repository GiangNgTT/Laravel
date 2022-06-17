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
    <a href="http://localhost:8000/cars/create">Add New</a>
    <table class="table img-thumbnail">
        <thead>
            <th>ID</th>
            <th>Image</th>
            <!-- <th>Make</th> -->
            <th>Model</th>
            <th>Description</th>
            <th>Produded_on</th>
            <td colspan="2">Action</td>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{$car -> id}}</td>
                    <td><img class="img-thumbnail" src="/images/{{$car -> image}}" class="img-fluid rounded-start" alt="..."></td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->description }}</td>
                    <td>{{ $car->produced_on }}</td>
                    <td> 
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-primary">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>