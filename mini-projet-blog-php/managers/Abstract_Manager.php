<?php

Abstract class AbstractManager{
    protected PDO $db;
    public function __construct()
    {
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "marlonngillet_blog_poo";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = "marlonngillet";
        $password = "90546c8030309af0425e11f2ac58fc5e";

        $this->db = new PDO(
            $connexionString,
            $user,
            $password
        );
    }
}
?>