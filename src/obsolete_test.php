<?php

function perform_obsolete_phpx_test($pvc_config){
    $expected_output = get_version_test_code();
    $filename = "phpx_test.phpx";
    create_version_test_file($pvc_config, $filename);
    $actual_output = get_version_test_output($pvc_config, $filename);
    if ($actual_output != $expected_output) {
        print "Output of PHPX tests differs from expectation:";
        print $actual_output;
    }
}


function perform_obsolete_cgi_php_test($pvc_config){
    $expected_output = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
<html><head>
<title>PHP version not supported</title>
</head><body>
<h1>PHP version not supported</h1>
<p>The requested PHP version is not supported on this server.<br/>
------------------------------------------------------------------------<br/>
Die gew&auml;hlte PHP Version ist auf dem Server nicht verf&uuml;gbar.</p>
</body></html>";
    $filename = "cgi-php_test.cgi-php";
    create_version_test_file($pvc_config, $filename);
    $actual_output = get_version_test_output($pvc_config, $filename);
    if ($actual_output != $expected_output) {
        print "Output of CGI-PHP tests differs from expectation:";
        print $actual_output;
    }
}


function perform_obsolete_tests($pvc_config){
    perform_obsolete_phpx_test($pvc_config);
    perform_obsolete_cgi_php_test($pvc_config);

}
