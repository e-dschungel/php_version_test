<?php

function create_version_extension_test_file($pvc_config, $filename){
    $test_code = '<?php
    $version = explode(\'.\', phpversion());
    if (!empty($version)){
        echo $version[0] . \'.\' . $version[1];
    }
';
    create_test_file($pvc_config, $filename, $test_code);

}

function perform_version_extension_tests($pvc_config){
    foreach ($pvc_config["version_extension_tests"] as $extension => $expected_version){
        $testfilename = "extensiontest." . $extension;
        create_version_extension_test_file($pvc_config, $testfilename);
        $actual_version = get_actual_version($pvc_config, $testfilename);
        if ($actual_version != $expected_version){
            echo "Extension ." . $extension . " executes version " . $actual_version . " not the expenced version " . $expected_version . "!\n";
        }
    }
}

function get_actual_version($pvc_config, $filename){
    //$user = $_SERVER['PHP_AUTH_USER'];
    //$pass = $_SERVER['PHP_AUTH_PASS'];

    /*if (!is_empty($user) && !is_empty($pass)){
        exit(1);
        //return file_get_contents("" $pvc_config["testdir"] . "/" . $filename);
    }*/
    //else{
        return file_get_contents($pvc_config["base_url"] . "/" . $pvc_config["testdir"] . "/" . $filename);
    //}
}
