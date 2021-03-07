<?php

/**
Performs all version extension tests. Checks PHP version for different file extensions like ".php56"

@param $pvc_config config variable

@return void
*/
function performVersionExtensionTests($pvc_config)
{
    foreach ($pvc_config["version_extension_tests"] as $extension => $expected_version) {
        $testfilename = "extensiontest." . $extension;
        createVersionTestFile($pvc_config, $testfilename);
        $actual_version = getVersionTestOutput($pvc_config, $testfilename);
        if ($actual_version != $expected_version) {
            echo "Extension ." . $extension . " executes version " . $actual_version .
            " not the expenced version " . $expected_version . "!\n";
        }
        removeTestFile($pvc_config, $testfilename);
    }
}
