<?php

/**
Removes all whitespaces
@param $string

@return $string without whitespaces
*/
function strip_whitespaces($string){
    return(preg_replace('/\s+/', '', $string));
}

/**
Performs test for .phpx extension. Expected result server returns "PHP version not supported"
@param $pvc_config config variable
*/
function perform_obsolete_phpx_test($pvc_config){
    $expected_output = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
<html><head>
<title>PHP version not supported</title>
</head><body>
<h1>PHP version not supported</h1>
<p>The requested PHP version is not supported on this server.<br/>
------------------------------------------------------------------------<br/>
Die gew&auml;hlte PHP Version ist auf dem Server nicht verf&uuml;gbar.</p>
</body></html>";
    $filename = "phpx_test.phpx";
    create_version_test_file($pvc_config, $filename);
    $actual_output = get_version_test_output($pvc_config, $filename);
    if (strip_whitespaces($actual_output) != strip_whitespaces($expected_output)) {
        print "Output of PHPX tests differs from expectation:\n";
        print $actual_output;
    }
    remove_test_file($pvc_config, $filename);
}

/**
Performs test for .cgi-phpx extension. Expected result server returns code without executing it.
@param $pvc_config config variable
*/
function perform_obsolete_cgi_php_test($pvc_config){
    $expected_output = get_version_test_code();
    $filename = "cgi-php_test.cgi-php";
    create_version_test_file($pvc_config, $filename);
    $actual_output = get_version_test_output($pvc_config, $filename);
    if (strip_whitespaces($actual_output) != strip_whitespaces($expected_output)) {
        print "Output of CGI-PHP tests differs from expectation:\n";
        print $actual_output;
    }
    remove_test_file($pvc_config, $filename);
}

/**
Performs all obsolete tests
@param $pvc_config config variable
*/
function perform_obsolete_tests($pvc_config){
    perform_obsolete_phpx_test($pvc_config);
    perform_obsolete_cgi_php_test($pvc_config);

}
