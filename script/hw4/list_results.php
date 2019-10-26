<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guest Results</title>
    </head>
    <body>
        <h2>Guest information</h2><br>
        <?php
            $user = "usr_2019_15";
            $conn = mysqli_connect("127.0.0.1", $user, "zhangzhihan", "db_2019_15");

            if (!$conn) {
                die("Connection to database failed: " . mysqli_connect_error());
            }

            $sql_query = "SELECT * FROM guest_table;";

            $results = mysqli_query($conn, $sql_query);
            if (!$results) {
                echo "Query Error: " . mysqli_error($conn);
            }
            
            if (mysqli_num_rows($results) > 0) {
                print "<form method='post' action='/script/hw4/delete_data.php' 
                enctype='multipart/form-data'>\n";
                print "<table border='border'>\n";
                print "<caption> <h3>Guests</h3></caption>\n";
                print "<tbody>\n";
                print "<tr><th>Guest ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Email</th><th>Delete</th></tr>\n";
                while ($row = mysqli_fetch_assoc($results)) {
                    print "<tr><td>".$row['Guest_id']."</td><td>".htmlspecialchars($row['Guest_name'])."</td><td>".$row['Age']
                    ."</td><td>".$row['Gender']."</td><td>".htmlspecialchars($row['Email'])."</td>
                    <td><input type='checkbox' name='delete[]' value=".$row['Guest_id']."</td></tr>\n";
                }
                print "</tbody>\n</table>\n";
                print "<input type='submit' style='margin-top: 20px' value='Delete'>\n";
                print "</form>\n";
            }
            mysqli_close($conn);
        ?>
        <p style="margin-top: 20px;">
        <a href="/hw4/qa.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>