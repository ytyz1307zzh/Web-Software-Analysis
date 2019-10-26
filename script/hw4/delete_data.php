<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Page</title>
    </head>
    <body>
        <?php
            $user = "usr_2019_15";
            $conn = mysqli_connect("127.0.0.1", $user, "zhangzhihan", "db_2019_15");

            if (!$conn) {
                die("Connection to database failed: " . mysqli_connect_error());
            }

            if (!array_key_exists('delete', $_POST)) {
                print "You did not select any data. Nothing was deleted.<br>";
                exit;
            }

            $delete_ids = $_POST['delete'];
            $delete_len = count($delete_ids);

            foreach ($delete_ids as $id) {
                $num = intval($id);
                $delete_query = "DELETE FROM guest_table
                                WHERE Guest_id = $num";
                //echo $delete_query . "<br>";
                $delete = mysqli_query($conn, $delete_query);
                if (!$delete) {
                    echo "Delete Error: " . mysqli_error($conn) . "<br>";
                } 
            }
            mysqli_close($conn);
            print "$delete_len selected data have been successfully deleted.<br>";
        ?>
        <p style="margin-top: 20px;">
        To see the guest information after deletion, click 
        <a href="/script/hw4/list_results.php" style="color:blue; text-decoration:none;">here</a>.
        </p>
    </body>
</html>