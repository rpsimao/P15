<?php

class Application_Form_Registo extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAction('/process');
        $this->setAttribs(array("id" => "p15-form"));
        $this->setDecorators(array('FormElements', 'Form'));
        $decorators = array(array('ViewHelper'), array('Errors'),array('Label'),array('HtmlTag'));
        $radioDecorators = array(
            'ViewHelper',
        array(array('AddTheLi' => 'HtmlTag'), array('tag' => 'li', 'class' => 'radio-inline')),
        array(array('AddTheUl' => 'HtmlTag'), array('tag' => 'ul', 'id' => "radio-inline-li")),
            'Errors'
    );
        
        $id = new Zend_Form_Element_Hidden('id');
        $this->addElement($id);
        
        $type = new Zend_Form_Element_Radio('tipo');
        $type->setRequired(TRUE);
        $type->addMultiOptions(array('equipamento' => " Equipamento / Infraestruturas", "humano" => " Meio Humano"));
        $type->setSeparator('</li><li class="radio-inline">');
        $type->setAttribs(array("class"=>'pad-right-5'));
        $type->setDecorators($radioDecorators);
        $this->addElement($type);
        
        $date = new Zend_Form_Element_Text('data_abertura');
        $date->setRequired(TRUE);
        $date->setValue(Zend_Date::now()->toString('YYYY-MM-dd HH:mm:ss'));
        $date->setValidators(array(new Zend_Validate_Date()));
        $date->setOptions(array('class' => 'input-large'));
        $date->setDecorators($decorators);
        $this->addElement($date);
        
        $turno = new Zend_Form_Element_Select('turno');
        $turno->setRequired(TRUE);
        $turno->setValidators(array(new Zend_Validate_Int()));
        $turno->addMultiOptions(array(""=>'Escolha o Turno:', "1" => 'Turno 1', '2' => 'Turno 2', '3' => 'Turno 3'));
        $turno->setOptions(array('class' => 'input-medium'));
        $turno->setDecorators($decorators);
        $this->addElement($turno);
        
        
        $seccao = new Zend_Form_Element_Select('seccao');
        $seccao->setRequired(TRUE);
        $seccao->addMultiOptions(array(""                =>'Escolha a secção:', 
                                       "Pré-impressão"   => 'Pré-impressão', 
                                       'Impressão'       => 'Impressão', 
                                       'Acab. Marketing' => 'Acab. Marketing', 
                                       'Acab. Embalagem' => 'Acab. Embalagem',
                                       'Armazém'         => 'Armazém',
                                       'Informática'     => 'Informática',
                                       'Geral'           => 'Geral'
                ));
        $seccao->setOptions(array('class' => 'input-medium'));
        $seccao->setDecorators($decorators);
        $this->addElement($seccao);
        
        $txtDescricao = new Zend_Form_Element_Textarea('txt_descricao');
        $txtDescricao->setRequired(TRUE);
        $txtDescricao->setDecorators($decorators);
        $txtDescricao->setOptions(array("rows"=>"10", "cols"=>"40", "class"=>"txtar", 'placeholder'=>'Descrição da ocorrência'));
        $this->addElement($txtDescricao);
        
        $respDescricao = new Zend_Form_Element_Text('resp_descricao');
        $respDescricao->setDecorators($decorators);
        $respDescricao->setOptions(array('class' => 'input-medium'));
        $this->addElement($respDescricao);
        
        $dataDescricao = new Zend_Form_Element_Text('data_descricao');
        $dataDescricao->setDecorators($decorators);
        $dataDescricao->setOptions(array('class' => 'input-medium'));
        $this->addElement($dataDescricao);
        
        
        $txtIntervencao = new Zend_Form_Element_Textarea('txt_intervencao');
        $txtIntervencao->setRequired(TRUE);
        $txtIntervencao->setDecorators($decorators);
        $txtIntervencao->setOptions(array("rows"=>"10", "cols"=>"40", "class"=>"txtar", 'placeholder'=>'Intervenção Efectuada'));
        $this->addElement($txtIntervencao);
        
        $respIntervencao = new Zend_Form_Element_Text('resp_intervencao');
        $respIntervencao->setDecorators($decorators);
        $respIntervencao->setOptions(array('class' => 'input-medium'));
        $this->addElement($respIntervencao);
        
        $dataIntervencao = new Zend_Form_Element_Text('data_intervencao');
        $dataIntervencao->setDecorators($decorators);
        $dataIntervencao->setOptions(array('class' => 'input-medium'));
        $this->addElement($dataIntervencao);
        
        $txtMelhoria = new Zend_Form_Element_Textarea('txt_melhoria');
        $txtMelhoria->setDecorators($decorators);
        $txtMelhoria->setOptions(array("rows"=>"10", "cols"=>"40", "class"=>"txtar", 'placeholder'=>'Proposta de melhoria'));
        $this->addElement($txtMelhoria);
        
        $respMelhoria = new Zend_Form_Element_Text('resp_melhoria');
        $respMelhoria->setOptions(array('class' => 'input-medium'));
        $respMelhoria->setDecorators($decorators);
        $this->addElement($respMelhoria);
        
        $dataMelhoria = new Zend_Form_Element_Text('data_melhoria');
        $dataMelhoria->setDecorators($decorators);
        $dataMelhoria->setOptions(array('class' => 'input-medium'));
        $this->addElement($dataMelhoria);
        
        $respVerifFinal = new Zend_Form_Element_Text('resp_verif_final');
        $respVerifFinal->setOptions(array('class' => 'input-medium'));
        $respVerifFinal->setDecorators($decorators);
        $this->addElement($respVerifFinal);
        
        $dataVerifFinal = new Zend_Form_Element_Text('data_verif_final');
        $dataVerifFinal->setDecorators($decorators);
        $dataVerifFinal->setOptions(array('class' => 'input-medium'));
        $this->addElement($dataVerifFinal);
        
        $notas = new Zend_Form_Element_Textarea('notas');
        $notas->setDecorators($decorators);
        $notas->setOptions(array("rows"=>"10", "cols"=>"40", "class"=>"txtar", 'placeholder'=>'Notas'));
        $this->addElement($notas);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setAttrib('class', 'btn btn-primary');
        $this->addElement($submit);
        
    }


}

