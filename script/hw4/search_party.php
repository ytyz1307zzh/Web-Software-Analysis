<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Party Results</title>
    </head>
    <body>
        <h2>Available Parties</h2><br>
        <?php
            $user = "usr_2019_15";
            $conn = mysqli_connect("127.0.0.1", $user, "zhangzhihan", "db_2019_15");

            if (!$conn) {
                die("Connection to database failed: " . mysqli_connect_error());
            }

            $host = addslashes($_POST['host']);

            $sql_query = "SELECT * FROM party_table
                        WHERE Host = '$host';";

            $results = mysqli_query($conn, $sql_query);
            if (!$results) {
                echo "Query Error: " . mysqli_error($conn);
            }
            
            if (mysqli_num_rows($results) > 0) {
                print "<table border='border'>\n";
                print "<caption> <h3>Matched Parties</h3></caption>\n";
                print "<tbody>\n";
                print "<tr><th>Party ID</th><th>Location</th><th>Time</th><th>Host</th></tr>\n";
                while ($row = mysqli_fetch_assoc($results)) {
                    print "<tr><td>".$row['Party_id']."</td><td>".htmlspecialchars($row['Party_location'])."</td><td>"
                    .htmlspecialchars($row['Party_time'])."</td><td>".htmlspecialchars($row['Host'])."</td></tr>\n";
                }
                print "</tbody>\n</table>\n";
            }
            else {
                print "<h3>No matched results found.</h3>";
            }

            mysqli_close($conn);
        ?>
        <p style="margin-top: 20px;">
        <a href="/hw4/hw4.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>