<?php
session_start();
if ($_SESSION['itlogin'] == "") {
    header('Location: /auth.php');
    exit();
} else {
    $login = $_SESSION['itlogin'];
    $user_type = $_SESSION['type'];
    $user_id = $_SESSION['id'];
}

$link = mysqli_connect("localhost", "root", "", "likari");

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

if ($user_type == 'doctor' && isset($_POST['submit'])) {
    $patient_id = $_POST['patient_id'];
    $complaint = $_POST['complaint'];
    $examination = $_POST['examination'];
    $additional_info = $_POST['additional_info'];
    $description = $_POST['description'];
    $treatment = $_POST['treatment'];
    $record_date = date('Y-m-d');
    $record_time = date('H:i:s');

    $insert_query = "INSERT INTO medical_records (patient_id, doctor_id, record_date, record_time, complaint, examination, additional_info, description, treatment) VALUES ('$patient_id', '$user_id', '$record_date', '$record_time', '$complaint', '$examination', '$additional_info', '$description', '$treatment')";
    mysqli_query($link, $insert_query);
}

$patient_id = $user_type == 'пацієнт' ? $user_id : $_GET['id'];
$patient_query = "SELECT name, sname, lname FROM users WHERE id = $patient_id";
$patient_result = mysqli_query($link, $patient_query);
$patient = mysqli_fetch_assoc($patient_result);

$records_query = "SELECT medical_records.*, users.name AS doctor_name, users.sname AS doctor_sname, users.lname AS doctor_lname FROM medical_records JOIN users ON medical_records.doctor_id = users.id WHERE patient_id = $patient_id";
$records_result = mysqli_query($link, $records_query);
$records = mysqli_fetch_all($records_result, MYSQLI_ASSOC);

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
    <title>Медична картка пацієнта</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        .record-block {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .record-block h3 {
            margin-top: 0;
            color: #333;
        }
        .record-block p {
            margin-bottom: 10px;
            color: #555;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-container .form-group {
            margin-bottom: 15px;
        }
        .form-container .form-control {
            border-radius: 5px;
        }
        .form-container .btn {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: white;
        }
    </style>
</head>

<body>
<header></header>
<div mt="150px" class="container">
    <h1>Медична картка пацієнта: <?php echo "{$patient['name']} {$patient['sname']} {$patient['lname']}"; ?></h1>

    <?php if ($user_type == 'doctor') { ?>
        <div class="form-container">
            <h2>Додати новий запис</h2>
            <form action="" method="POST">
                <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                <div class="form-group">
                    <label for="complaint">Жалоба:</label>
                    <textarea name="complaint" id="complaint" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="examination">Проведене обстеження:</label>
                    <textarea name="examination" id="examination" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="additional_info">Додаткова інформація:</label>
                    <textarea name="additional_info" id="additional_info" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Опис:</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="treatment">Призначене лікування:</label>
                    <textarea name="treatment" id="treatment" class="form-control" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn">Додати запис</button>
            </form>
        </div>
    <?php } ?>

    <h2>Записи</h2>
    <?php foreach ($records as $record) { ?>
        <div class="record-block">
            <h3>Лікар: <?php echo "{$record['doctor_name']} {$record['doctor_sname']} {$record['doctor_lname']}"; ?></h3>
            <p><strong>Дата:</strong> <?php echo $record['record_date']; ?></p>
            <p><strong>Час:</strong> <?php echo $record['record_time']; ?></p>
            <p><strong>Жалоба:</strong> <?php echo $record['complaint']; ?></p>
            <p><strong>Проведене обстеження:</strong> <?php echo $record['examination']; ?></p>
            <p><strong>Додаткова інформація:</strong> <?php echo $record['additional_info']; ?></p>
            <p><strong>Опис:</strong> <?php echo $record['description']; ?></p>
            <p><strong>Призначене лікування:</strong> <?php echo $record['treatment']; ?></p>
        </div>
    <?php } ?>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/owl.carousel.min.js"></script>
<script src="scripts/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#complaint').select2();
        $('#examination').select2();
        $('#additional_info').select2();
        $('#description').select2();
        $('#treatment').select2();
    });
</script>
</body>

</html>