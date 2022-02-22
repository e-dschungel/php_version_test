<?php

namespace eDschungel;

/**
Performs test for .cgi-php extension.
*/
class ObsoleteCGIPHPTest extends AbstractTest
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
            if ($this->stripWhitespaces($actual_output) != $this->stripWhitespaces($expected_output)) {
                if ($this->isPHPVersion($actual_output)) {
                    echo "Extension .cgi-php executes version " . $actual_output . "!\n";
                } else {
                    echo "Output of .cgi-php extension test is:\n";
                    echo $actual_output . "\n";
                }
                $nr_unexpected_versions++;
            }
            $this->removeTestFile($filename);
        }
        return $nr_unexpected_versions;
    }
}
