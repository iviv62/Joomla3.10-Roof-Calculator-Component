<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_calculator
 *
 * @copyright   Copyright (C) 2023 YourName. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;

/**
 * Routing class for com_calculator
 *
 * @since  3.3
 */
class CalculatorRouter extends RouterView
{
    public function __construct($app = null, $menu = null)
    {
        $shedroofcalculator = new RouterViewConfiguration('shedroofcalculator');
        $shedroofcalculator->setKey('id');
        $this->registerView($shedroofcalculator);

        parent::__construct($app, $menu);

        $this->attachRule(new MenuRules($this));
        $this->attachRule(new StandardRules($this));
        $this->attachRule(new NomenuRules($this));
    }

    public function build(&$query)
    {
        $segments = array();

        if (isset($query['view']))
        {
            $segments[] = $query['view'];
            unset($query['view']);
        }

        return $segments;
    }

    public function parse(&$segments)
    {
        $vars = array();

        $vars['view'] = array_shift($segments);

        return $vars;
    }
}