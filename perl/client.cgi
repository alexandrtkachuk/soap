#!/usr/bin/perl -w

use File::Basename;;
use constant TDIR=>dirname(__FILE__);
use lib TDIR.'/Libs';
use CGI qw/:standard/;

use SOAP::Lite;
use Data::Dumper;
my %args = (iGameId => 1 );

my $res;


my $client= SOAP::Lite
-> service('http://footballpool.dataaccess.eu/data/info.wso?WSDL');

my $id =1;

if (param && param('id')) 
{ # если присланы данные - параметры формы
      $id=  param('id');                
}

$client->readable(1);
my $som = $client->GameInfo($id);



print "Content-type: text/html\n\n";


print '<div>
    <form method="POST">
        <label>id macth:</label>
        <input type="number" min="1" name="id" value="'.$id.'" >
        <input type="submit">
        
    </form>
</div>
';


print '<table>
    <tr>
    <td>data </td> 
    <td>'.$som->{dPlayDate}.'</td>
    </tr>
    <tr>
    <td>time </td> 
    <td>'.$som->{tPlayTime}.'</td>
    </tr>
    <tr>
    <td>team 1</td> 
    <td>'.$som->{Team1}{sName}.' <img src="'.$som->{Team1}{sCountryFlag}.'"> </td>
    </tr>
    <tr>
    <td>team 2</td> 
    <td>'.$som->{Team2}{sName}.' <img src="'.$som->{Team2}{sCountryFlag}.'"> </td>
    </tr>
    <tr>
    <td>score</td> 
    <td>'.$som->{sScore}.'</td>
    </tr>
    </table>';


#print Dumper($som->{Team1}{sCountryFlag} );
