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

            $guest_name = addslashes($_POST['name']);
            $guest_age = $_POST['age'];
            $guest_gender = $_POST['gender'];
            $guest_email = addslashes($_POST['email']);

            $insert_query = "INSERT INTO guest_table (Guest_name, Age, Gender, Email)
                            VALUES ('$guest_name', $guest_age, '$guest_gender', '$guest_email')";
            //echo $insert_query."<br>";

            $insert = mysqli_query($conn, $insert_query);
            if (!$insert) {
                echo "Insert Error: " . mysqli_error($conn);
            }

            print "<h3>Thanks for filling out the questionare!</h3>";
            print "<p>Now you have registered our event, so you can attend any parties you like!</p><br>";

            $sql_query = "SELECT * FROM party_table;";
            $guest_id = mysqli_insert_id($conn);

            $results = mysqli_query($conn, $sql_query);
            if (!$results) {
                echo "Query Error: " . mysqli_error($conn);
            }
            
            if (mysqli_num_rows($results) > 0) {
                print "<form method='post' action='/script/hw4/join_party.php?id=$guest_id' 
                enctype='multipart/form-data'>\n";
                print "<table border='border'>\n";
                print "<caption> <h3>Parties</h3></caption>\n";
                print "<tbody>\n";
                print "<tr><th>Party ID</th><th>Location</th><th>Time</th><th>Host</th><th>Select</th></tr>\n";
                while ($row = mysqli_fetch_assoc($results)) {
                    print "<tr><td>".$row['Party_id']."</td><td>".htmlspecialchars($row['Party_location'])."</td><td>"
                    .htmlspecialchars($row['Party_time'])."</td><td>".htmlspecialchars($row['Host'])."</td>
                    <td><input type='checkbox' name='select[]' value=".$row['Party_id']."</td></tr>\n";
                }
                print "</tbody>\n</table>\n";
                print "<input type='submit' style='margin-top: 20px' value='Join!'>\n";
                print "</form>\n";
            }
            mysqli_close($conn);
        ?>
        <p style="margin-top: 20px;">
        <a href="/hw4/qa.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>