<?php

namespace eDschungel;

/**
Performs test for obsolete version extension tests.
*/
class ObsoleteVersionExtensionTest extends AbstractTest
{
    /**
    Performs test for obsolete version extension tests. Expected result server returns "PHP version not supported"

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
        if ($this->config["perform_obsolete_version_extension_test"]) {
            foreach ($this->config["obsolete_version_extension_tests"] as $extension) {
                $filename = "obsoleteextensiontest." . $extension;
                $this->createVersionTestFile($filename);
                $actual_output = $this->getVersionTestOutput($filename);
                if ($this->stripWhitespaces($actual_output) != $this->stripWhitespaces($expected_output)) {
                    if ($this->isPHPVersion($actual_output)) {
                        echo "Extension " . $extension . " executes version " . $actual_output . "!\n";
                    } else {
                        echo "Output of obsolete version extension test for extension ." . $extension . " is:\n";
                        echo $actual_output . "\n";
                    }
                    $nr_unexpected_versions++;
                }
                $this->removeTestFile($filename);
            }
        }
        return $nr_unexpected_versions;
    }
}
