-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 07 2024 р., 15:17
-- Версія сервера: 8.0.30
-- Версія PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `likari`
--

-- --------------------------------------------------------

--
-- Структура таблиці `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int NOT NULL,
  `Doctorid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Lname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BookingDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BookingTime` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `bookings`
--

INSERT INTO `bookings` (`bookingID`, `Doctorid`, `Name`, `Lname`, `Phone`, `BookingDate`, `BookingTime`) VALUES
(39, '1', 'sgsgdsg', 'tgsgdsgs', '15152515', '2024-06-09', '11:00'),
(40, '1', 'Олександр', 'Іванов', '+380123456781', '2024-06-09', '09:00:00'),
(41, '1', 'Марія', 'Петрова', '+380123456782', '2024-06-09', '10:00:00'),
(42, '1', 'Олена', 'Сидорова', '+380123456783', '2024-06-09', '11:00:00'),
(43, '1', 'Андрій', 'Коваленко', '+380123456784', '2024-06-10', '09:00:00'),
(44, '1', 'Катерина', 'Зайцева', '+380123456785', '2024-06-10', '10:00:00'),
(45, '1', 'Дмитро', 'Савченко', '+380123456786', '2024-06-10', '11:00:00'),
(46, '1', 'Олег', 'Мельник', '+380123456787', '2024-06-11', '09:00:00'),
(47, '1', 'Ірина', 'Ткаченко', '+380123456788', '2024-06-11', '10:00:00'),
(48, '1', 'Віктор', 'Романенко', '+380123456789', '2024-06-11', '11:00:00'),
(49, '1', 'Сергій', 'Кириленко', '+380123456780', '2024-06-12', '09:00:00'),
(50, '1', 'Наталія', 'Кучма', '+380123456781', '2024-06-12', '10:00:00'),
(51, '1', 'Юлія', 'Гриценко', '+380123456782', '2024-06-12', '11:00:00'),
(52, '1', 'Богдан', 'Шевченко', '+380123456783', '2024-06-13', '09:00:00'),
(53, '1', 'Ольга', 'Василенко', '+380123456784', '2024-06-13', '10:00:00'),
(54, '1', 'Максим', 'Гончар', '+380123456785', '2024-06-13', '11:00:00'),
(55, '1', 'Тетяна', 'Литвин', '+380123456786', '2024-06-14', '09:00:00'),
(56, '1', 'Ілля', 'Шаповал', '+380123456787', '2024-06-14', '10:00:00'),
(57, '1', 'Марина', 'Рябова', '+380123456788', '2024-06-14', '11:00:00');

-- --------------------------------------------------------

--
-- Структура таблиці `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `Img` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `experience` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `specializations` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `doctors`
--

