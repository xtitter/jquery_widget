<?php

$cough_path = 'coughphp-1.3.5/';

require_once($cough_path . 'load.inc.php');
require_once($cough_path . 'as_database/load.inc.php');    //?
CoughDatabaseFactory::addConfig(array(
    'db_name_hash' => array(
        'isetimeline' => 'isetimeline'
    ),
    'driver' => 'mysql',
    'host' => 'localhost',
    'user' => 'isetimeline',
    'pass' => 'local',
    'port' => 3306


));

require_once($cough_path . 'extras/Autoloader.class.php');
Autoloader::addClassPath('models/');
Autoloader::setCacheFilePath('cache/class_path_cache.txt');
//Autoloader::excludeFolderNamesMatchingRegex('/^CVS|\..*$/');
spl_autoload_register(array('Autoloader', 'loadClass'), false);  // added false to remove stupid cough errors I can't figure out...



////  other library stuff, why not

function show_and_quit($obj) {
    echo "<pre>";print_r($obj);echo "</pre>"; die();
}


//report success/failure
function report_success($msg = "") {
    if (empty($msg)) {
        spit_out_json_and_quit(array(true));
    } else {
        spit_out_json_and_quit(array(true, $msg));
    }
}

function report_failure($errstr) {
    spit_out_json_and_quit(array(false, $errstr));
}





// return a json structure
function spit_out_json_and_quit($obj) {
    
    // do error checking here!
    $ret = json_encode($obj);
    
    header('Content-type: application/json');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");  // Date in the past
    echo($ret);
    exit();
}
?>