<?php
    session_start();
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css"
      rel="stylesheet"
    />
    <style>
        body {
            width: 100%;
            height: 80vh;
            background-image: url('./img/2259217.jpg');
            background-position: center;
            background-repeat: no-repeat;
        }

        .box {
            width: 100%;
            height: 100%;
        }

        .login {
            background-color: white;
            padding: 50px; 
        }

    </style>
</head>
<body>
    <div class="box container">
        <div class="box d-flex justify-content-center align-items-center">
            <div class="login col-md-5 login-container">
                <h2 class="text-center mb-4">Đăng nhập</h2>
                <form action='' method="POST">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="username" type="text" id="form1Example1" class="form-control" />
                        <label class="form-label" for="form1Example1">Tên đăng nhập</label>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input name="password" type="password" id="form1Example2" class="form-control" />
                        <label class="form-label" for="form1Example2">Mật khẩu</label>
                    </div>
                    <button name="submit" data-mdb-ripple-init type class="btn btn-primary btn-block">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<!-- mdboostrap -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>

<?php 
    if(isset($_POST['submit'])) {
        require_once('./Controllers/AuthController.php');
        $controller = new AuthController();
        $controller->processLogin();
    } 
?>