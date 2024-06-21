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

$success_message = "";

if (isset($_POST['submit'])) {
    if ($user_type == 'doctor') {
        $user_id = $_POST['user'];
        $test_type = $_POST['test_type'];

        $insert_query = "INSERT INTO tests (user_id, doctor_id, test_type, status) VALUES ('$user_id', '$doctor_id', '$test_type', 'призначено')";
        if (mysqli_query($link, $insert_query)) {
            $success_message = "Призначення на аналіз створено успішно!";
        }
    } elseif ($user_type == 'nurse') {
        $test_id = $_POST['test_id'];
        $result = $_POST['result'];

        // Обробка завантаження файлу
        $target_dir = "documents/";
        $target_file = $target_dir . basename($_FILES["document"]["name"]);
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            $document = basename($_FILES["document"]["name"]);
        } else {
            $document = "";
        }

        $update_query = "INSERT INTO test_results (test_id, result, document) VALUES ('$test_id', '$result', '$document')";
        if (mysqli_query($link, $update_query)) {
            $update_status_query = "UPDATE tests SET status='проведено' WHERE id='$test_id'";
            mysqli_query($link, $update_status_query);
            $success_message = "Результати аналізу успішно внесені!";
        }
    }
}

$users_query = "SELECT id, name, sname, lname FROM users";
$users_result = mysqli_query($link, $users_query);
$users = mysqli_fetch_all($users_result, MYSQLI_ASSOC);

$tests_query = "SELECT tests.id, users.name, users.sname, users.lname, tests.test_type, tests.status 
                FROM tests 
                JOIN users ON tests.user_id = users.id 
                WHERE tests.doctor_id = $doctor_id";
$tests_result = mysqli_query($link, $tests_query);
$tests = mysqli_fetch_all($tests_result, MYSQLI_ASSOC);

$results_query = "SELECT test_results.id, test_results.test_id, test_results.result, test_results.document, users.name, users.sname, users.lname, tests.test_type 
                  FROM test_results 
                  JOIN tests ON test_results.test_id = tests.id 
                  JOIN users ON tests.user_id = users.id
                  WHERE tests.status = 'проведено'";
$results_result = mysqli_query($link, $results_query);
$results = mysqli_fetch_all($results_result, MYSQLI_ASSOC);

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
    <title>Аналізи</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
<?php if ($success_message): ?>
    <script>
        alert('<?php echo $success_message; ?>');
    </script>
<?php endif; ?>
<header></header>
<div>
    <div mt="150px" class="container">
        <?php if ($user_type == 'doctor'): ?>
            <h1>Призначити аналіз</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="user">Оберіть пацієнта:</label>
                    <select name="user" id="user" class="form-control" required>
                        <option value="" disabled selected>Оберіть пацієнта</option>
                        <?php foreach ($users as $user) {
                            echo "<option value='{$user['id']}'>{$user['name']} {$user['sname']} {$user['lname']}</option>";
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="test_type">Тип аналізу:</label>
                    <select name="test_type" id="test_type" class="form-control" required>
                        <option value="" disabled selected>Оберіть тип аналізу</option>
                        <option value="Аналіз крові">Аналіз крові</option>
                        <option value="Аналіз сечі">Аналіз сечі</option>
                        <option value="Рентген">Рентген</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 1%; margin-left: 40%;">Призначити аналіз</button>
            </form>
        <?php endif; ?>

        <?php if ($user_type == 'nurse'): ?>
            <h1>Заповнити результати аналізів</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="test_id">Оберіть призначений аналіз:</label>
                    <select name="test_id" id="test_id" class="form-control" required>
                        <option value="" disabled selected>Оберіть аналіз</option>
                        <?php foreach ($tests as $test) {
                            if ($test['status'] == 'призначено') {
                                echo "<option value='{$test['id']}'>{$test['name']} {$test['sname']} {$test['lname']} - {$test['test_type']}</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="result">Результат:</label>
                    <textarea name="result" id="result" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="document">Документ:</label>
                    <input type="file" name="document" id="document" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 1%; margin-left: 40%;">Заповнити результат</button>
            </form>
        <?php endif; ?>

        <h2 class="mt-5">Результати аналізів</h2>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>Пацієнт</th>
                <th>Тип аналізу</th>
                <th>Результат</th>
                <th>Документ</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $result) {
                echo "<tr>
                        <td>{$result['name']} {$result['sname']} {$result['lname']}</td>
                        <td>{$result['test_type']}</td>
                        <td>{$result['result']}</td>
                        <td><a href='/documents/{$result['document']}' target='_blank'>Переглянути документ</a></td>
                      </tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/owl.carousel.min.js"></script>
<script src="scripts/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#user').select2();
        $('#test_type').select2();
        $('#test_id').select2();
    });
</script>
</body>

</html>