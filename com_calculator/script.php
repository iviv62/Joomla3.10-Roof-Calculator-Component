<?php
defined('_JEXEC') or die;

class com_calculatorInstallerScript
{
    public function install($parent) 
    {
        $this->installModule($parent);
    }

    public function update($parent) 
    {
        $this->installModule($parent);
    }

    private function installModule($parent)
    {
        $installer = new JInstaller;
        $source = $parent->getParent()->getPath('source');
        $module_path = $source . '/modules/mod_selectcalculator';
        
        if (is_dir($module_path)) {
            $result = $installer->install($module_path);
            if ($result) {
                JFactory::getApplication()->enqueueMessage('Module mod_selectcalculator installed successfully');
            } else {
                JFactory::getApplication()->enqueueMessage('Failed to install module mod_selectcalculator', 'error');
            }
        } else {
            JFactory::getApplication()->enqueueMessage('Module directory not found: ' . $module_path, 'error');
        }
    }
}