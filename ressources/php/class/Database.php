<?php

class Database
{
    private $login;
    private $password;
    private $host;
    private $db_name;

    public function __construct($login = "root", $password = "", $host = "localhost", $db_name = "projectix")
    {
        $this->login = $login;
        $this->password = $password;
        $this->host = $host;
        $this->db_name = $db_name;
    }
     
    private function setPDO(){
        try {
            $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name .';charset=utf8', $this->login, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        $this->pdo = $pdo;
        return $pdo;
    }

    public function request($request, $values, $type = '')
    {
        $request = $this->setPDO()->prepare($request);
        $request->execute($values);
        if ($type === 'select') {
            return $request->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $request;
        }
    }
}