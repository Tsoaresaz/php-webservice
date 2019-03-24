<?php
/**
 * Created by PhpStorm.
 * User: Família
 * Date: 24/03/2019
 * Time: 12:58
 */

namespace App\Model\Lib;

abstract class Config {

    const SITE = '';
    const LINK = '';
    const PASTE = '';

    /**
     * Config base Produção
     */
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const BASE = 'db_cad_cliente';
}