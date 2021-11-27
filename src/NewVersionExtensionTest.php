<?php

namespace eDschungel;

/**
Performs version extension tests.
Checks for different version extensions and expects that this files with these extensions are not executed but return their code
*/
class NewVersionExtensionTest extends abstractTest
{
    /**
    Performs all new version extension tests.
    Checks for different version extensions and expects that this files with these extensions are not executed but return their code

    @return nr of unexpected PHP versions
    */
    public function performAllTests()
    {
        $nr_unexpected_versions = 0;
        if ($this->config["perform_new_version_extension_test"]) {
            $expected_output = $this->getVersionTestCode();
            foreach ($this->config["new_version_extension_tests"] as $extension) {
                $testfilename = "extensiontest." . $extension;
                $this->createVersionTestFile($testfilename);
                $actual_output = $this->getVersionTestOutput($testfilename);
                if ($this->stripWhitespaces($actual_output) != $this->stripWhitespaces($expected_output)) {
                    if ($this->isPHPVersion($actual_output)) {
                        echo "New Version extension " . $extension . " executes version " . $actual_output . "!\n";
                    } else {
                        echo "Output of new version extension test for " . $extension . " is:\n";
                        echo $actual_output . "\n";
                    }
                    $nr_unexpected_versions++;
                }
                $this->removeTestFile($testfilename);
            }
        }
        return $nr_unexpected_versions;
    }
}
