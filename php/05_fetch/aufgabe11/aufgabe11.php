<?php
function my_autoload($class_name)
{
    $file = 'classes/'.$class_name.'.php';
    if(file_exists($file)){
        require_once ($file);
        echo "<br>";
        echo "file included: $file <br>";
    }else{
        echo "file not found: $file<br>";
    }
}
spl_autoload_register('my_autoload');

//check db connection status
DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);

$Hello = new Hello();
echo $Hello->sayHello();