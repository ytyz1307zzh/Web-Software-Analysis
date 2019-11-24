<?php

class View {

    public function thankyou() 
    {
        return 'Thanks for filling out my questionare';
    }

    public function display_result($results) 
    {
        print "<form method='post' action='/script/hw8/delete_data.php' 
        enctype='multipart/form-data'>\n";
        print "<table border='border'>\n";
        print "<caption> <h3>Guests</h3></caption>\n";
        print "<tbody>\n";
        print "<tr><th>Guest ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Email</th><th>Delete</th></tr>\n";

        foreach ($results as $row) {
            print "<tr><td>".$row['Guest_id']."</td><td>".htmlspecialchars($row['Guest_name'])."</td><td>".$row['Age']
            ."</td><td>".$row['Gender']."</td><td>".htmlspecialchars($row['Email'])."</td>
            <td><input type='checkbox' name='delete[]' value=".$row['Guest_id']."</td></tr>\n";
        }
        print "</tbody>\n</table>\n";
        print "<input type='submit' style='margin-top: 20px' value='Delete'>\n";
        print "</form>\n";
    }

    public function display_delete($delete_ids)
    {
        $delete_len = count($delete_ids);
        print "$delete_len selected data have been successfully deleted.<br>";
    }
}

?>