<?php 
namespace Models;
class Session
{
    public function __construct()
    {
        
    }
    public function get($mail, $pass){
        $sql = <<< SQL
                    SELECT * FROM AUTHORS WHERE Email = $mail
                    SQL;
        $userInfo = $this->pdo_connection->query($sql)->fetch();

        $test = password_verify($pass, $userInfo->Password);
        var_dump($test);
    }   
    public function create(){

    } 
    public function store(){

    }
    public function destroy(){

    }
}
