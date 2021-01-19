<?php

require_once 'db_config.php';
/* 
* Restore last value to a field.
*
* @param $fn string The field name.
* @return string  last value from field.
*/
function old($fn){
    return $_REQUEST[$fn] ?? '';
}
/*
* edd comment
*/
function email_exist($link, $email){
    $exist = false;
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    if( $result && mysqli_num_rows($result) > 0){
        $exist = true;
    }

    return $exist;

}