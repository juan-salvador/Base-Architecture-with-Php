<?php
namespace Core;


class ConnectionDb
{
    CONST MYSQL = "mysql";

    CONST SQLSERVER = "sqlserver";

    CONST ORACLE = "oracle";

    private $user;

    private $password;

    private $host;

    private $database;

    protected $connection;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
        $this->database = getenv('DB_NAME');
        $nameConexion = self::MYSQL.":host=".$this->host.";dbname=".$this->database.";";
        try {
            $this->connection = new \PDO($nameConexion, $this->user, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $pdo){
            echo "Error en la conexión: ".$pdo->getMessage();
            exit;
        }
    }

}