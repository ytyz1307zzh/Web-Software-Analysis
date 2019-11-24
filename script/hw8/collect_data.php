<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thank you</title>
        <?php 
            include "Model.php";
            include "View.php";
            include "Controller.php";
            $model = new Model("127.0.0.1", "usr_2019_15", "zhangzhihan", "db_2019_15");
            $controller = new Controller($model, new View());
        ?>
    </head>
    <body>
        <?php
            $controller->insert($_POST);
            $controller->thankyou();
        ?>
        <p style="margin-top: 20px;">
        <a href="/hw8/qa.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>