<?php

require_once "config/config.php";
require_once "src/AbstractTest.php";
require_once "src/VersionExtensionTest.php";
require_once "src/ObsoleteCGIPHPTest.php";
require_once "src/ObsoletePHPXTest.php";
require_once "src/HandlerTest.php";
require_once "src/NewHandlerTest.php";
require_once "src/NewVersionExtensionTest.php";

$test = array(
    new eDschungel\VersionExtensionTest($pvc_config),
    new eDschungel\HandlerTest($pvc_config),
    new eDschungel\ObsoletePHPXTest($pvc_config),
    new eDschungel\ObsoleteCGIPHPTest($pvc_config),
    new eDschungel\NewVersionExtensionTest($pvc_config),
    new eDschungel\NewHandlerTest($pvc_config),
);

header("Content-Type: text/plain");
$nr_unexpected_versions = 0;
foreach ($test as $test_instance) {
    $nr_unexpected_versions += $test_instance->performAllTests();
}
if ($nr_unexpected_versions === 0) {
    print("No unexpected PHP version found.\n");
} else {
    print("Found " . $nr_unexpected_versions . " unexpected PHP versions!\n");
}
