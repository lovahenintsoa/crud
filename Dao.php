<?php
class Dao{
private $server ="mysql:host=localhost:3308;dbname=tp_links";
private $user = "root";
private $pass = "";
private $option =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                       PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
 
                       
    protected $cnx;

    public function openConnection(){
        try{
            $this->cnx = new PDO($this->server,$this->user,$this->pass,$this->option);
           return $this->cnx; 

        }catch(PDOException $e){
echo "there is some problem in connexion : " .$e->getMessage();
        }
    }
        public function closeConnexion(){
            $this->cnx=null;
        }
    
}

