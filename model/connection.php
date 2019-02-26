<?php
//include '../config/config.php';


class Connection
{

protected $db =null;





public function Open()
{


    include '../config/config.php';

try {
$dsn      = "mysql:".$dbname."; host=".$dbhost;
$user     = $dbuser;
    $password = $dbpswd;

        $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE                      => PDO::FETCH_ASSOC,
        );
//        var_dump($dsn, $user, $password);





        $this->db = new PDO($dsn, $user, $password, $options);



        return $this->db;
        } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        }
        }
        public function Close()
        {
        $this->db = null;
        return true;
        }}


        
        ?>