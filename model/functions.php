<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 11/8/2015
 * Time: 9:18 PM
 */


include 'connect.php';
//paradeigma
function get_user($key,$value,$dba)
{
    $q = "SELECT * FROM user WHERE $key='$value' ";
    $r = $dba->query($q);

    $data =  $r->fetch(PDO::FETCH_ASSOC);
    return $data;
}
//Apla kame to include, je na tin kaleseis me opio pedio theleis
//bb prepei na dkaivaso xari gia avrio
//Kalinicta