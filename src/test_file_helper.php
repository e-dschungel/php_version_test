<?php

/**
Creates test files
@param $pvc_config config variable
@param $filename filename to create
@param $filecontent conetent of the file to create
*/
function create_test_file($pvc_config, $filename, $filecontent){
    file_put_contents($pvc_config["test_base_path"] . "/" . $filename, $filecontent);
}

/**
Remove test file
@param $pvc_config config variable
@param $filename filename to remove
*/
function remove_test_file($pvc_config, $filename){
    unlink($pvc_config["test_base_path"] . "/" . $filename);
}

/**
Returns PHP code used to get the PHP Verison during the tests
@return PHP code used to get the PHP Verison during the tests
*/
function get_version_test_code(){
    $test_code = '<?php
    $version = explode(\'.\', phpversion());
    if (!empty($version)){
        echo $version[0] . \'.\' . $version[1];
    }
';
    return $test_code;
}

/**
Create file to test the PHP Version used
*/
function create_version_test_file($pvc_config, $filename){
    create_test_file($pvc_config, $filename, get_version_test_code());

}

/**
Return the output of a test
@param $pvc_config config variable
@param $filename filename of the test

@return output of test
*/
function get_version_test_output($pvc_config, $filename){
    //$user = $_SERVER['PHP_AUTH_USER'];
    //$pass = $_SERVER['PHP_AUTH_PASS'];

    /*if (!is_empty($user) && !is_empty($pass)){
        exit(1);
        //return file_get_contents("" $pvc_config["testdir"] . "/" . $filename);
    }*/
    //else{
        return file_get_contents($pvc_config["test_base_url"] . "/"  . $filename);
    //}
}
