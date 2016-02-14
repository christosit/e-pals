<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 9/6/2015
 * Time: 10:33 PM
 */

if ( (!isset($_SESSION['username'])) || (!isset($_COOKIE['keep_me'])) )
    { header("Location:login.php");}
