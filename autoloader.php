<?php
function load (string $classname){
    include_once "$classname.php";
}
spl_autoload_register("load");