<?php

namespace eDschungel;

/**
Performs all handler tests. Checks PHP version for different Add Handler settings in .htaccess file
*/
class HandlerTest extends AbstractTest
{
    /**
    Creates files for handler tests.

    @param $handler name of the handler, e.g. "php72-cgi"

    @return void
    */
    protected function createHandlerTestFiles($handler)
    {
        $htaccess_test_code = "AddHandler " . $handler . " .php";
        $this->createTestFile(".htaccess", $htaccess_test_code);
        $this->createVersionTestFile("handlertest.php");
    }

    /**
    Removes files for handler tests.

    @return void
    */
    protected function removeHandlerTestFiles()
    {
        $this->removeTestFile(".htaccess");
        $this->removeTestFile("handlertest.php");
    }

    /**
    Performs all handler tests. Checks PHP version for different Add Handler settings in .htaccess file

    @return nr of unpected PHP versions found
    */
    public function performAllTests()
    {
        $nr_unexpected_versions = 0;
        if ($this->config["perform_handler_test"]) {
            foreach ($this->config["handler_tests"] as $handler => $expected_version) {
                $testfilename = "handlertest.php";
                $this->createHandlerTestFiles($handler);
                $actual_version = $this->getVersionTestOutput($testfilename);
                if ($actual_version != $expected_version) {
                    if ($this->isPHPVersion($actual_version)) {
                        echo "Handler " . $handler . " executes version " . $actual_version .
                        " not the expected version " . $expected_version . "!\n";
                    } else {
                        echo "Output of handler test for version " . $expected_version . " is:\n";
                        echo $actual_version . "\n";
                    }
                    $nr_unexpected_versions++;
                }
                $this->removeHandlerTestFiles();
            }
        }
        return $nr_unexpected_versions;
    }
}
