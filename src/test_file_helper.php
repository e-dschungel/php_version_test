<?php

function create_test_file($pvc_config, $filename, $filecontent){
    file_put_contents($pvc_config["test_base_path"] . "/" . $filename, $filecontent);
}

function remove_test_file($pvc_config, $filename){
    unlink($pvc_config["test_base_path"] . "/" . $filename);
}

function get_version_test_code(){
    $test_code = '<?php
    $version = explode(\'.\', phpversion());
    if (!empty($version)){
        echo $version[0] . \'.\' . $version[1];
    }
';
    return $test_code;
}

function create_version_test_file($pvc_config, $filename){
    create_test_file($pvc_config, $filename, get_version_test_code());

}

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
