<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Congratulations</title>
    </head>
    <body>
        <?php
            $user = "usr_2019_15";
            $conn = mysqli_connect("127.0.0.1", $user, "zhangzhihan", "db_2019_15");

            if (!$conn) {
                die("Connection to database failed: " . mysqli_connect_error());
            }

            $select_parties = $_POST['select'];
            $guest_id = $_GET['id'];
            $select_len = count($select_parties);
            
            foreach ($select_parties as $party_id) {
                $party_id = intval($party_id);
                $insert_query = "INSERT INTO party_guest (Guest_id, Party_id)
                                VALUES ($guest_id, $party_id)";
                //echo $insert_query."<br>";

                $insert = mysqli_query($conn, $insert_query);
                if (!$insert) {
                    echo "Insert Error: " . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
            print "<h3>You have successfully select $select_len parties!</h3>";
        ?>
        <p style="margin-top: 20px;">
        <a href="/hw4/qa.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>