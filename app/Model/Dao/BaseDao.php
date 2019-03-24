<?php
/**
 * Created by PhpStorm.
 * User: Thiago Soares
 * Date: 24/03/2019
 * Time: 13:47
 */

namespace App\Model\Dao;

use App\Model\Lib\Connect;

abstract class BaseDao {

    private $connect;

    public function __construct() {
        $this->connect = Connect::connectBase();
    }

    public function selectAll($sql) {

        if(!empty($sql)) {
           return $this->connect->query($sql);
        }
    }

    public function selectByTerm($sql, array $params) {

        $stmt = $this->connect->prepare($sql);

        $this->setParams($stmt, $params);

        return $stmt;
    }

    public function insert($sql, array $params) {

        $stmt = $this->connect->prepare($sql);

        $this->setParams($stmt, $params);

        $stmt->execute();
        return $this->connect->lastInsertId();
    }

    private function setParams($stmt, $params) {
        foreach($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
    }

}