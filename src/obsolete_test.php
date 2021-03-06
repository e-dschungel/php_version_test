<?php




function perform_obsolete_phpx_test($pvc_config){
    $filename = "phpx_test.phpx";
    create_version_test_file($pvc_config, $filename);
    $actual_output = get_actual_version($pvc_config, $filename);
    print $actual_output;
}


function perform_obsolete_cgi_php_test($pvc_config){
    $filename = "cgi-php_test.cgi-php";
    create_version_test_file($pvc_config, $filename);
    $actual_output = get_actual_version($pvc_config, $filename);
    print $actual_output;
}


function perform_obsolete_tests($pvc_config){
    perform_obsolete_phpx_test($pvc_config);
    perform_obsolete_cgi_php_test($pvc_config);

}
