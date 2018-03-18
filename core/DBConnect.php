<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 18/02/18
 * Time: 19:31
 */

namespace Core;

use PDO;
use \PDOException;

abstract class DBConnect
{

    private static $pdo;


    public static function getConn()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD);
            } catch (PDOException $e) {
                echo "<strong>Erro ao conectar com o banco:</strong> ".$e->getMessage();
            }
        }
        return self::$pdo;
    }

}