<?php

require_once "config/config.php";
require_once "src/test_file_helper.php";
require_once "src/version_extension_test.php";
require_once "src/obsolete_test.php";
require_once "src/handler_test.php";


perform_version_extension_tests($pvc_config);
perform_handler_tests($pvc_config);
perform_obsolete_tests($pvc_config);
