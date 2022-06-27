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
    <div class="container">
        <!-- Hien thong bao cua success khi them thanh cong trong admin -->
        <div>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{
                Session::get('success')
            }}
            </div>
            @endif
        </div>
        <div>
            <a href="http://localhost:8000/cars/create">Add New</a>
            <h2>Danh sach xe</h2>
            <table class="table img-thumbnail">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Manufacturer</th>
                    <th>Produded_on</th>
                    <td colspan="2" width="">Action</td>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <form method="post" action="{{ route('cars.destroy', $car->id) }}">
                        @csrf
                        @method('delete')
                        <tr>
                            <td>{{$car -> id}}</td>
                            <td><img class="img-thumbnail" width="200px" src="/images/{{$car -> image}}" class="img-fluid rounded-start" alt="..."></td>      
                           
                            <td>{{ $car->model }}</td>           
                            <td>{{ $car->description }}</td>

                            <td>{{ $car->manufacturers->mf_name }}</td>
                            <td>{{ $car->produced_on }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="window.location='{{ route( 'cars.edit', $car->id ) }}'">Edit</button>
                            </td>
                            <td>
                                <div class="form-item center">
                                    <button type="submit" class="btn btn-danger deleteBtn" onclick="return myConfirm(); window.location='{{ route( 'cars.destroy', $car->id ) }}'">Delete</button>
                                </div>
                            </td>
                    </form>
                    <script>
                        function myConfirm() {
                            var result = confirm("Are you sure you want to delete this car with all its post??");
                            if (result == true) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    </script>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>