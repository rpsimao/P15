<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    protected function _initRegistry ()
    {
         
        Zend_Registry::set('passwords',   new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'passwords'));
        Zend_Registry::set('p15',   new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'p15'));
        Zend_Registry::set('mail_server', new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'mail_server'));
        Zend_Registry::set('pessoal', new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'pessoal'));
        
    }
    
    protected function _initHeader ()
        {
        
            $this->bootstrap('layout');
            $layout = $this->getResource('layout');
            $view = $layout->getView();
            $view->addHelperPath(APPLICATION_PATH . "/views/helpers", "Application_View_Helper");
            $view->doctype("HTML5");
            $view->headTitle('Fernandes & Terceiro, S.A. :: ');
            $view->headMeta()->setCharset('utf-8');
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/external/html5.js','text/javascript', array('conditional' => 'lt IE 9'));
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/external/IE7.js','text/javascript', array('conditional' => 'lt IE 7'));
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/external/IE8.js','text/javascript', array('conditional' => 'lt IE 8'));
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/external/IE9.js','text/javascript', array('conditional' => 'lt IE 9'));
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/js/jquery/latest/min.js', 'text/javascript');
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/js/jqueryui/latest/min.js', 'text/javascript');
            $view->headScript()->appendFile('/js/app.bootstrap.js', 'text/javascript');
            $view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/js/jqueryui/themes/bootstrap/jquery-ui-1.9.2.custom.css');
            $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/bootstrap/js/bootstrap.min.js');
            $view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/bootstrap/css/bootstrap.min.css');
            $view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/bootstrap/css/font-awesome.min.css');
            $view->headLink()->appendStylesheet('/css/styles.css');
            $view->headLink()->headLink(array( 'rel' => 'icon' ,'href' => 'http://static.fterceiro.pt/assets/public/images/favicon.ico', 'type'=>"image/x-icon"), 'PREPEND');
            $view->headMeta()->appendHttpEquiv('X-UA-Compatible', 'chrome=1');
            $view->headMeta()->appendName('Author', 'Ricardo Simao');
            $view->headMeta()->appendName('Email', 'ricardo.simao@fterceiro.pt');
            $view->headMeta()->appendName('Copyright', 'Fernandes e Terceiro, S.A.');
            $view->headMeta()->appendName('Zend Framework', Zend_Version::VERSION);
            $view->headMeta()->appendName('PHP',  phpversion());
            $view->headMeta()->appendName('Version', '@@BuildNumber@@');
            $view->headMeta()->appendName('BuildDate', '@@BuildDate@@');
        }

        
        protected function _initRoutes()
        {
             
            $router = Zend_Controller_Front::getInstance()->getRouter();
             
            $route = new Zend_Controller_Router_Route('index/edit/:id', array(
                    'controller' => 'index' ,
                    'action' => 'edit'));
            $router->addRoute('index_edit', $route);
            
            $route = new Zend_Controller_Router_Route('index/view/:id', array(
                    'controller' => 'index' ,
                    'action' => 'view'));
            $router->addRoute('index_view', $route);
            
            $route = new Zend_Controller_Router_Route('index/pdf/:id', array(
                    'controller' => 'index' ,
                    'action' => 'pdf'));
            $router->addRoute('index_pdf', $route);
        
        
        }
        
}

