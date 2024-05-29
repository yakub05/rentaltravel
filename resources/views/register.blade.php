<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Font and CSS styles -->
    <link rel="stylesheet" href="../auth/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../auth/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../auth/css/bootstrap.min.css">
    <link rel="stylesheet" href="../auth/css/style.css">
    <title>Register</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../auth/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Registrasi</h3>
                                <p class="mb-4">Berikut ini merupakan Form untuk registrasi akun pada website Overland
                                    Trans</p>
                            </div>
                            <form action="{{ route('register.store') }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>
                                <div class="form-group">
                                    <label for="telf">No Telephone</label>
                                    <input type="text" class="form-control" id="telf" name="telf" required>
                                </div>
                                <input type="submit" value="Registrasi" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files -->
    <script src="../auth/js/jquery-3.3.1.min.js"></script>
    <script src="../auth/js/popper.min.js"></script>
    <script src="../auth/js/bootstrap.min.js"></script>
    <script src="../auth/js/main.js"></script>
</body>

</html>
