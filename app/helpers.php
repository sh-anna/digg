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