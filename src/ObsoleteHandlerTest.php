<?php

namespace eDschungel;

/**
Performs obsolete handler tests.
Checks for different Add Handler settings in .htaccess file that used to choose to PHP version
but nowadays only show a warning.
*/
class ObsoleteHandlerTest extends AbstractTest
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
        $this->createVersionTestFile("obsoletehandlertest.php");
    }

    /**
    Removes files for handler tests.

    @return void
    */
    protected function removeHandlerTestFiles()
    {
        $this->removeTestFile(".htaccess");
        $this->removeTestFile("obsoletehandlertest.php");
    }

    /**
    Performs all handler tests. Checks PHP version for different Add Handler settings in .htaccess file

    @return nr of unpected PHP versions found
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
        if ($this->config["perform_obsolete_handler_test"]) {
            foreach ($this->config["obsolete_handler_tests"] as $handler) {
                $testfilename = "obsoletehandlertest.php";
                $this->createHandlerTestFiles($handler);
                $actual_output = $this->getVersionTestOutput($testfilename);
                if ($this->stripWhitespaces($actual_output) != $this->stripWhitespaces($expected_output)) {
                    if ($this->isPHPVersion($actual_output)) {
                        echo "Handler " . $handler . " executes version " . $actual_output . "!\n";
                    } else {
                        echo "Output of obsolete handler test for handler ." . $handler . " is:\n";
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
