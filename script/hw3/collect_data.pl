#!/usr/bin/perl -w
# collect_data.pl
# This CGI program processes the questionare
# form and updates the data file

use CGI ":standard";

# error: a function to produce an error message for the client
# and exit in case of open errors

sub error {
    print "Error: data file could not be opened. Please try again later.<br/>";
    print end_html();
    exit(1);
}

# Begin main program
# Get the form values

my ($name, $age, $gender, $email) = (param("name"), param("age"), param("gender"), param("email"));

# Produce the header for the reply page - do it here so
# error messages appear on the page

print header();

# Set names for file locking and unlocking

$LOCK = 2;
$UNLOCK = 8;

# Set $index to the line index of the current vote

my $data_string = "$name $age $gender $email";


# Open the survey data file for writing and lock it

open(SURVDAT, ">>data.txt") or error();
flock(SURVDAT, $LOCK);

print SURVDAT "$data_string\n";

flock(SURVDAT, $UNLOCK);
close(SURVDAT);

# Build the Web page to thank the survey participant
print start_html("Thank you");
print "Thanks for filling out my questionare<br/>";
print '<p style="margin-top: 20px;">'.
 '<a href="/hw3/qa.html" style="color:blue; text-decoration:none;">Return </p>';
print end_html();

