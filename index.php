<?php
session_start();
if($_SESSION['itlogin'] == ""){
    header('Location: /auth.php');
}else{
    $login = $_SESSION['itlogin'];
}

?>


<!DOCTYPE html>
<html lang="en">
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Doctor's Appointment</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "likari");
    $sql = "SELECT * FROM doctors";
    ?>
    <header></header>
    <div id="home-section-1" class="movie-show-container">
        <h1>Наші лікарі</h1>
        <h3>Оберіть лікаря, до якого треба провести запис на прийом</h3>

        <div class="movies-container">

            <?php
                        if($result = mysqli_query($link, $sql)){
                            $lines = mysqli_num_rows($result);
                            if(mysqli_num_rows($result) > 0){
                                for ($i = 0; $i <= $lines - 1; $i++){
                                    $row = mysqli_fetch_array($result);
                                    echo '<div class="movie-box">';
                                    echo '<img src="'. $row['Img'] .'" alt=" ">';
                                    echo '<div class="movie-info ">';
                                    echo '<h3>'. $row['Title'] .'</h3>';
                                    echo '<a href="booking.php?id='.$row['id'].'"><i class="fas fa-ticket-alt"></i> Записатись на прийом </a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">На даний момент немає вільних лікарів</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        
                        // Close connection
                        mysqli_close($link);
                        ?>
        </div>
    </div>
    <div id="home-section-2" class="services-section">
        <h1>Чому ми ?</h1>
        <h3>Переваги використання нашої поліклініки!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Зручний сервіс</h2>
                <p>Ви завжди можете записатись на прийом не виходичи з дому</p>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Оптимальні ціни</h2>
                <p>Ціновий діапазон наших лікарів меньше, за ринковий</p>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Сотні задоволених клієнтів</h2>
                <p>Ви завжди можете залишити відгук про работу наших лікарів</p>
            </div>
            <div class="service-item"></div>

        </div>
    </div>
    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title"> Не знаєте якого лікаря обрати ?</h1>
        <h3>Ознайомтеся з відео - прев'ю наших направлень !</h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/1.png" alt="">
                <div class="trailer-item-info" data-video="omvyaXXm520">
                    <h3>Неврологія</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/2.png" alt="">
                <div class="trailer-item-info" data-video="19y3hJKwUms">
                    <h3>Хірургія</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/3.png" alt="">
                <div class="trailer-item-info" data-video="jT2XCxHJG7E">
                    <h3>Дерматологія</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/4.png" alt="">
                <div class="trailer-item-info" data-video="mzWVIzewY80">
                    <h3>Педіатрія</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/5.png" alt="">
                <div class="trailer-item-info" data-video="u7UVoYwWgEs">
                    <h3>Ортопедія</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/6.png" alt="">
                <div class="trailer-item-info" data-video="miJTv2YPm10">
                    <h3>Онкологія</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>