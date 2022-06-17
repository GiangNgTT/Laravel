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
        <h3>Giải phương trình bậc nhất</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="form" action="ptb1" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"></label>
                <input type="text" name="a" value="{{isset($a)?$a:''}}" class="form-control" id="exampleInputEmail1" placeholder="Nhap he so a">x
                +
                <label for="exampleInputPassword1" class="form-label"></label>
                <input type="text" name="b" value="{{isset($b)?$b:''}}" class="form-control" id="exampleInputPassword1" placeholder="Nhap he so b">
                = 0

                <!-- @error('a')
                <div class="alert alert-danger">Vui lòng nhập đúng</div>
                @enderror

                @error('b')
                <div class="alert alert-danger">Vui lòng nhập đúng</div>
                @enderror -->
                <button type="submit" class="btn btn-primary">Kiểm tra</button>
            </div>
        </form>
        <h4>{{isset($kq)?$kq:''}}</h4>
    </div>
</body>

</html>