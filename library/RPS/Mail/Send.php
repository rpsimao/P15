<?php


class RPS_Mail_Send
{
    CONST PREPRESS_EMAIL  = "ricardo.simao@fterceiro.pt";
    CONST IMPRESSAO_EMAIL = "pedro.bras@fterceiro.pt";
    CONST MARKETING_EMAIL = "paulo.sousa@fterceiro.pt";
    CONST EMBALAGEM_EMAIL = "rui.cortinhas@fterceiro.pt";
    CONST ADMIN_EMAIL     = "leonilde.terceiro@fterceiro.pt";
    CONST COMPRAS_EMAIL   = "henrique.grencho@fterceiro.pt";
    CONST DIRPROD_EMAIL   = "paulo.sousa@fterceiro.pt";
    CONST REC_HUM         = "ines.cardoso@fterceiro.pt";
    
    
    CONST PREPRESS_NAME  = "Ricardo Simão";
    CONST IMPRESSAO_NAME = "Pedro Brás";
    CONST MARKETING_NAME = "Paulo Sousa";
    CONST EMBALAGEM_NAME = "Rui Cortinhas";
    CONST ADMIN_NAME     = "Leonilde Terceiro";
    CONST COMPRAS_NAME   = "Henrique Grencho";
    CONST DIRPROD_NAME   = "Paulo Sousa";
    CONST RECHUM_NAME    = "Inês Cardoso";
    
    /**
     * Guarda as configurações do ficheiro de configuração
     *
     * @var Zend_Config_Ini
     */
    protected $config;
    /**
     * Parametros de autenticação do servidor de email
     *
     * @var string
     */
    protected $params;
    /**
     * Insere os dados de autenticação
     *
     * @var Zend_Mail_Transport_Smtp
     */
    protected $transport;
    
    
    private function setTransport ()
    {
        $this->config = Zend_Registry::get('mail_server');
        
        $this->params = array('auth' => 'login',
                              'username' => $this->config->username,
                              'password' => $this->config->password, 
                              'ssl' => 'tls', 
                              'port' => 25);
        
        $this->transport = new Zend_Mail_Transport_Smtp($this->config->ip_dns, $this->params);
        
        return $this->transport;
    }
    
    
    public function setSeccao($seccao)
    {
        $this->seccao = $seccao;
    }
    
    private function _getSeccao()
    {
        return $this->seccao;
    }
    
    public function setID($id)
    {
        $this->id = $id;
    }
    
    public function setType($type)
    {
        $this->type = $type;
    }
    
    private function _getType()
    {
        return $this->type;
    }
    
    private function _getID()
    {
        return $this->id;
    }
    
    
    private function _defineEmailTo()
    {
        
        switch ($this->_getSeccao()) {
            case "Pré-impressão":
            case "Informática":    
                return array("nome" => self::PREPRESS_NAME, "email" => self::PREPRESS_EMAIL);
                break;
            
            case "Impressão":
                return array("nome" => self::IMPRESSAO_NAME, "email" => self::IMPRESSAO_EMAIL);
                break;
            
            case "Acab. Marketing":
                return array("nome" => self::DIRPROD_NAME, "email" => self::DIRPROD_EMAIL);
                break;
            
            case "Acab. Embalagem":
                return array("nome" => self::EMBALAGEM_NAME, "email" => self::EMBALAGEM_EMAIL);
                break;

           case "Geral":
                return array("nome" => self::COMPRAS_NAME, "email" => self::COMPRAS_EMAIL);
                break;
            
            
        }
        
        
    }
    
    public function sendMail ()
    {
        $template = new RPS_Mail_Template();
        $template->setP15ID($this->_getID());
        
        $sendTo = $this->_defineEmailTo();
        
        
        $mail = new Zend_Mail($charset = 'UTF-8');
        $mail->setBodyHtml($template->template());
        $mail->setFrom('no-reply@fterceiro.pt', 'P15');
        $mail->addTo(array($sendTo['nome'] => $sendTo['email']));
        
        if ($this->_getType() == "equipamento") {
            $mail->addCc(array(self::ADMIN_NAME => self::ADMIN_EMAIL, self::COMPRAS_NAME => self::COMPRAS_EMAIL));
        } else {
            $mail->addCc(array(self::ADMIN_NAME => self::ADMIN_EMAIL, self::RECHUM_NAME => self::REC_HUM));
        }
        
        $mail->setSubject("Registo de Manutenção P15");
        $mail->send($this->setTransport());
        
    }
    
    
    
}