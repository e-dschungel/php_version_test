<?php

namespace eDschungel;

/**
Performs all new handler tests.
Checks for different Add Handler settings in .htaccess file and expects that this PHP version is not executed
*/
class NewHandlerTest extends HandlerTest
{


    /**
    Performs all new handler tests.
    Checks for different Add Handler settings in .htaccess file

    @return nr of unexpected PHP versions found
    */
    public function performAllTests()
    {
        $nr_unexpected_versions = 0;
        if ($this->config["perform_new_handler_test"]) {
            $expected_output = $this->getVersionTestCode();
            foreach ($this->config["new_handler_tests"] as $handler) {
                $testfilename = "newhandlertest.php";
                $this->createHandlerTestFiles($handler);
                $actual_output = $this->getVersionTestOutput($testfilename);
                if ($this->stripWhitespaces($actual_output) != $this->stripWhitespaces($expected_output)) {
                    if ($this->isPHPVersion($actual_output)) {
                        echo "Handler " . $handler . " executes version " . $actual_version . "!\n";
                    } else {
                        echo "Output of new handler test for handler " . $handler . " is:\n";
                        echo $actual_output . "\n";
                    }
                    $nr_unexpected_versions++;
                }
                $this->removeHandlerTestFiles();
            }
        }
        return $nr_unexpected_versions;
    }
}
