<?php
class Sql
{

    protected static  $me;
    protected static  $CDB;
    protected $query;
    protected $qStart;
    protected $tables;
    protected $limit;
    protected $retResult; 

    private function __construct()
    {
        /*conect to DB
         * */
        self::$CDB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME ,USER, PASS);
        self::$CDB->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $this->limit='LIMIT 10';  
        $this->where='';
        $this->retResult=false; //vozvrashaet li zapros znachenie
    }

    private function __clone()
    {

    }
    
    public function goQuery($q,$params, $r = true)
    {
        $t=self::query($q, $params);
       
        if($this->retResult===true)
        {
            $r=$this->getResult($t);
        }
        $this->meReset(); 
        return $r;
    }

    protected static function query($q, $params )
    {   
        /*delaem zapros i return result
         * */

        
        #throw new Exception($q);
        $t=self::$CDB->prepare($q);
        if($params)
        {
            #$t->bindParam(':name','sasha',PDO::PARAM_STR,5);
            $t->execute($params );
            
        }
        else
        {
            $t->execute();
        }
        return $t;
    }

    public function Select()
    {
        //vse argumentu perevodim v stroku
        $str=$this->getArgs(func_get_args());
        
        if($str===false)
        {
            return false;
        }
                    
        $this->query ='SELECT '.$str. ' FROM %tableName% ';
        $this->retResult=true;
        return $this;
    }

    
    public function setTables()
    {   
        //polu4aem spisok tablic v vide stroki
        $this->tables=$this->getArgs(func_get_args());
        if(false===$this->tables )
        {
            return false;
        }       

        return $this;
    
    }   

    public static function getMee()
    {   
        /*
         * Create static  class singlton*/

        if(isset(self::$me) ===false )
        {
            self::$me = new self();
            #return self::$me;
        }
            return self::$me;
        return false;
    }

    protected function getResult($t )
    {
        /*
         *result qery to array
         * */

        $mas=array();

        while($r = $t->fetchObject())
        {     
            //foreach
            $mas[]=$r;

        }

        return $mas;
    }
    
    public function Result($params=false)
    {                
        if(isset($this->tables)===false)
        {
            return false;
        }
        elseif(strlen($this->query)<5)
        {
            return false;

        }
        
        $this->query=str_replace('%tableName%',$this->tables,$this->query);
        

        if(false!==$this->where )
        {
            $this->query.=' '.$this->where;
        
        }

        if(false!==$this->limit)
        {
            $this->query.=' '.$this->limit; 
        }
        
        #echo $this->query;
        $t=self::query($this->query, $params);
       
        #var_dump($t);
        
        $r=true;
        if($this->retResult===true)
        {
            $r=$this->getResult($t);
        }
        $this->meReset(); 
        return $r;
    
    
    }
    
    public function getQuery()
    {
        return $this->query;
    }

    protected function meReset()
    {
        //reset values 
        $this->limit='LIMIT 10';  
        $this->where='';
        $this->retResult=false;    
        return true;

    }

    public function Limit($start , $end=false)
    {
        if(false===$this->limit)
        {
            return false;
        }
        
        if(false===$end)
        {
            $this->limit='LIMIT '.$start;
        }
        else
        {
            $this->limit='LIMIT '.$start.','.$end;
        }

        return $this;

    }



    public function Insert()
    {   
        $args=func_get_args();

        if(count($agrs)<0)
        {
            return false;
        }
        
        $colums=array();
        $values=array();

        for($i=0;$i<count($args);$i+=2)
        {
            $colums[]=$args[$i];
        }
        
        for($i=1;$i<count($args);$i+=2)
        {
            $values[]=$args[$i];
        }

        
        $colums=$this->getArgs($colums);
        $values=$this->getArgsToString($values);

        $this->query='INSERT INTO  %tableName% ('.$colums.' ) VALUES ('.$values.')';
        
        $this->limit=false;
        $this->where=false;

        return $this;
    }


    public function Update()
    { 
        
        $args=func_get_args();

        if(count($agrs)<0)
        {
            return false;
        }

        $str;

        for($i=0;$i<count($args);$i+=2)
        {   
            $t=$args[$i+1];
            if('string'==gettype($t))
            {
                $t='"'.$t.'"';
            }

            if($i+2>=count($args) )
            {
                $str.=$args[$i].'='.$t;
            }
            else
            {
                $str.=$args[$i].'='.$t.', ';
            }
        }

        $this->query='UPDATE  %tableName%  SET '.$str;
        
        return $this;
    }

    public function Where($uslovie, $delitel='OR')
    {   
       
        if(false===$this->where)
        {
            return false;
        }
        

        if(strlen($this->where)>0)
        {
            $this->where.=' '.$delitel.' '.$uslovie;
        }
        else
        {
            $this->where.='WHERE '.$uslovie;
        }

        return $this;
    }


    public function Delete($tabName)
    {

        $this->setTables($tabName)->query='DELETE FROM  %tableName%';

        return $this;
    
    }


    protected function  getArgs($args)
    {         
        /*
         *argumentu s funcii mu convertiruem v string;
         * */
        $numargs = count($args);

        if($numargs<1)
        {
            return false;
        }

        $mass='';


        for($i=0;$i<$numargs;$i++)
        {   

            if('*'==trim($args[$i]))
            {
                return false;
            }

            if($i==$numargs-1)
            {
                $mass.=$args[$i];
            }
            else
            {
                $mass.=$args[$i].', ';
            }

        }
    
        return $mass;

    }
    
    protected function  getArgsToString($args,$skobka='"')
    {         
        /*
         *argumentu s funcii mu convertiruem v string;
         * i takge otbiraet po tipam
         * */

        $numargs = count($args);

        if($numargs<1)
        {
            return false;
        }

        $mass='';


        for($i=0;$i<$numargs;$i++)
        {   

            $t=$args[$i];
            if('string'==gettype($t))
            {
                if($t!='?')
                {
                    $t=$skobka.$t.$skobka;
                }
            }
            

            if($i==$numargs-1)
            {
                $mass.=$t;
            }
            else
            {
                $mass.=$t.', ';
            }

        }
    
        return $mass;

    }
}
