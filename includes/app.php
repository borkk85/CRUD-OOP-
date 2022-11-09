<?php 


function autoload($className) {

    include 'classes/' . $className . '.class.php';

}

spl_autoload_register("autoload");

?>