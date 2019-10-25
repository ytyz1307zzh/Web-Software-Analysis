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


# Produce the header for the reply page - do it here so
# error messages appear on the page

print header();

# Set names for file locking and unlocking

$LOCK = 2;
$UNLOCK = 8;

open(SURVDAT, "<data.txt") or error();
flock(SURVDAT, $LOCK);
@result_list = <SURVDAT>;
$list_length = @result_list;
flock(SURVDAT, $UNLOCK);
close(SURVDAT);

@delete_list = param("delete");
@rewrite_list = ();

for ($i = 0; $i < $list_length; $i++) {
    if (not $i ~~ @delete_list) {  # this instance is not deleted
        push(@rewrite_list, $result_list[$i]);
    }
}

# Open the survey data file for writing and lock it

open(SURVDAT, ">data.txt") or error();
flock(SURVDAT, $LOCK);
$rewrite_length = @rewrite_list;

for ($i = 0; $i < $rewrite_length; $i++) {
    print SURVDAT "$rewrite_list[$i]";
}

flock(SURVDAT, $UNLOCK);
close(SURVDAT);

# Build the Web page to thank the survey participant
print start_html("Delete");
$delete_length = @delete_list;
print "$delete_length ";
print "selected data have been successfully deleted.<br>";
print "To see the results of the questionare after deletion, click ".
 "<a href='/cgi-bin/hw3/list_results.pl' style='color:blue; text-decoration:none;'>here</a>.<br>";
print end_html();


