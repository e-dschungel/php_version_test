<?php

/**
Creates test files

@param $pvc_config config variable
@param $filename filename to create
@param $filecontent conetent of the file to create

@return void
*/
function createTestFile($pvc_config, $filename, $filecontent)
{
    file_put_contents($pvc_config["test_base_path"] . "/" . $filename, $filecontent);
}

/**
Remove test file

@param $pvc_config config variable
@param $filename filename to remove

@return void
*/
function removeTestFile($pvc_config, $filename)
{
    unlink($pvc_config["test_base_path"] . "/" . $filename);
}

/**
Returns PHP code used to get the PHP Verison during the tests

@return PHP code used to get the PHP Verison during the tests
*/
function getVersionTestCode()
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

@param $pvc_config config variable
@param $filename name of ile to create

@return void
*/
function createVersionTestFile($pvc_config, $filename)
{
    createTestFile($pvc_config, $filename, getVersionTestCode());
}

/**
Return the output of a test, using a HTTP request.
Uses the same credentials as used for the test_php_version.php root file

@param $pvc_config config variable
@param $filename filename of the test

@return output of test
*/
function getVersionTestOutput($pvc_config, $filename)
{
    $url = $pvc_config["test_base_url"] . "/"  . $filename;
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
}
