<?php

class IndexController extends Zend_Controller_Action
{

    public $form = null;

    public function init()
    {
        $this->form = new Application_Form_Registo();
        $this->view->actionName = $this->getRequest()->getActionName();
    }

    public function preDispatch()
    {
         if ($this->_helper->FlashMessenger->hasMessages()) {$this->view->messages = $this->_helper->FlashMessenger->getMessages();}
         
        // $this->view->pessoal = $this->pessoal;

    }

    public function indexAction()
    {
        $this->view->form = $this->form;
        
        
        
        
        
    }

    public function editAction()
    {
        
        if ($this->getRequest()->isPost()) {
    
            $params = $this->_getAllParams();
            $pass = new Application_Model_Passwords();
            $passwd = $pass->getRecords($params['password']);
            
            if ($passwd['p15'] != 1) {
                $this->_helper->flashMessenger->addMessage('error');
                $this->_helper->flashMessenger->addMessage('Não tem permissão para aceder a este recurso. Contacte o Chefe de Secção.');
                $this->_redirect('/index/listagem');
                
            } else {
        
                $id = $this->_getParam('id');
                $db = new Application_Model_P15();
                $values = $db->findById($id)->toArray();
                
                $this->view->form = $this->form->populate($values[0]);
                $this->view->id = $id;
                
                //$this->_helper->viewRenderer->setRender('index');
            }
        }     
        
    }

    public function delAction()
    {
    if ($this->getRequest()->isPost()) {
    
            $params = $this->_getAllParams();
            $pass = new Application_Model_Passwords();
            $passwd = $pass->getRecords($params['password']);
            
            if ($passwd['p15'] != 1) {
                $this->_helper->flashMessenger->addMessage('error');
                $this->_helper->flashMessenger->addMessage('Não tem permissão para aceder a este recurso. Contacte o Chefe de Secção.');
                $this->_redirect('/index/listagem');
                } else {
        
                $db = new Application_Model_P15();
                $db->deleteRecord($params['id']);
                
                $this->_helper->flashMessenger->addMessage('success');
                $this->_helper->flashMessenger->addMessage('O Registo de Manutenção Nº'  .$params['id'] . ' foi removido com sucesso.');
                $this->_redirect('/index/listagem');
                
            }
        }    
        
    }

    public function listagemAction()
    {
        $db = new Application_Model_P15();
        $data = $db->getAllRecords();
        
        $page = $this->_getParam('page', 1);
        $paginator = Zend_Paginator::factory($data);
        $paginator->setItemCountPerPage(10);
        $paginator->setCurrentPageNumber($page);
        $this->view->p15 = $paginator;
    }

    public function pdfAction()
    {
        $this->_helper->layout()->disableLayout(); 
        $id = $this->_getParam('id');
        
        $pdf = new RPS_User_Service_CreatePDF();
        $pdf->setId($id);
        $this->view->pdf = $pdf->renderPDF();
        
        
    }

    public function viewAction()
    {
        $id = $this->_getParam('id');
        $db = new Application_Model_P15();
        $values = $db->findById($id)->toArray();
        
        $this->view->form = $this->form->populate($values[0]);
        $this->view->id = $id;
        
        $this->_helper->viewRenderer->setRender('index');
    }

    public function testAction()
    {
        $this->_helper->layout()->disableLayout(); 
        
    }

    public function searchAction()
    {
        $id = $this->_request->getPost('navbaridform');
        
        $db = new Application_Model_P15();
        $values = $db->findById($id)->toArray();
        
        if (count($values) > 0 ) {
            
            $this->view->form = $this->form->populate($values[0]);
            $this->view->id = $id;
        
            $this->_helper->viewRenderer->setRender('index');
        
        } else {
            
            $this->_helper->flashMessenger->addMessage('error');
            $this->_helper->flashMessenger->addMessage('O Registo Nº' . $id . " não existe.");
            $this->_redirect('/index/listagem');
            
        }       
        
    }

    public function searchdateAction()
    {
        
        $this->_helper->viewRenderer->setRender('listagem');
        $date = $this->_request->getPost('navbardateform');
        
        $db = new Application_Model_P15();
        $data = $db->getByDate($date);
        
        $page = $this->_getParam('page', 1);
        $paginator = Zend_Paginator::factory($data);
        $paginator->setItemCountPerPage(10);
        $paginator->setCurrentPageNumber($page);
        $this->view->p15 = $paginator;
    }


}

















