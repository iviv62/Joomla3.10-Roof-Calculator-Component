<?php
defined('_JEXEC') or die;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;

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

        if (isset($query['task']))
        {
            $taskParts = explode('.', $query['task']);
            if (count($taskParts) == 2)
            {
                $segments[] = $taskParts[0];
                $segments[] = $taskParts[1];
            }
            else
            {
                $segments[] = $query['task'];
            }
            unset($query['task']);
        }

        if (isset($query['id']))
        {
            $segments[] = $query['id'];
            unset($query['id']);
        }

        return $segments;
    }

    public function parse(&$segments)
    {
        $vars = array();

        // Get the active menu item
        $item = $this->menu->getActive();

        // Count route segments
        $count = count($segments);

        if ($count)
        {
            $vars['view'] = $segments[0];
            
            if ($count > 1)
            {
                if ($segments[0] == 'shedroofcalculator' && $segments[1] == 'calculate')
                {
                    $vars['task'] = 'shedroofcalculator.calculate';
                }
                else
                {
                    $vars['task'] = $segments[1];
                }
            }

            if ($count > 2)
            {
                $vars['id'] = $segments[2];
            }
        }

        return $vars;
    }
}

function CalculatorBuildRoute(&$query)
{
    $app = JFactory::getApplication();
    $router = new CalculatorRouter($app, $app->getMenu());
    return $router->build($query);
}

function CalculatorParseRoute($segments)
{
    $app = JFactory::getApplication();
    $router = new CalculatorRouter($app, $app->getMenu());
    return $router->parse($segments);
}