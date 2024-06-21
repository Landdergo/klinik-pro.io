<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="style/styles.css">
    <title>Doctor's Appointment</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css"
    />
</head>



<body>
<header></header>
<body>
<div class="schedule-section">
    <div class="about-container">
        <div class="profile-image">
            <img src="images/team-member4.png" alt="" />
        </div>

        <div class="description" style="margin-bottom: 10%;">

            <p style="text-align: center">
                У нашому Центрі можуть запропонувати те, що часто не можуть кращі приватні клініки в Україні: Клініка проводить комплексні програми лікування онкологічних, неврологічних, серцево-судинних і аутоімунних захворювань; патологій, які потребують невідкладного хірургічного втручання. Коли мова йде про непростий діагноз, про захворювання, що вимагає комплексного підходу, то в роботі з пацієнтом беруть участь фахівці різних напрямків!
            </p>
            <p style="text-align: center">
                Наші операційні повністю відповідають міжнародним стандартам. Оснащення сучасним високотехнологічним обладнанням і високий рівень кваліфікації операційної команди медцентру дозволяють успішно проводити серйозні хірургічні втручання. В операційних встановлена особлива система вентиляції, що дозволяє безперервно знезаражувати приміщення і утримувати його в стерильності. Ми надаємо оперативну хірургічну допомогу по більшості напрямків.

            </p>

        </div>

        <div class="projects-container">
            <div class="project">
                <h3 class="project-name">Задоволених клієнтов</h3>
                <div class="project-number odometer websites-designed">0</div>
            </div>

            <div class="project">
                <h3 class="project-name">Лікарів співпрацює<h3>
                <div class="project-number odometer apps-developed">0</div>
            </div>
        </div>

        <h2 class="our-team-heading">Наша команда</h2>

        <div class="our-team">
            <div class="team-member">
                <img src="images/team-member1.png" alt="" />
                <div class="designation">
                    <strong>Войтенко Владимир Николаевич, </strong> (Голова відділу діагностики )
                </div>
            </div>

            <div class="team-member">
                <img src="images/team-member2.png" alt="" />
                <div class="designation">
                    <strong>Галич Юрий Петрович, </strong> (Голова відділу наркології))
                </div>
            </div>

            <div class="team-member">
                <img src="images/team-member3.png"  alt="" />
                <div class="designation">
                    <strong>Ворона Константин Николаевич, </strong> (Голова відділу анастезіології)
                </div>
            </div>
        </div>

        <div class="our-mission">
            <img class="quote-icon" src="images/quote-icon.png" alt="" />
            <p>Наша місія полягає у наданні кращих послуг для здоров'я наших клієнтів.</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>

    <script>
        const websitesDesigned = document.querySelector(".websites-designed");
        const appsdeveloped = document.querySelector(".apps-developed");

        setTimeout(() => {
            websitesDesigned.innerHTML = "74";
            appsdeveloped.innerHTML = "6";
        }, 400);
    </script>
</div>
<footer></footer>

<script src="scripts/jquery-3.3.1.min.js "></script>
<script src="scripts/owl.carousel.min.js "></script>
<script src="scripts/script.js "></script>
</body>

</html>