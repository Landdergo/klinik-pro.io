<?php
session_start();
if ($_SESSION['itlogin'] == "") {
    header('Location: /auth.php');
    exit();
} else {
    $login = $_SESSION['itlogin'];
    $user_type = $_SESSION['type'];
    $doctor_id = $_SESSION['id'];
}

$link = mysqli_connect("localhost", "root", "", "likari");

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$users_query = "SELECT id, name, sname, lname FROM users WHERE role='пацієнт'";
$users_result = mysqli_query($link, $users_query);
$users = mysqli_fetch_all($users_result, MYSQLI_ASSOC);

mysqli_close($link);
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
    <title>Список пацієнтів</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .text-right {
            text-align: right;
        }
        .btn-primary {
            margin-right: 10px;
        }
    </style>
</head>

<body>
<header></header>
<div mt="150px" class="container">
    <h1>Список пацієнтів</h1>
    <input class="form-control mb-4" id="tableSearch" type="text" placeholder="Пошук пацієнта">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>По батькові</th>
            <th class="text-right">Медична картка</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($users as $user) {
            echo "<tr>
                        <td>{$user['name']}</td>
                        <td>{$user['sname']}</td>
                        <td>{$user['lname']}</td>
                        <td class='text-right'><a href='patientrecord.php?id={$user['id']}' class='btn btn-primary'>Медична картка</a></td>
                      </tr>";
        } ?>
        </tbody>
    </table>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/owl.carousel.min.js"></script>
<script src="scripts/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $("#tableSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>

</html>