<?php
namespace Framework;

use PDO;
use Exception;
use PDOException;
use PDOStatement;

class Database
{
    public $conn;
    public $stm;


    /**
     * Construct for Database Class
     * 
     * @param array $config
     */
    public function __construct(array $config)
    {
        $dsn = "{$config['driver']}:host={$config['host']};port={$config['port']};dbname={$config['db']};";


        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];
        try
        {
            $this->conn = new PDO($dsn, $config['user'], $config['password'], $options);

        } catch (PDOException $e)
        {
            throw new Exception("Unable to connect: " . $e->getMessage());
        }
    }


    /**
     * query database
     *
     * @param  string $query
     * @param  array $param
     * @return PDOStatement
     * @exception PDOException
     */
    public function query(string $query, array $params = []): PDOStatement
    {

        try
        {
            $smt = $this->conn->prepare($query);
            foreach ($params as $param => $value)
            {
                $smt->bindValue(':' . $param, $value);
            }
            $smt->execute();
            return $smt;
        } catch (PDOException $e)
        {
            throw new \Exception("Query failed to execute: " . $e->getMessage());
        }
    }


}