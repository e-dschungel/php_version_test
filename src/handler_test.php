<?php

function create_handler_test_file($pvc_config, $handler){
    $test_code = "AddHandler " . $handler . " .php";
    create_test_file($pvc_config, $filename, $test_code);
    create_test_file($pvc_config, ".htaccess", $test_code);

}


function perform_handler_tests($pvc_config){
    foreach ($pvc_config["handler_tests"] as $handler => $expected_version){
        $testfilename = "handlertest.php";
        create_handler_test_file($pvc_config, $extension);
        $actual_version = get_actual_version($pvc_config, $testfilename);
        if ($actual_version != $expected_version){
            echo "Handler ." . $handler . " executes version " . $actual_version . " not the expenced version " . $expected_version . "!\n";
        }
    }
}
