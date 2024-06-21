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
    <title>Реєстрація</title>
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
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1><center>Будь ласка, заповніть форму для реєстрації на порталі</center></h1><br>

                <form action="" method="POST" >
                    <div class="box-body">

                        <div class="step_1">
                            <div class="form-group">
                                <label for="First_name">Логін:</label>
                                <input type="text" class="form-control first_name" name="login" required>
                            </div><br>

                            <div class="form-group">
                                <label for="Second_name">Ім'я:</label>
                                <input type="text" class="form-control second_name" name="name" required>
                            </div><br>

                            <div class="form-group">
                                <label for="Last_name">Прізвище:</label>
                                <input type="text" class="form-control last_name" name="sname" required>
                            </div><br>

                            <div class="form-group">
                                <label for="lname">По батькові:</label>
                                <input type="text" class="form-control" name="lname" required>
                            </div><br>

                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div><br>

                            <div class="form-group">
                                <label for="city">Місто:</label>
                                <input type="text" class="form-control" name="city" required>
                            </div><br>

                            <div class="form-group">
                                <label for="role">Роль:</label>
                                <select class="form-control" name="role" id="role" required>
                                    <option value="пацієнт">Пацієнт</option>
                                    <option value="лікар">Лікар</option>
                                    <option value="медсестра">Медсестра</option>
                                </select>
                            </div><br>

                            <div class="box-footer">
                                <button type="submit" style="width: 100%;" name="submit" value="submit" class="btn btn-danger">Зареєструватися</button>
                            </div>
                            <div class="auth_button">
                                <h4 style="margin-top: 5%;">Вже зареєстровані?</h4>
                                <a href="auth.php">Увійти</a>
                            </div>
                        </div>
                    </div>
                    <?php

                    if(isset($_POST['submit'])){
                        $login = $_POST['login'];
                        $sql = "SELECT id FROM users WHERE login = '$login'";
                        $result = mysqli_query($link,$sql);
                        if(mysqli_num_rows($result)==0){
                            $insert_query = "INSERT INTO 
                            users (login, name, sname, lname, password, city, role)
                            VALUES ('".$_POST["login"]."', '".$_POST["name"]."', '".$_POST["sname"]."', '".$_POST["lname"]."', '".$_POST["password"]."', '".$_POST["city"]."', '".$_POST["role"]."')";
                            mysqli_query($link,$insert_query);
                            $_SESSION['itlogin'] = $login;
                            echo "<script>alert('Успішна реєстрація!');</script>";
                            echo '<script>setTimeout(function () { window.location.href = "index.php"; }, 2000);</script>';
                        } else {
                            echo "<script>alert('Цей логін вже зайнятий!');</script>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/owl.carousel.min.js"></script>
<script src="scripts/script.js"></script>
</body>

</html>