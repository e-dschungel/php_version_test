<?php

namespace eDschungel;

/**
Performs version extension tests. Checks PHP version for different file extensions like ".php56"
*/
class VersionExtensionTest extends abstractTest
{
    /**
    Performs all version extension tests. Checks PHP version for different file extensions like ".php56"

    @return nr of unexpected PHP versions
    */
    public function performAllTests()
    {
        $nr_unexpected_versions = 0;
        if ($this->config["perform_version_extension_test"]) {
            foreach ($this->config["version_extension_tests"] as $extension => $expected_version) {
                $testfilename = "extensiontest." . $extension;
                $this->createVersionTestFile($testfilename);
                $actual_version = $this->getVersionTestOutput($testfilename);
                if ($actual_version != $expected_version) {
                    echo "Extension ." . $extension . " executes version " . $actual_version .
                    " not the expenced version " . $expected_version . "!\n";
                    $nr_unexpected_versions++;
                }
                $this->removeTestFile($testfilename);
            }
        }
        return $nr_unexpected_versions;
    }
}
