<?php
/**
 * Created by PhpStorm.
 * User: Família
 * Date: 24/03/2019
 * Time: 15:00
 */

namespace App\Model\Validate;


class ResultValidate {

    public $error = [];

    public function setError($field, $message) {
        $this->error[$field] = $message;
    }

    public function getError() {
        return $this->error;
    }

}