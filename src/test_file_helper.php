<?php

function create_test_file($pvc_config, $filename, $filecontent){
    file_put_contents($pvc_config["testdir"] . "/" . $filename, $filecontent);
}

function create_version_test_file($pvc_config, $filename){
    $test_code = '<?php
    $version = explode(\'.\', phpversion());
    if (!empty($version)){
        echo $version[0] . \'.\' . $version[1];
    }
';
    create_test_file($pvc_config, $filename, $test_code);

}
