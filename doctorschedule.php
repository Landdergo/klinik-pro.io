<?php
session_start();
if ($_SESSION['itlogin'] == "") {
    header('Location: /auth.php');
    exit();
} else {
    $login = $_SESSION['itlogin'];
    $id = $_SESSION['id'];
}

$link = mysqli_connect("localhost", "root", "", "likari");

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$sql = "SELECT * FROM bookings WHERE Doctorid = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$bookings = [];
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

$stmt->close();
$link->close();
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
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <title>Ваші записи</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
<header></header>
<div mt="150px" class="container">
    <div id='calendar'></div>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/owl.carousel.min.js"></script>
<script src="scripts/script.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        var bookings = <?php echo json_encode($bookings); ?>;
        var events = bookings.map(function(booking) {
            return {
                id: booking.bookingID,
                title: '<div style="text-align: center;">' + booking.BookingTime + '<br>' + booking.Name + ' ' + booking.Lname + '</div>',
                start: booking.BookingDate + 'T' + booking.BookingTime
            };
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            editable: false,
            events: events,
            eventRender: function(event, element) {
                element.html(event.title);
            }
        });
    });
</script>
</body>

</html>