<?php

class TestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $this->_helper->layout()->disableLayout(); 
       $this->_helper->viewRenderer->setNoRender(true);
        
        $pass = new Application_Model_Passwords();
       $passwd = $pass->getRecords("dsfgdsfg");
       
       echo $passwd['p15'];
       
    }


}

