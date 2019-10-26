<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thank you</title>
    </head>
    <body>
        <?php
            $user = "usr_2019_15";
            $conn = mysqli_connect("127.0.0.1", $user, "zhangzhihan", "db_2019_15");

            if (!$conn) {
                die("Connection to database failed: " . mysqli_connect_error());
            }

            $location = addslashes($_POST['location']);
            $time = addslashes($_POST['time']);
            $host = addslashes($_POST['host']);

            $insert_query = "INSERT INTO party_table (Party_location, Party_time, Host)
                            VALUES ('$location', '$time', '$host')";
            //echo $insert_query."<br>";

            $insert = mysqli_query($conn, $insert_query);
            if (!$insert) {
                echo "Insert Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        ?>
        <h3>Thanks for organizing the party!</h3>
        <p style="margin-top: 20px;">
        <a href="/hw4/organizer.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>