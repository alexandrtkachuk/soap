#!/usr/bin/perl -w

use File::Basename;;
use constant TDIR=>dirname(__FILE__);
use lib TDIR.'/Libs';


use SOAP::Lite;
use Data::Dumper;
my %args = (iGameId => 1 );

my $res;

# $res= SOAP::Lite
#-> service('http://footballpool.dataaccess.eu/data/info.wso?WSDL')
#-> AllStadiumInfo();

#print Dumper $res;

my $client= SOAP::Lite
-> service('http://footballpool.dataaccess.eu/data/info.wso?WSDL');
$client->proxy('http://footballpool.dataaccess.eu/data/info.wso' );

my @args = 
(
    {iGameId=>1}
);

$client->outputxml('true');

my $som = $client->GameInfo(1);

#my $result = $soap->c2f(37.5);
#unless ($result->fault) {
#    print $result->result();
#} else {
#    print join ', ', 
#    $result->faultcode, 
#    $result->faultstring;
#}

#my $som = $soap->call('sayHello', 'Kutter'); # обращаемся к сервису, метод sayHello

#die ( $som -> faultstring ( ) ) if ( $som -> fault ( ) ) ; # проверка, все ли хорошо

#my ( @result ) = $som->result() or die ( 'No result' ) ; # полученный результат помещается в массив

print "\n\n\n";

print Dumper($som);
