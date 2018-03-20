<?php
/**
 *  MYWEB Simple CMS
 *  @autor João Vitor P.
 *  http://joaovitorp.com
 */

session_start();
//test

require_once __DIR__ . "/../core/bootstrap.php";

use Core\Session;
use Core\DbCreate;
Session::setVisit();



echo "<hr>";
var_dump($_SESSION);