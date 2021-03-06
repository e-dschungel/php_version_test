<?php

function perform_version_extension_tests($pvc_config){
    foreach ($pvc_config["version_extension_tests"] as $extension => $expected_version){
        $testfilename = "extensiontest." . $extension;
        create_version_test_file($pvc_config, $testfilename);
        $actual_version = get_version_test_output($pvc_config, $testfilename);
        if ($actual_version != $expected_version){
            echo "Extension ." . $extension . " executes version " . $actual_version . " not the expenced version " . $expected_version . "!\n";
        }
    }
}
