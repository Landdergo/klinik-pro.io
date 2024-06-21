<!DOCTYPE html>
<html lang="en">
<?php
$a = date('Y-m-d'); // ISO формат для поточної дати

$day2 = date("Y-m-d", strtotime("+1 day"));
$day3 = date("Y-m-d", strtotime("+2 day"));
$day4 = date("Y-m-d", strtotime("+3 day"));
$day5 = date("Y-m-d", strtotime("+4 day"));
$days = [$a, $day2, $day3, $day4, $day5];
$id = $_GET['id'];
$link = mysqli_connect("localhost", "root", "", "likari");

$movieQuery = "SELECT * FROM doctors WHERE id = $id";
$movieImageById = mysqli_query($link, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Запис до лікаря <?php echo $row['Title']; ?></title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body style="background-color:#6e5a11;">
<div class="booking-panel">
    <div class="booking-panel-section booking-panel-section1">
        <h1>Будь ласка, заповніть форму для запису на прийом до лікаря!</h1>
    </div>
    <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
        <i class="fas fa-2x fa-times"></i>
    </div>
    <div class="booking-panel-section booking-panel-section3">
        <div class="movie-box">
            <?php
            echo '<img src="'.$row['Img'].'" alt="">';
            ?>
        </div>
    </div>
    <div class="booking-panel-section booking-panel-section4">
        <div class="title"><?php echo $row['Title']; ?></div>
        <div class="movie-information">
            <table>
                <tr>
                    <td>ВАРТІСТЬ ПРИЙОМУ</td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
                <tr>
                    <td>СПЕЦІАЛІЗАЦІЯ</td>
                    <td><?php echo $row['description']; ?></td>
                </tr>
                <tr>
                    <td>АДРЕСА ПРИЙОМУ</td>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                    <td>ДОСВІД</td>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <tr>
                    <td>ПРАКТИКИ</td>
                    <td><?php echo $row['specializations']; ?></td>
                </tr>
            </table>
        </div>
        <div class="booking-form-container">
            <form action="" method="POST">
                <input placeholder="Ваше ім'я" type="text" name="fName" required>
                <input placeholder="Ваше прізвище" type="text" name="lName">
                <input placeholder="Ваш номер телефону" type="text" name="pNumber" required>

                <select name="date" required>
                    <option value="" disabled selected>Дата прийому</option>
                    <?php
                    foreach ($days as $day) {
                        echo '<option value="' . $day . '">' . date("d.m.Y", strtotime($day)) . '</option>';
                    }
                    ?>
                </select>

                <select name="time" required>
                    <option value="" disabled selected>Час прийому</option>
                    <option value="08:00">08:00 AM</option>
                    <option value="09:00">09:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">01:00 PM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="17:00">05:00 PM</option>
                </select>

                <button type="submit" value="submit" name="submit" class="form-btn">Залишити заявку</button>
                <?php
                if(isset($_POST['submit'])){
                    $fName = $_POST['fName'];
                    $lName = $_POST['lName'];
                    $pNumber = $_POST['pNumber'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];

                    $insert_query = "INSERT INTO bookings (Doctorid, Name, Lname, Phone, BookingDate, BookingTime)
                                         VALUES ('".$row['id']."', '$fName', '$lName', '$pNumber', '$date', '$time')";
                    mysqli_query($link, $insert_query);
                }
                ?>
            </form>
        </div>
    </div>
</div>

<script src="scripts/jquery-3.3.1.min.js "></script>
<script src="scripts/script.js "></script>
</body>

</html>