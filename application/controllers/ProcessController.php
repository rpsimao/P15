<?php

class ProcessController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        if ($this->getRequest()->isPost()) 
        {
            $db = new Application_Model_P15();
            $id = $db->insertData($this->_getAllParams());
            
            
            $mail = new RPS_Mail_Send();
            $mail->setId($id);
            $mail->setSeccao($this->_request->getPost('seccao'));
            $mail->setType($this->_request->getPost('tipo'));
            $mail->sendMail();
            
            $this->_helper->flashMessenger->addMessage('success');
            $this->_helper->flashMessenger->addMessage('O Registo de Manutenção Correctiva Nº'.$id.' foi criado com sucesso.');
            $this->_redirect('/index/listagem');
        }
        
    }
    
    
    
    public function updateAction()
    {
    
        $this->_helper->layout()->disableLayout(); 
        $this->_helper->viewRenderer->setNoRender(true);
        
        if ($this->getRequest()->isPost())
        {
            $db = new Application_Model_P15();
            $id = $db->insertData($this->_getAllParams());
    
    
            $this->_helper->flashMessenger->addMessage('success');
            $this->_helper->flashMessenger->addMessage('O Registo de Manutenção Correctiva Nº'.$id.' foi actualizado com sucesso.');
            $this->_redirect('/index/listagem');
        }
    
    }


}

