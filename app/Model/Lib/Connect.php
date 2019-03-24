<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 12:47
 */

namespace App\Model\Lib;

use PDO;
use PDOException;
use Exception;

class Connect extends Config {

    private static $connection;

    public function __construct() {

    }

    public static function connectBase() {

        try {
            if(!isset($connection)) {
                self::$connection = new PDO("mysql:host=".Config::HOST.";dbname=".Config::BASE."", Config::USER, Config::PASS);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            }
            return self::$connection;
        } catch(PDOException $e) {
            throw new Exception('Falha na conexão ao banco de dados: '. $e->getMessage(), 500);
        }
    }
}
