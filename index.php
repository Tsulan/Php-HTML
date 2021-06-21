<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Экзамен</title>
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

        input[type=file], input[type=number], input[type=email], input[type=date], input[type=text], input[type=password], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: none;
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
        margin: 20px;
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
            <input type="button" value="Показать пассажиров" onclick="actionForm('showPassanger')">
            <br><br>
            <input type="button" value="Показать маршруты" onclick="actionForm('showRoute')">
            <br><br>
            <input type="button" value="Добавить пассажира" onclick="actionForm('addPassanger')">
            <br><br>
            <input type="button" value="Добавить маршрут" onclick="actionForm('addRoute')">
            <br><br>
            <input type="button" value="Поиск пассажира и его пункта назначения" onclick="actionForm('searchPassangerAndRoute')">
            <br><br>
            <input type="button" value="Поиск по пункту назначения и классу" onclick="actionForm('searchByDestAndClass')">
            <br><br>
            <input type="button" value="Удалить товар" onclick="actionForm('addForm')">
            <br><br>
           
            
            <div style="display: none;" id="addForm">
                <h1>Удаление товара</h1>

                <form action="./deleteProducts.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="product" placeholder="Название продукта..">
                    <br><br>
                    <input type="submit" value="Подтвердить">
                </form>
            </div>

            <div style="display: none;" id="showPassanger">
                <h1>Вывод пассажиров</h1>

                <form action="./searchPassangers.php" method="post">
                    <input type="submit" value="Подтвердить">
                </form>
            </div>

            <div style="display: none;" id="showRoute">
                <h1>Вывод маршрутов</h1>

                <form action="./searchRoutes.php" method="post">
                    <input type="submit" value="Подтвердить">
                </form>
            </div>

            <div style="display: none;" id="addPassanger">
                <h1>Добавление пассажира</h1>

                <form action="./addPassangers.php" method="post">
                    <input type="text" name="surname" placeholder="Фамилия пассажира..">
                    <br><br>
                    <input type="text" name="name" placeholder="Имя пассажира..">
                    <br><br>
                    <input type="number" name="tel" placeholder="Телефон пассажира..">
                    <br><br>
                    <input type="submit" value="Подтвердить">
                </form>
            </div>

            <div style="display: none;" id="addRoute">
                <h1>Добавление маршрута</h1>

                <form action="./addRoutes.php" method="post">
                    <input type="number" name="code" placeholder="Номер маршрута..">
                    <br><br>
                    <input type="text" name="dest" placeholder="Пункт назначения..">
                    <br><br>
                    <select name="class">
                        <option value="Econom">Econom</option>
                        <option value="Business">Business</option>
                        <option value="Premium">Premium</option>
                    </select>
                    <br><br>
                    <input type="number" name="price" placeholder="Цена..">
                    <br><br>
                    <?php
                        $conn = new mysqli("localhost", "root", "", "airport");
                        if ($conn->connect_error)
                            die("Ошибка подключения к БД:\n " . $conn->connect_error);
                    
                        echo "<select name=passanger1>"; 

                        $sql="SELECT PassengerCode, Surname, Name FROM passenger"; 
                        $stmt=$conn->prepare($sql);
                        $stmt->execute(); 
                        
                        $info=$stmt->get_result(); 
                        
                        if($info->num_rows>0){ 
                            while($row=$info->fetch_assoc()){ 
                                echo "<option value=".$row['PassengerCode'].">" .$row['Surname']. " " .$row['Name']. "</option>"; 
                            } 
                        } 
                        echo "</select>";

                        $conn->close();
                    ?>
                    <br><br>
                    <input type="submit" value="Подтвердить">
                </form>
            </div>

            <div style="display: none;" id="searchPassangerAndRoute">
                <h1>Поиск пассажира и его пунктов назначения</h1>

                <form action="./searchPassangerRoute.php" method="post">
                    <?php
                        $conn = new mysqli("localhost", "root", "", "airport");
                        if ($conn->connect_error)
                            die("Ошибка подключения к БД:\n " . $conn->connect_error);
                    
                        echo "<select name=passanger2>";

                        $sql="SELECT PassengerCode, Surname, Name FROM passenger"; 
                        $stmt=$conn->prepare($sql);
                        $stmt->execute(); 
                        
                        $info=$stmt->get_result(); 
                        
                        if($info->num_rows>0){ 
                            while($row=$info->fetch_assoc()){ 
                                echo "<option value=".$row['PassengerCode'].">" .$row['Surname']. " " .$row['Name']. "</option>"; 
                            } 
                        } 
                        echo "</select>";

                        $conn->close();
                    ?>
                    <br><br>
                    <input type="submit" value="Подтвердить">
                </form>
            </div>

            <div style="display: none;" id="searchByDestAndClass">
                <h1>Поиск пассажиров по пункту назначения и классу</h1>

                <form action="./searchByDestAndClass.php" method="post">
                    <?php
                        $conn = new mysqli("localhost", "root", "", "airport");
                        if ($conn->connect_error)
                            die("Ошибка подключения к БД:\n " . $conn->connect_error);
                    
                        echo "<select name=destin>";

                        $sql="SELECT DISTINCT Destination FROM route"; 
                        $stmt=$conn->prepare($sql);
                        $stmt->execute(); 
                        
                        $info=$stmt->get_result(); 
                        
                        if($info->num_rows>0){ 
                            while($row=$info->fetch_assoc()){ 
                                echo "<option value=".$row['Destination'].">" .$row['Destination']. "</option>"; 
                            } 
                        } 
                        echo "</select>";

                        $conn->close();
                    ?>
                    <br><br>
                    <select name="airclass">
                        <option value="Econom">Econom</option>
                        <option value="Business">Business</option>
                        <option value="Premium">Premium</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Подтвердить">
                </form>
            </div>
        </div>
    </center>
