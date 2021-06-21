<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление маршрута</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        * {
        box-sizing: border-box;
        /* font-family: sans-serif; */
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Ubuntu', sans-serif;
        }

        table {
        border-spacing: 0 10px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        }

        th {
        padding: 10px 20px;
        background: #56433D;
        color: #F9C941;
        border-right: 2px solid; 
        font-size: 0.9em;
        }

        th:first-child {
        text-align: left;
        }

        th:last-child {
        border-right: none;
        }

        td {
        vertical-align: middle;
        padding: 10px;
        font-size: 14px;
        text-align: center;
        border-top: 2px solid #56433D;
        border-bottom: 2px solid #56433D;
        border-right: 2px solid #56433D;
        }

        td:first-child {
        border-left: 2px solid #56433D;
        }

        input[type=email], input[type=date], input[type=text], input[type=password], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }

        label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        }

        button, input[type=submit], input[type=reset], input[type=button] {
        background-color: #4CAF50;
        width: 50%;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: center;
        font-size: 1.3em;
        }

        input[type=reset] {
            float: left;
        }

        button:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover {
        background-color: #45a049;
        }

        .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        }

        .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
        }

        .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
        }

        .printInfo {
        border-radius: 20px;
        border: 3px solid #ccc;
        background-color: #f4f4f4;
        width: 300px; 
        height: 420px;
        }

        .printInfo img {
        border-radius: 20px 20px 0 0;
        width: 100%;
        overflow: hidden;
        }

        .information {
        font-size: 1.2em;
        font-weight: bold;
        }

        .countryCode {
        float: right;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <input type="button" value="На главную" onclick="window.location.href='./index.php'">
        </div>
    </center>
</body>
<?php
    $conn = new mysqli("localhost", "root", "", "airport");
    if ($conn->connect_error)
        die("Ошибка подключения к БД:\n " . $conn->connect_error);
    
    
    
    $sql = "INSERT INTO route (CodeRoute, Destination, Class, Price, PassengerCode)
        VALUES (\"{$_POST["code"]}\", \"{$_POST["dest"]}\", \"{$_POST["class"]}\", {$_POST["price"]}, {$_POST["passanger1"]})";
    if ($conn->query($sql) === TRUE)
        echo "<center><h2>Новый маршрут был успешно добавлен!</h2></center>";
    else
        echo "Произошла ошибка:\n " . $sql . "<br>" . $conn->error;
    
    $conn->close();
?>
</html>