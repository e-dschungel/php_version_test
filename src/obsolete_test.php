<?php

/**
Removes all whitespaces

@param $string string from which whitespaces should be remove

@return $string without whitespaces
*/
function stripWhitespaces($string)
{
    return(preg_replace('/\s+/', '', $string));
}

/**
Performs test for .phpx extension. Expected result server returns "PHP version not supported"

@param $pvc_config config variable

@return void
*/
function performObsoletePHPXTest($pvc_config)
{
    $expected_output = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
<html><head>
<title>PHP version not supported</title>
</head><body>
<h1>PHP version not supported</h1>
<p>The requested PHP version is not supported on this server.<br/>
------------------------------------------------------------------------<br/>
Die gew&auml;hlte PHP Version ist auf dem Server nicht verf&uuml;gbar.</p>
</body></html>";
    if ($pvc_config["perform_obsolete_PHPX_test"]) {
        $filename = "phpx_test.phpx";
        createVersionTestFile($pvc_config, $filename);
        $actual_output = getVersionTestOutput($pvc_config, $filename);
        if (stripWhitespaces($actual_output) != stripWhitespaces($expected_output)) {
            print "Output of PHPX tests differs from expectation:\n";
            print $actual_output;
        }
        removeTestFile($pvc_config, $filename);
    }
}

/**
Performs test for .cgi-phpx extension. Expected result server returns code without executing it.

@param $pvc_config config variable

@return void
*/
function performObsoleteCGIPHPTest($pvc_config)
{
    if ($pvc_config["perform_obsolete_CGIPHP_test"]) {
        $expected_output = getVersionTestCode();
        $filename = "cgi-php_test.cgi-php";
        createVersionTestFile($pvc_config, $filename);
        $actual_output = getVersionTestOutput($pvc_config, $filename);
        if (stripWhitespaces($actual_output) != stripWhitespaces($expected_output)) {
            print "Output of CGI-PHP tests differs from expectation:\n";
            print $actual_output;
        }
        removeTestFile($pvc_config, $filename);
    }
}

/**
Performs all obsolete tests

@param $pvc_config config variable

@return void
*/
function performObsoleteTests($pvc_config)
{
    performObsoletePHPXTest($pvc_config);
    performObsoleteCGIPHPTest($pvc_config);
}
