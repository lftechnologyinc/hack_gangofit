<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap 
{

    protected function _initAutoload() 
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Plugins_');
    }

    protected function _initProjectSpecific() 
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/config.ini');
        Zend_Registry::set('config', $config);
    }

    protected function _initErrorDisplay() 
    {
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->throwExceptions(true);
    }

    protected function _initPlugins() 
    {
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Plugins_SelectLayout());
        $front->registerPlugin(new Plugins_Auth());
    }

    protected function _initDoctype() 
    {
        $doctypeHelper = new Zend_View_Helper_Doctype();
        $doctypeHelper->doctype('HTML5');
    }

    protected function _initViewHelpers() 
    {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->headMeta()
                ->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8')
                ->appendHttpEquiv('Content-Language', 'en-US');
        $view->setHelperPath('Custom/Helper', 'Custom_Helper');
    }

    protected function _initRoute()
    {
        $routing = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini');
        $router = Zend_Controller_Front::getInstance()->getRouter();
        $router->addConfig($routing, 'router');
        // Zend_Registry::set('mainRouting', $routing);
    }

    
    protected function _initHelpers() 
    {

        Zend_Controller_Action_HelperBroker::addHelper(new Helpers_ResourceHelper());
    }

}
