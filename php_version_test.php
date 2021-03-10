<?php

require_once "config/config.php";
require_once "src/abstract_test.php";
require_once "src/version_extension_test.php";
require_once "src/obsolete_CGIPHP_test.php";
require_once "src/obsolete_PHPX_test.php";
require_once "src/handler_test.php";


$test = array(
    new VersionExtensionTest($pvc_config),
    new HandlerTest($pvc_config),
    new ObsoletePHPXTest($pvc_config),
    new ObsoleteCGIPHPTest($pvc_config)
);


foreach ($test as $test_instance) {
    $test_instance->performAllTests();
}