INSERT INTO `doctors` (`id`, `Img`, `Title`, `price`, `description`, `address`, `experience`, `specializations`) VALUES
(1, 'img/likar1.jpg', 'Авраменко Ганна Володимирівна', '300 грн.', 'Лікар-дерматовенеролог, дитячий дерматолог', 'Київ, філія на Оболоні, ст. м. «Мінська»', '4 роки', 'Видалення новоутворень шкіри Лікування вугрової хвороби, розацеа, дерматитів, грибкових і вірусних захворювань (герпес, бородавки, контагіозний молюск), алергодерматозів, стрептодермії, екземи'),
(2, 'img/likar2.jpg', 'Мухоморов Андрій Євгенович', '400 грн.', 'Лікар-психіатр вищої категорії, психотерапевт, нарколог', 'Київ, філія на Печерську, ст. м. «Либідська»', '37 років', 'Відновлення працездатності при психосоматичних розладах Розлади нервової системи Порушення психіки Розлади сексуального потягу Наркотична та алкогольна залежність Корекція особистісних проблем'),
(3, 'img/likar3.jpg', 'Атаманенко Тетяна Миколаївна', '350 грн.', 'Подолог', 'Київ, філія на Чернігівській, ст. м. «Чернігівська»', '4 роки', 'Медичний апаратний педикюр Видалення стрижневої мозолі Оброблення оніхомікозів Корекція, встановлення скоб Лікування тріщин на стопі Лікування врослого нігтя Оброблення діабетичної стопи'),
(4, 'img/likar4.jpg', 'Афанасьєва Лариса Олександрiвна', '380 грн.', 'Лікар-фізіотерапевт вищої категорії', 'Київ, філія на Чернігівській, ст. м. «Чернігівська»', '35 років', 'Нетримання сечі всіх типів Нетримання калу Хронічні закрепи Післяродова реабілітація дисфункції м\'язів тазового дна Середні форми опущення матки Відновлення після операції на тазовому дні'),
(5, 'img/likar5.jpg', 'Бабак Микола Володимирович', '320 грн.', 'Лікар-хірург першої категорії, дитячий хірург, проктолог', 'Київ, філія на Оболоні, ст. м. «Мінська»', '31 рік', 'Геморой Тріщина прямої кишки Аноректальний тромбоз Анальні поліпи та кондиломи Проктосигмоідит Апендицит Холецистит Кишкова непрохідність Перфоративна виразка шлунку грижі Гнійна хірургія'),
(6, 'img/likar6.jpg', 'Бабак Ярослава Василівна', '300 грн.', 'Лікар-офтальмолог другої категорії, дитячий офтальмолог', 'Київ, філія на Чернігівській, ст. м. «Чернігівська»', '8 років', 'Аномалії рефракції: міопія (включно з дегенеративною формою), спазм акомодації, гіперметропія, пресбіопія, астигматизм, анізометропія Запальні захворювання ока: кон\'юктивіт, кератит, епісклерит');

-- --------------------------------------------------------

--
-- Структура таблиці `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `id` int NOT NULL,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `feedbacktable`
--

INSERT INTO `feedbacktable` (`id`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`) VALUES
(5, 'Alex', 'Dikkens', '', 'sdggdg');

-- --------------------------------------------------------