</body>
<script>
    function actionForm(e) 
    {
        if (e == "addForm") {
            document.getElementById("showPassanger").style.display = 'none';
            document.getElementById("showRoute").style.display = 'none';
            document.getElementById("addPassanger").style.display = 'none';
            document.getElementById("addRoute").style.display = 'none';
            document.getElementById("searchPassangerAndRoute").style.display = 'none';
            document.getElementById("searchByDestAndClass").style.display = 'none';
        }
        else if (e == "showPassanger") {
            document.getElementById("addForm").style.display = 'none';
            document.getElementById("showRoute").style.display = 'none';
            document.getElementById("addPassanger").style.display = 'none';
            document.getElementById("addRoute").style.display = 'none';
            document.getElementById("searchPassangerAndRoute").style.display = 'none';
            document.getElementById("searchByDestAndClass").style.display = 'none';
        }
        else if (e == "showRoute") {
            document.getElementById("addForm").style.display = 'none';
            document.getElementById("showPassanger").style.display = 'none';
            document.getElementById("addPassanger").style.display = 'none';
            document.getElementById("addRoute").style.display = 'none';
            document.getElementById("searchPassangerAndRoute").style.display = 'none';
            document.getElementById("searchByDestAndClass").style.display = 'none';
        }
        else if (e == "addPassanger") {
            document.getElementById("addForm").style.display = 'none';
            document.getElementById("showPassanger").style.display = 'none';
            document.getElementById("showRoute").style.display = 'none';
            document.getElementById("addRoute").style.display = 'none';
            document.getElementById("searchPassangerAndRoute").style.display = 'none';
            document.getElementById("searchByDestAndClass").style.display = 'none';
        }
        else if (e == "addRoute") {
            document.getElementById("addForm").style.display = 'none';
            document.getElementById("showPassanger").style.display = 'none';
            document.getElementById("showRoute").style.display = 'none';
            document.getElementById("addPassanger").style.display = 'none';
            document.getElementById("searchPassangerAndRoute").style.display = 'none';
            document.getElementById("searchByDestAndClass").style.display = 'none';
        }
        else if (e == "searchPassangerAndRoute") {
            document.getElementById("addForm").style.display = 'none';
            document.getElementById("showPassanger").style.display = 'none';
            document.getElementById("showRoute").style.display = 'none';
            document.getElementById("addPassanger").style.display = 'none';
            document.getElementById("addRoute").style.display = 'none';
            document.getElementById("searchByDestAndClass").style.display = 'none';
        }
        else if (e == "searchByDestAndClass") {
            document.getElementById("addForm").style.display = 'none';
            document.getElementById("showPassanger").style.display = 'none';
            document.getElementById("showRoute").style.display = 'none';
            document.getElementById("addPassanger").style.display = 'none';
            document.getElementById("addRoute").style.display = 'none';
            document.getElementById("searchPassangerAndRoute").style.display = 'none';
        }
            
        let x = document.getElementById(e);

        if (x.style.display == 'none')
            x.style.display = 'inline';
        else
            x.style.display = 'none';
	}
</script>
</html>