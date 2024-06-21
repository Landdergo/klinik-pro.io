<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Авторизація</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
<?php
$link = mysqli_connect("localhost", "root", "", "likari");
?>
<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">Дитяча Поліклініка</h1>
    </a>
</div>
<div>
    <div mt="150px" class="container">
        <div class="row" style="margin-bottom: 20%;">
            <div class="col-3"></div>
            <div class="col-6">
                <h1><center>Будь ласка, введіть свій логін та пароль</center></h1><br>

                <form action="" method="POST" >
                    <div class="box-body">

                        <div class="step_1">
                            <div class="form-group">
                                <label for="First_name">Логін:</label>
                                <input type="text" class="form-control first_name "  name="name"  required>
                            </div><br>


                            <div class="form-group">
                                <label for="subject">Пароль:</label>
                                <input  class="form-control subject"  required  type="password"   name="password"   >
                            </div><br>


                            <div class="box-footer">
                                <button type="submit" style="width: 100%;" name="submit" value="submit" class="btn btn-danger">Увійти</button>
                                <button type="button" style="width: 100%; margin-top: 2%; background-color: #1b9b4c;" onclick="window.location.href = 'registration.php';" class="btn btn-danger">Зареєструватися</button>
                            </div>
                        </div>
                    </div>
                    <?php

                    if(isset($_POST['submit'])){
                        $login = $_POST['name'];
                        $password = $_POST['password'];
                        $sql = "SELECT id, role FROM users WHERE login = '$login'";
                        $check = "SELECT id, role FROM users WHERE login = '$login' and password = '$password'";
                        $result = mysqli_query($link,$sql);
                        $res = mysqli_query($link,$check);

                        if(mysqli_num_rows($result)==0) {
                            echo "Такого користувача не існує, будь ласка, зареєструйтесь!";
                        } elseif(mysqli_num_rows($res)==0){
                            echo "Введений пароль невірний, спробуйте знову";
                        } else {
                            $user = mysqli_fetch_assoc($res);
                            $_SESSION['itlogin'] = $login;
                            $_SESSION['id'] = $user['id'];
                            $_SESSION['role'] = $user['role'];

                            if ($user['role'] == 'пацієнт') {
                                header("Location: index.php");
                            } else {
                                header("Location: tests.php");
                            }
                            exit();
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js "></script>
<script src="scripts/owl.carousel.min.js "></script>
<script src="scripts/script.js "></script>
</body>

</html>