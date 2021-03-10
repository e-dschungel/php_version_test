<?php

require_once "config/config.php";
require_once "src/abstract_test.php";
require_once "src/version_extension_test.php";
require_once "src/obsolete_CGIPHP_test.php";
require_once "src/obsolete_PHPX_test.php";
require_once "src/handler_test.php";


$test = array(
    new eDschungel\VersionExtensionTest($pvc_config),
    new eDschungel\HandlerTest($pvc_config),
    new eDschungel\ObsoletePHPXTest($pvc_config),
    new eDschungel\ObsoleteCGIPHPTest($pvc_config)
);


$nr_unexpected_versions = 0;
foreach ($test as $test_instance) {
    $nr_unexpected_versions += $test_instance->performAllTests();
}
if ($nr_unexpected_versions === 0) {
    print("No unexpected PHP version found.");
} else {
    print("Found " . $nr_unexpected_versions . " unexpected PHP versions!");
}
