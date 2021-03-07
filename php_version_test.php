<?php

require_once "config/config.php";
require_once "src/test_file_helper.php";
require_once "src/version_extension_test.php";
require_once "src/obsolete_test.php";
require_once "src/handler_test.php";


performVersionExtensionTests($pvc_config);
performHandlerTests($pvc_config);
performObsoleteTests($pvc_config);