--
-- Структура таблиці `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `record_date` date DEFAULT NULL,
  `record_time` time DEFAULT NULL,
  `complaint` text COLLATE utf8mb4_general_ci,
  `examination` text COLLATE utf8mb4_general_ci,
  `additional_info` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `treatment` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `medical_records`
--

INSERT INTO `medical_records` (`id`, `patient_id`, `doctor_id`, `record_date`, `record_time`, `complaint`, `examination`, `additional_info`, `description`, `treatment`) VALUES
(11, 1, 2, '2024-06-01', '10:00:00', 'Біль у горлі', 'Огляд горла, вимірювання температури, прослуховування легенів', 'Неможливість ковтати, почервоніння горла', 'Перший огляд пацієнта з підозрою на ангіну. Температура 37.5°C, горло червоне, без нальоту. Лімфатичні вузли не збільшені.', 'Антибіотик Амоксицилін, полоскання горла Фурациліном, жарознижувальний Ібупрофен'),
(12, 1, 2, '2024-06-05', '11:00:00', 'Висока температура, біль у горлі', 'Повторний огляд горла, вимірювання температури, аналіз крові', 'Температура 39°C, підвищені лейкоцити в аналізі крові', 'Результати аналізу крові: лейкоцитоз, підвищення ШОЕ. Підтвердження бактеріальної інфекції. Горло червоне, з нальотом. Температура висока.', 'Заміна антибіотика на Аугментин, полоскання горла розчином соди, жарознижувальний Парацетамол'),
(13, 1, 3, '2024-06-10', '09:30:00', 'Слабкість, головний біль', 'Огляд загального стану, вимірювання артеріального тиску, аналіз крові', 'Підозра на вірусну інфекцію, низький тиск', 'Консультація з терапевтом: слабкість, головний біль, температура 37.0°C. Артеріальний тиск 100/60 мм рт.ст. Аналіз крові в межах норми.', 'Підвищення імунітету: Вітамін С, багато рідини, відпочинок. Знеболювальний Ібупрофен.'),
(14, 1, 3, '2024-06-15', '10:15:00', 'Проблеми з диханням, кашель', 'Прослуховування легенів, флюорографія, аналіз мокротиння', 'Підозра на пневмонію, хрипи в легенях', 'Проміжний огляд: у пацієнта задовільний стан, кашель з мокротинням, задишка при фізичному навантаженні. Флюорографія: ознаки запалення в нижніх долях легенів.', 'Антибіотик Левофлоксацин, відхаркувальні препарати Амброксол, інгаляції з фізрозчином'),
(15, 1, 4, '2024-06-20', '12:00:00', 'Кашель, біль у грудях', 'Повторна флюорографія, прослуховування легенів, вимірювання сатурації', 'Поліпшення стану, зменшення кашлю', 'Заключний огляд: кашель зменшився, біль у грудях майже пройшов, сатурація 98%. Флюорографія: відсутність ознак запалення.', 'Закінчити курс антибіотика, продовжити прийом відхаркувальних препаратів, фізіотерапія для відновлення дихальних функцій.');

-- --------------------------------------------------------

--
-- Структура таблиці `tests`
--

CREATE TABLE `tests` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `test_type` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `doctor_id`, `test_type`, `status`) VALUES
(1, 1, 1, 'Аналіз крові', 'призначено'),
(2, 1, 1, 'Аналіз сечі', 'призначено'),
(3, 1, 1, 'Рентген', 'проведено'),
(4, 1, 1, 'Аналіз крові', 'призначено'),
(17, 1, 1, 'Аналіз крові', 'призначено');

-- --------------------------------------------------------

--
-- Структура таблиці `test_results`
--

CREATE TABLE `test_results` (
  `id` int NOT NULL,
  `test_id` int DEFAULT NULL,
  `result` text COLLATE utf8mb4_general_ci,
  `document` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `test_results`
--

INSERT INTO `test_results` (`id`, `test_id`, `result`, `document`) VALUES
(13, 1, 'Норма', NULL),
(14, 2, 'Підвищений рівень білка', NULL),
(15, 3, 'Без патологій', NULL),
(16, 4, 'Норма', NULL),
(18, 3, 'Все в нормі', 'frame_1707525738.png');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sname` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sname`, `lname`, `password`, `city`, `role`) VALUES
(1, 'user1', 'Олександр', 'Олександров', 'Олександрович', 'user1', 'Україна', 'пацієнт'),
(2, 'patient1', 'Іван', 'Іванов', 'Іванович', 'password1', 'Київ', 'пацієнт'),
(3, 'patient2', 'Петро', 'Петров', 'Петрович', 'password2', 'Львів', 'пацієнт'),
(4, 'patient3', 'Марія', 'Марченко', 'Іванівна', 'password3', 'Одеса', 'пацієнт'),
(21, 'patient4', 'Олена', 'Коваленко', 'Сергіївна', 'password4', 'Харків', 'пацієнт'),
(22, 'patient5', 'Андрій', 'Тарасов', 'Миколайович', 'password5', 'Дніпро', 'пацієнт'),
(23, 'patient6', 'Віктор', 'Сидоров', 'Павлович', 'password6', 'Запоріжжя', 'пацієнт'),
(24, 'patient7', 'Наталія', 'Мельник', 'Петрівна', 'password7', 'Луцьк', 'пацієнт'),
(25, 'patient8', 'Михайло', 'Гончар', 'Андрійович', 'password8', 'Полтава', 'пацієнт'),
(26, 'patient9', 'Олександр', 'Кравченко', 'Олексійович', 'password9', 'Вінниця', 'пацієнт'),
(27, 'patient10', 'Юлія', 'Бондаренко', 'Олегівна', 'password10', 'Черкаси', 'пацієнт');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `bookingID_2` (`bookingID`),
  ADD KEY `bookingID_3` (`bookingID`),
  ADD KEY `bookingID_4` (`bookingID`);

--
-- Індекси таблиці `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movieID` (`id`);

--
-- Індекси таблиці `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `msgID` (`id`);

--
-- Індекси таблиці `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Індекси таблиці `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Індекси таблиці `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблиці `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблиці `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблиці `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tests_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `test_results_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
