<?php

$pvc_config = array(
    "test_base_path" => "tests",
    "test_base_url" => "https://example.com",
    "version_extension_tests" => array(
      "php56" => "5.6",
      "php70" => "7.0",
      "php71" => "7.1",
      "php72" => "7.2",
      "php73" => "7.3",
      "php74" => "7.4",
      "php80" => "8.0",
    ),
    "handler_tests" => array(
      "php56-cgi" => "5.6",
      "php70-cgi" => "7.0",
      "php71-cgi" => "7.1",
      "php72-cgi" => "7.2",
      "php73-cgi" => "7.3",
      "php74-cgi" => "7.4",
      "php80-cgi" => "8.0",
    ),
    "new_handler_tests" => array(
      "php82-cgi",
    ),
    "new_version_extension_tests" => array(
      "php82",
    ),
    "perform_version_extension_test" => true,
    "perform_handler_test" => true,
    "perform_new_version_extension_test" => true,
    "perform_new_handler_test" => true,
    "perform_obsolete_PHPX_test" => false,
    "perform_obsolete_CGIPHP_test" => false,
);
