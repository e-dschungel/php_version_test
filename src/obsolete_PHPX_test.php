<?php

namespace eDschungel;

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
Performs test for .phpx extension.
*/
class ObsoletePHPXTest extends abstractTest
{
    /**
    Performs test for .phpx extension. Expected result server returns "PHP version not supported"

    @return void
    */
    public function performAllTests()
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
        if ($this->config["perform_obsolete_PHPX_test"]) {
            $filename = "phpx_test.phpx";
            $this->createVersionTestFile($filename);
            $actual_output = $this->getVersionTestOutput($filename);
            if (stripWhitespaces($actual_output) != stripWhitespaces($expected_output)) {
                print "Output of PHPX tests differs from expectation:\n";
                print $actual_output;
            }
            $this->removeTestFile($filename);
        }
    }
}
