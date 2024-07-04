<?php
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$buttons= ModSelectCalculatorHelper::getButtons($params);

require JModuleHelper::getLayoutPath('mod_selectcalculator', $params->get('layout', 'default'));