<?php

/**
Creates files for handler tests.

@param $pvc_config config variable
@param $handler name of the handler, e.g. "php72-cgi"

@return void
*/
function createHandlerTestFiles($pvc_config, $handler)
{
    $htaccess_test_code = "AddHandler " . $handler . " .php";
    createTestFile($pvc_config, ".htaccess", $htaccess_test_code);
    createVersionTestFile($pvc_config, "handlertest.php");
}

/**
Removes files for handler tests.

@param $pvc_config config variable

@return void
*/
function removeHandlerTestFiles($pvc_config)
{
    removeTestFile($pvc_config, ".htaccess");
    removeTestFile($pvc_config, "handlertest.php");
}

/**
Performs all handler tests. Checks PHP version for different Add Handler settings

@param $pvc_config config variable

@return void
*/
function performHandlerTests($pvc_config)
{
    foreach ($pvc_config["handler_tests"] as $handler => $expected_version) {
        $testfilename = "handlertest.php";
        createHandlerTestFiles($pvc_config, $handler);
        $actual_version = getVersionTestOutput($pvc_config, $testfilename);
        if ($actual_version != $expected_version) {
            echo "Handler " . $handler . " executes version " . $actual_version .
             " not the expenced version " . $expected_version . "!\n";
        }
        removeHandlerTestFiles($pvc_config);
    }
}
