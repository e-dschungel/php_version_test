<?php

$pvc_config = array(
    "test_base_path" => "tests",
    "test_base_url" => "https://example.com",
    "version_extension_tests" => array(
      "php80" => "8.0",
      "php81" => "8.1",
      "php82" => "8.2",
      "php83" => "8.3",
      "php84" => "8.4",
   ),
    "obsolete_version_extension_tests" => array(
      "php56",
      "phpx"
    ),
    "handler_tests" => array(
      "php80-cgi" => "8.0",
      "php81-cgi" => "8.1",
      "php82-cgi" => "8.2",
      "php83-cgi" => "8.3",
      "php84-cgi" => "8.4",
    ),
    "obsolete_handler_tests" => array(
      "php56-cgi",
    ),
    "new_handler_tests" => array(
      "php85-cgi",
    ),
    "new_version_extension_tests" => array(
      "php85",
    ),
    "perform_version_extension_test" => true,
    "perform_handler_test" => true,
    "perform_new_version_extension_test" => true,
    "perform_new_handler_test" => true,
    "perform_obsolete_PHPX_test" => false,
    "perform_obsolete_CGIPHP_test" => false,
    "perform_obsolete_version_extension_test" => false,
    "perform_obsolete_handler_test" => false,
);
