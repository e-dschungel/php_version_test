<?php

namespace eDschungel;

/**
Abstract class to implement tests for PHP versions.
*/
abstract class AbstractTest
{
    protected $config;

    /**
    Constructor for the tests.

    @param $config configurations for the tests
    */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
    Abstract method to start tests

    @return nr of unexpected PHP versions found
    */
    abstract public function performAllTests();


    /**
    Creates test files

    @param $filename filename to create
    @param $filecontent conetent of the file to create

    @return void
    */
    protected function createTestFile($filename, $filecontent)
    {
        file_put_contents($this->config["test_base_path"] . "/" . $filename, $filecontent);
    }

    /**
    Remove test file

    @param $filename filename to remove

    @return void
    */
    protected function removeTestFile($filename)
    {
        unlink($this->config["test_base_path"] . "/" . $filename);
    }

    /**
    Returns PHP code used to get the PHP Verison during the tests

    @return PHP code used to get the PHP Verison during the tests
    */
    protected function getVersionTestCode()
    {
        $test_code = '<?php

    $version = explode(\'.\', phpversion());
    if (!empty($version)) {
        echo $version[0] . \'.\' . $version[1];
    }
    ';
        return $test_code;
    }

    /**
    Create file to test the PHP Version used

    @param $filename name of ile to create

    @return void
    */
    protected function createVersionTestFile($filename)
    {
        $this->createTestFile($filename, $this->getVersionTestCode());
    }

    /**
    Return the output of a test, using a HTTP request.
    Uses the same credentials as used for the test_php_version.php root file

    @param $filename filename of the test

    @return output of test
    */
    protected function getVersionTestOutput($filename)
    {
        $url = $this->config["test_base_url"] . "/"  . $filename;
        $curl_handler = curl_init($url);

        curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, true);

        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            curl_setopt($curl_handler, CURLOPT_USERPWD, $_SERVER['PHP_AUTH_USER'] . ":" . $_SERVER['PHP_AUTH_PW']);
        }
        $output = curl_exec($curl_handler);
        curl_close($curl_handler);
        if ($output !== true) {
            return $output;
        }
        return "";
    }

    /**
    Removes all whitespaces

    @param $string string from which whitespaces should be remove

    @return $string without whitespaces
    */
    protected function stripWhitespaces($string)
    {
        return(preg_replace('/\s+/', '', $string));
    }

     /**
    Checks if given string is a PHP version like 5.6

    @param $string string to check

    @return true or false
    */
    protected function isPHPVersion($string)
    {
        return (is_string($string) &&
            strlen($string) == 0 &&
            is_numeric($string [0]) &&
            $string [1] == "." &&
            is_numeric($string [0]));
    }
}
