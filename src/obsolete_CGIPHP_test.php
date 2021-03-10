<?php

namespace eDschungel;

/**
Performs test for .cgi-php extension.
*/
class ObsoleteCGIPHPTest extends abstractTest
{
    /**
    Performs test for .cgi-php extension. Expected result server returns code without executing it.

    @return void
    */
    public function performAllTests()
    {
        $nr_unexpected_versions = 0;
        if ($this->config["perform_obsolete_CGIPHP_test"]) {
            $expected_output = $this->getVersionTestCode();
            $filename = "cgi-php_test.cgi-php";
            $this->createVersionTestFile($filename);
            $actual_output = $this->getVersionTestOutput($filename);
            if (stripWhitespaces($actual_output) != stripWhitespaces($expected_output)) {
                print "Output of CGI-PHP tests differs from expectation:\n";
                print $actual_output;
                $nr_unexpected_versions++;
            }
            $this->removeTestFile($filename);
        }
        return $nr_unexpected_versions;
    }
}
