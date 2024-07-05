<?php
defined('_JEXEC') or die;


$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Load the CSS file
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_hipcalculator/css/style.css');

require JModuleHelper::getLayoutPath('mod_hipcalculator', $params->get('layout', 'default'));