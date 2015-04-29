#!/usr/bin/perl 

use warnings;
use strict;

use File::Basename;;
use constant TDIR=>dirname(__FILE__);
use lib TDIR.'/Libs';
use CGI;
use Data::Dumper;
use SOAP::Lite;

print SOAP::Lite
-> proxy('http://services.soaplite.com/hibye.cgi')
-> uri('http://www.soaplite.com/Demo')
-> hi()
-> result;
#print Dumper $res;





print "happy end \n";
