<?php

/**
Performs all handler tests. Checks PHP version for different Add Handler settings in .htaccess file
*/
class HandlerTest extends abstractTest
{
    /**
    Creates files for handler tests.

    @param $handler name of the handler, e.g. "php72-cgi"

    @return void
    */
    private function createHandlerTestFiles($handler)
    {
        $htaccess_test_code = "AddHandler " . $handler . " .php";
        $this->createTestFile(".htaccess", $htaccess_test_code);
        $this->createVersionTestFile("handlertest.php");
    }

    /**
    Removes files for handler tests.

    @return void
    */
    private function removeHandlerTestFiles()
    {
        $this->removeTestFile(".htaccess");
        $this->removeTestFile("handlertest.php");
    }

    /**
    Performs all handler tests. Checks PHP version for different Add Handler settings in .htaccess file

    @return void
    */
    public function performAllTests()
    {
        if ($this->config["perform_handler_test"]) {
            foreach ($this->config["handler_tests"] as $handler => $expected_version) {
                $testfilename = "handlertest.php";
                $this->createHandlerTestFiles($handler);
                $actual_version = $this->getVersionTestOutput($testfilename);
                if ($actual_version != $expected_version) {
                    echo "Handler " . $handler . " executes version " . $actual_version .

                     " not the expenced version " . $expected_version . "!\n";
                }
                $this->removeHandlerTestFiles();
            }
        }
    }
}
