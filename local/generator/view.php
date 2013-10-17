<?php
require('../../config.php');

if (!class_exists('mr_bootstrap')) {
    $plugindir = null;
    $component = 'local_mr';
    // Support both Moodle 2.6+ and earlier versions.
    if (is_callable('core_component::get_component_directory')) {
        $plugindir = core_component::get_component_directory($component);
    } else {
        $plugindir = get_component_directory($component);
    }
    if (empty($plugindir) || !is_readable($plugindir)) {
        print_error('modulemissingcode', 'error', '', 'Generator depends on MR framework and');
    }
    require($plugindir.'/bootstrap.php');
}

mr_controller::render('local/generator', 'pluginname', 'local_generator');
