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
        <!-- <h3>Phép cộng</h3> -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="form" action="calculation" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="email" class="form-label"></label>
                    <input type="text" name="a" class="form-control" id="exampleInputEmail1" value="{{isset($a)?$a:''}}" placeholder="Nhap so a">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="text" name="b" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Nhap so b">
                    <br>
                    <button type="submit" class="btn btn-primary">Tính</button>
                </div>
                <div class="col-6">
                    <input type="radio" id="" name="cal" value="+" {{isset($check) && $check=="+"?"checked":"" }}/>
                    <label for="cong">Cộng</label><br>
                    <input type="radio" id="" name="cal" value="-" {{isset($check) && $check=="-"?"checked":"" }}/>
                    <label for="tru">Trừ</label><br>
                    <input type="radio" id="" name="cal" value="*" {{isset($check) && $check=="*"?"checked":"" }}/>
                    <label for="nhan">Nhân</label><br>
                    <input type="radio" id="" name="cal" value="/" {{isset($check) && $check=="/"?"checked":"" }}/>
                    <label for="chia">Chia</label>
                </div>
                <h4>{{isset($ca)?$ca:''}}</h4>
            </div>
        </form>

    </div>
</body>

</html>