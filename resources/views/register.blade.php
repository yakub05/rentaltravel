<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Register
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        body {
            background: url('../assets/img/curved-images/curved6.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #ffffff;
            border-radius: 10px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .row {
            display: flex;
            gap: 10px;
        }

        .row .col {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-header">
            <h3 class="font-weight-bolder text-info text-gradient">Register</h3>
        </div>

        <div class="register-body">
            @if (Session::has('registerError'))
                <div class="alert alert-danger">{{ Session::get('registerError') }}</div>
            @endif
            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col">
                        <label>Nama</label>
                        <div class="mb-3">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama"
                                aria-describedby="nama-addon" required>
                        </div>
                    </div>
                    <div class="col">
                        <label>Email</label>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                aria-describedby="email-addon" required>
                        </div>
                    </div>
                </div>

                <label>Password</label>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                        aria-describedby="password-addon" required>
                </div>

                <label>Konfirmasi Password</label>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Konfirmasi Password" aria-label="Password Confirmation"
                        aria-describedby="password-confirmation-addon" required>
                </div>

                <label>No Telephone</label>
                <div class="mb-3">
                    <input type="text" name="telf" class="form-control" placeholder="No Telephone" aria-label="No Telephone"
                        aria-describedby="telephone-addon" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Registrasi</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
