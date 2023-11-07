<?php
spl_autoload_register(function ($class) {
    require_once(dirname(__DIR__) . "\\model\\" . $class . ".php");
});
?>