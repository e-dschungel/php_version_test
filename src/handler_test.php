<?php

/**
Creates files for handler tests.
@param $pvc_config config variable
@param $handler name of the handler, e.g. "php72-cgi"
*/

function create_handler_test_files($pvc_config, $handler){
    $htaccess_test_code = "AddHandler " . $handler . " .php";
    create_test_file($pvc_config, ".htaccess", $htaccess_test_code);
    create_version_test_file($pvc_config, "handlertest.php");
}

/**
Removes files for handler tests.
@param $pvc_config config variable
*/
function remove_handler_test_files($pvc_config){
    remove_test_file($pvc_config, ".htaccess");
    remove_test_file($pvc_config, "handler_test.php");
}

/**
Performs all handler tests. Checks PHP version for different Add Handler settings
@param $pvc_config config variable
*/
function perform_handler_tests($pvc_config){
    foreach ($pvc_config["handler_tests"] as $handler => $expected_version){
        $testfilename = "handlertest.php";
        create_handler_test_files($pvc_config, $handler);
        $actual_version = get_version_test_output($pvc_config, $testfilename);
        if ($actual_version != $expected_version){
            echo "Handler " . $handler . " executes version " . $actual_version . " not the expenced version " . $expected_version . "!\n";
        }
        remove_handler_test_files($pvc_config);
    }
}
