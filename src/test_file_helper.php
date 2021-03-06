<?php

function create_test_file($pvc_config, $filename, $filecontent){
    file_put_contents($pvc_config["testdir"] . "/" . $filename, $filecontent);
}
