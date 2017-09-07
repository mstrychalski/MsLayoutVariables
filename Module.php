<?php
namespace MsLayoutVariables;

class Module
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller      = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $actionName      = $controller->params('action');
            $config          = $e->getApplication()->getServiceManager()->get('config');

            if (isset($config['layout_variables']['default']))
                $controller->layout()->setVariables($config['layout_variables']['default']);

            if (isset($config['layout_variables'][$moduleNamespace]))
                $controller->layout()->setVariables($config['layout_variables'][$moduleNamespace]);

            if (isset($config['layout_variables'][$controllerClass]['default']))
                $controller->layout()->setVariables($config['layout_variables'][$controllerClass]['default']);

            if (isset($config['layout_variables'][$controllerClass][$actionName]))
                $controller->layout()->setVariables($config['layout_variables'][$controllerClass][$actionName]);

        }, 100);
    }
}
