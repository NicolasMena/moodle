<?php
defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2013042805;
$plugin->requires  = 2012062503;
$plugin->cron      = 0;
$plugin->release   = "1.0 (Build: {$plugin->version})";
$plugin->maturity  = MATURITY_ALPHA;
$plugin->component = 'local_generator';
$plugin->dependencies = array('local_mr' => 2010090200);
