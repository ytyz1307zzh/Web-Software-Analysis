<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thank you</title>
    </head>
    <body>
        <?php
            $first_name = $_GET['Personal_FirstName'];
            $last_name = $_GET['Personal_LastName'];
            $age = $_GET['Personal_Age'];
            $sex = $_GET['Personal_Sex'];
            $id = $_GET['Personal_IDNumber'];
            $watch = $_GET['watch'];
            $holiday = $_GET['holiday'];
            $knowledge = $_GET['knowledge'];
            $chat = $_GET['chat'];
            print "<h2>Your Quiz Results</h2>";
            print "<hr><ul>";
            print "<li><b>Your First Name</b>: $first_name</li>";
            print "<li><b>Your Last Name</b>: $last_name</li>";
            print "<li><b>Your Age</b>: $age</li>";
            print "<li><b>Your Sex</b>: $sex</li>";
            print "<li><b>Your ID Number</b>: $id</li>";
            print "<li><b>Where do you want to spend a holiday:</b>: $holiday</li>";
            print "<li><b>How would you rate your knowledge of JavaScript?</b>: $knowledge</li>";
            print "<li><b>Chatbox</b>: $chat</li>";
            print "</ul>";
        ?>
        <p style="margin-top: 20px;">
        <a href="/hw5/wizardForm.html" style="color:blue; text-decoration:none;">Return</a>
        </p>
    </body>
</html>