#!/usr/bin/perl -w
# conelec2.pl - display the survey results

use CGI ":standard";

# error - a function to produce an error message for the client
#         and exit in case of open errors

sub error {
    print "Error: data file could not be opened. Please try again later.<br/>";
    print end_html();
    exit(1);
}

# Begin main program
# Initialize file locking/unlocking parameter

$LOCK = 2;
$UNLOCK = 8;

print header();
# Open, lock, read, and unlock the survey data file

open(SURVDAT, "<data.txt") or error();
flock(SURVDAT, $LOCK);
@result_list = <SURVDAT>;
flock(SURVDAT, $UNLOCK);

# Create the beginning of the result Web page

print start_html("Survey Results");
print "<h2> Results of Zhihan's questionare",
      "</h2><br/> \n";

# how many pieces of data

$list_length = @result_list;

print start_form(-method=>"post",
                -action=>"/cgi-bin/hw3/delete_data.pl");

# Make the column titles array

@col_titles = ("Name", "Age", "Gender", "Email", "Delete");

# Create the column titles in HTML by giving their address to the th
#  function and storing the return value in the @rows array

@rows = th(\@col_titles);

# Now create the data rows with the td function
#  and add them to the row addresses array

for ($i = 0; $i < $list_length; $i++) {
    @data = split(/ /, $result_list[$i]);
    push(@data, "<input type = 'checkbox' name = 'delete' value = '$i'/>");
    push(@rows, td(\@data));
}

# Create the table for the female survey results
#  The address of the array of row addresses is passed to Tr

print table({-border => "border"},
            caption("<h3>Zhihan's Questionare</h3>"),
            Tr(\@rows)
           );

print '<input type="submit" style="margin-top: 20px;" value="Delete">';

print end_form();

print '<p style="margin-top: 20px;">'.
 '<a href="/hw3/qa.html" style="color:blue; text-decoration:none;">Return </p>';

print end_html();
close(SURVDAT);
