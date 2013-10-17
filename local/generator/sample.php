<?php
define('CLI_SCRIPT', true);
require('../../config.php');

if (!class_exists('mr_bootstrap')) {
    $plugindir = null;
    // Support both Moodle 2.6+ and earlier versions.
    if (is_callable('core_component::get_plugin_directory')) {
        $plugindir = core_component::get_plugin_directory('local', 'mr');
    } else {
        $plugindir = get_plugin_directory('local', 'mr');
    }
    if (empty($plugindir)) {
        print_error('modulemissingcode', 'error', '', 'Generator depends on MR framework and');
    }
    require($plugindir.'/bootstrap.php');
}

mr_bootstrap::zend();

require_once('Zend/CodeGenerator/Php/Class.php');

$class = new Zend_CodeGenerator_Php_Class();
$class->setName('block_myblock');
$class->setExtendedClass('block_base');
$tna = '$this';
$blockmethods = array(
     array('name' => 'init', 'visibility' => 'public', 'body' => "{$tna}->name = get_string('pluginname', get_class($tna));")
    ,array('name' => 'applicable_formats', 'visibility' => 'public', 'body' => "return array('course' => true);")
    ,array('name' => 'has_config', 'visibility' => 'public', 'body' => "return true;")
    ,array('name' => 'get_content', 'visibility' => 'public', 'body' => "if ({$tna}->content !== null) {\nreturn ${tna}->content;\n}\n{$tna}->content = new stdClass();\n{$tna}->content->text='';\n{$tna}->content->footer='';\nreturn {$tna}->content;")
);
$class->setMethods($blockmethods);
echo $class->generate();
