
<!DOCTYPE HTML >
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>SOAP Client </title>
 </head>
 <body>

    <div id="err" >
    <?php
        if(count($temp_err)>0)
        {
            echo '<p>Err:</p>';
            foreach($temp_err as $item )
            {   
                echo '<p>'.$item.'</p>';
            }
            
        }       

     ?>
        
    </div>
<div>
    <form method="POST">
        <label>id macth:</label>
        <input type="number" min="1" max="64"  name="id" value="<?php print  $content['id']; ?>" >
        <input type="submit">

    </form>
</div>

            <table>
            <tr>
            <td>data </td> 
                     <td><?php print   $content['str']['date']; ?></td>
            </tr>
            <tr>
            <td>time </td> 
            <td><?php print   $content['str']['time']; ?>  </td>
            </tr>
            <tr>
            <td>team 1</td> 
            <td><?php print   $content['str']['team1']['name']; ?>  
                <img src="<?php print   $content['str']['team1']['flag'];   ?>">
             </td>
            </tr>
            <tr>
            <td>team 2</td> 
            <td><?php print   $content['str']['team2']['name']; ?>  
                     <img src="<?php print $content['str']['team2']['flag']; ?>">
                 </td>
            </tr>
            <tr>
            <td>score</td> 
            <td><?php print   $content['str']['score']; ?> </td>
            </tr>

            </table>


<hr />
<?php

        for($i=0;$i<count($content['all'] );$i++)
        {
            print '<p>№<b>'. $content['all'][$i]['id'].'</b>'.
                $content['all'][$i]['team1']['name'].'<img src="'.$content['all'][$i]['team1']['flag'].'">'.
                '-'.
                $content['all'][$i]['team2']['name'].'<img src="'.$content['all'][$i]['team2']['flag'].'">'.
                '</p>';
        }
        //print $content['str'];
        /*

        foreach( $content as $item ){
            echo $item.'<hr />';        
        }*/
?> 
 </body>
</html> 
