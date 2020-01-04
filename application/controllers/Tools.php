<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {
        public function __construct() {
        parent::__construct();
    }
        public function test(){
       phpinfo();
    }

        
        public function gentable($tb_name) {
         $query = $this->db->query('DESCRIBE '.$tb_name);        
echo '<?php';
echo '<br/>';
echo 'defined('."'".'BASEPATH'."'".') OR exit('."'".'No direct script access allowed'."'".');';
echo '<br/>';
echo 'class Mod_'.$tb_name.' extends CI_Model {';
echo '<br/>';     

echo '    public function __construct() {';
echo "<br/>";    
echo '        parent::__construct();;';
echo "<br/>";
echo '    }';
echo '<br/>';

        foreach ($query->result() as $row)
        {      
            echo 'public $'.$row->Field .';<br/>';      
        }
                        
        echo'public function DatatoObj($data)<br/>';
        echo'{<br/>';
        foreach ($query->result() as $row)
        {        
        echo '$this->'.$row->Field.'=$data->'.$row->Field.";<br/>";
        }    
        echo "}<br/>";                
        echo"<br/>";




        echo 'public function ObjData()<br/>';
        echo'{<br/>';
        echo'$obj = array( <br/>';
        foreach ($query->result() as $row)
        {  
                echo "'".$row->Field."'=>".'$this->'.$row->Field.',<br/>' ;               
        }
        echo ');<br/>';
        echo 'return $obj;<br/>';
       //->Company_ABB =
        echo'}<br/>';        
        echo '[ <br/>';
        echo '{ <br/>';
        foreach ($query->result() as $row){
            echo  $row->Field.':"",<br/>';
        }  
        echo "</br>";
        echo 'use strict';
        echo "</br>";
        echo "export default class ". $tb_name ." {";
        echo "</br>";    
        echo'constructor() {';
            echo "</br>";
            foreach ($query->result() as $row)
            {      
                echo '  this.'.$row->Field .'='.'"'.'";<br/>';      
            }   
            echo'}'; 
        echo "</br>";    
        echo'this.DatatoObj=function(data){';
            echo "</br>";   
            foreach ($query->result() as $row)
            {      
                echo '  this.'.$row->Field .'='.'data.'.$row->Field .';<br/>';      
            }             
            echo'}';   
            echo "</br>";             
            echo'}';    
     
        
        }     
           
}
