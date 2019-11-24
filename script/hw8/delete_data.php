<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Page</title>
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
            $delete_ids = $_POST['delete'];
            $controller->delete($delete_ids);
        ?>
        <p style="margin-top: 20px;">
        To see the guest information after deletion, click 
        <a href="/script/hw8/list_results.php" style="color:blue; text-decoration:none;">here</a>.
        </p>
    </body>
</html>