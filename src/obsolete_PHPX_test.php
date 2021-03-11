<?php

namespace eDschungel;

/**
Performs test for .phpx extension.
*/
class ObsoletePHPXTest extends abstractTest
{
    /**
    Performs test for .phpx extension. Expected result server returns "PHP version not supported"

    @return nr of unexpected PHP versions found
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
        $nr_unexpected_versions = 0;
        if ($this->config["perform_obsolete_PHPX_test"]) {
            $filename = "phpx_test.phpx";
            $this->createVersionTestFile($filename);
            $actual_output = $this->getVersionTestOutput($filename);
            if ($this->stripWhitespaces($actual_output) != $this->stripWhitespaces($expected_output)) {
                print "Output of PHPX tests differs from expectation:\n";
                print $actual_output;
                $nr_unexpected_versions++;
            }
            $this->removeTestFile($filename);
        }
        return $nr_unexpected_versions;
    }
}
