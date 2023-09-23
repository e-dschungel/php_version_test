# PHP_version_test
PHP_version_test is a script to test different methods the configure the PHP version to be executed.
The tests are executed by calling php_version_test.php, the configuration is done in config/config.php.

## Handler Test
Checks PHP version for different Add Handler settings in .htaccess file.
Example: AddHandler php80-cgi .php in .htaccess executes PHP 8.0

## Version Extension Test
Checks PHP version for different file extensions.
Example ".php56" executes PHP 5.6

## New Handler Test
Checks for different Add Handler settings in .htaccess file and expects that files using this setting are not executed but return their code
Example: AddHandler php90-cgi .php in .htaccess returns the code without executing it.

## New Version Extension Test
Checks for different version extensions and expects that this files with these extensions are not executed but return their code
Example ".php90" returns the code without executing it.

## Obsolete PHPX Test
Special test for hoster all-inkl.com. (Obsolete, use Obsolete Version Extension Test instead)
The extension used to execute PHP as Apache module.
Nowadays it returns an error message for which the tests checks.

## Obsolete CGIPHP Test
Special test for hoster all-inkl.com.
The extension ".cgi-php" used to execute PHP as CGI module.
Nowadays it returns the code without executing it.

## Obsolete Version Extension Test
Special test for hoster all-inkl.com.
Some version extensions like "*.phpx" or "*.php71" used to execute PHP as Apache module or in a specific version.
Nowadays they return an error message for which this tests checks.

## Obsolete Handler Test
Special test for hoster all-inkl.com.
Some Add Handler settings in .htaccess file used to execute PHP in a specific version.
Nowadays they return an error message for which this tests checks.


## Requirements
* PHP >= 5.6 with curl extension installed
* ''tests'' dir must be writable

## Installation
* Clone this repo `git clone https://github.com/e-dschungel/php_version_test` or download ZIP file
* Rename `config/config.dist.php` to `config/config.php` and edit it according to your needs, see below

## Configuration
|variable|description|
|---|---|
$pvc_config["test_base_path"] | path of the "tests" directory|
$pvc_config["test_base_url"] | path of the "tests" directory|
$pvc_config["version_extension_tests"]| Array of file extension and the expected PHP version for version extension test|
$pvc_config["obsolete_version_extension_tests"]| Array of file extension for obsolete version extension test|
$pvc_config["handler_tests"]| Array of handlers in .htaccess and the expected PHP version|
$pvc_config["obsolete_handler_tests"]| Array of handlers in .htaccess for obsolete handler test|
$pvc_config["perform_version_extension_test"]| run version extension test true/false|
$pvc_config["perform_handler_test"| run handler test true/false|
$pvc_config["perform_new_version_extension_test"]| run new version extension test true/false|
$pvc_config["perform_new_handler_test"| run new handler test true/false|
$pvc_config["perform_obsolete_PHPX_test"| run obsolete PHPX test (only useful for all-inkl.com, obsolete use obsolete_version_extension_tests instead) true/false|
$pvc_config["perform_obsolete_version_extension_tests"| run obsolete version extension tests (only useful for all-inkl.com) true/false|
$pvc_config["perform_obsolete_CGIPHP_test"|run obsolete CGIPHP test (only useful for all-inkl.com) true/false|
$pvc_config["perform_obsolete_handler_test"| run obsolete handler test (only useful for all-inkl.com) true/false|

## Changelog
### Version 0.1
* first public release

### Version 0.2
* added new handler and new version extension test

### Version 0.2.1
* use PHPStan
* fixed errors found by PHPStan

### Version 0.2.2
* added new ObsoleteVersionExtensionTest
* added new ObsoleteHandlerTest
* ObsoletePHPXTest is obsolete and will be removed in a future version, use ObsoleteVersionExtensionTest instead
