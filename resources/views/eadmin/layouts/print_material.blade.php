<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Sea Links - Lowest Fare</title>
    <link rel="stylesheet" media="all" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style type="text/css">
        hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container" id="wrapper" >
        <div class="row">
            <div class="col-xs-12 text-center" style="padding: 5px;">
                <img src="{{ public_path('images/sealinks-logo.jpg') }}" alt="home" style="max-width: 100px;">
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#wrapper -->
</body>
</html>