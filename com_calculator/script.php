<?php
defined('_JEXEC') or die;

class com_calculatorInstallerScript
{
    private $modules = [
        'mod_selectcalculator',
        'mod_shedcalculator',
        'mod_gablecalculator',
        'mod_hipcalculator'
    ];

    public function install($parent) 
    {
        $this->installModules($parent);
    }

    public function update($parent) 
    {
        $this->installModules($parent);
    }

    private function installModules($parent)
    {
        $installer = new JInstaller;
        $source = $parent->getParent()->getPath('source');

        foreach ($this->modules as $module) {
            $module_path = $source . '/modules/' . $module;
            
            if (is_dir($module_path)) {
                $result = $installer->install($module_path);
                if ($result) {
                    JFactory::getApplication()->enqueueMessage("Module $module installed successfully");
                } else {
                    JFactory::getApplication()->enqueueMessage("Failed to install module $module", 'error');
                }
            } else {
                JFactory::getApplication()->enqueueMessage("Module directory not found: $module_path", 'error');
            }
        }
    }
}