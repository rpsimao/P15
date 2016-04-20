<?php 


class RPS_User_Service_CreatePDF
{
    
    protected $id;
    
    
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    
    private function _getId()
    {
        return $this->id;
    }
    
    
    private function _getData()
    {
        $db = new Application_Model_P15();
        $row = $db->findById($this->_getId());
        
        return $row;
        
    }
    /**
     * @param array $params [page, texto_para_partir, posicaoX, posicaoY, enconding]
     * @param int $maxPalavras
     * @param int $kerning
     * @return string
     */
    
    private function _lineWrap (array $params = array(), $maxPalavras = 140, $kerning = 12)
    {
    
        $text          = stripcslashes($params['texto_para_partir']);
        $text          = wordwrap($text, $maxPalavras, '\r\n', true);
        $headlineArray = explode('\r\n', $text);
        $startPos      = $params['page']->getWidth();
        
        foreach ($headlineArray as $line) {
            $line       = ltrim($line);
            $paragraphs = $params['page']->drawText($line, $params['posicaoX'], $startPos - $params['posicaoY'], $params['enconding']);
            $startPos   = $startPos - $kerning;
        }
        return $paragraphs;
    }
    
    
    
    public function renderPDF()
    {
        
        $data = $this->_getData();
        
        $pdf = Zend_Pdf::load('pdf/base.pdf');
        
        foreach ($pdf->pages as $page)
        {
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::bold(12));
            $page->drawText($data[0]['id'], 433, 790, "UTF-8");
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::normal(12));
            $page->drawText($data[0]['data_abertura'], 90, 741, "UTF-8");
            $page->drawText($data[0]['turno'], 315, 741, "UTF-8");
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::condensed(10));
            $this->_lineWrap(array(
                    'texto_para_partir' => $data[0]['txt_descricao'] ,
                    'page'              => $page ,
                    'enconding'         => 'UTF-8' ,
                    'posicaoX'          => 40 ,
                    'posicaoY'          => -95));
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::normal(10));
            $page->drawText($data[0]['resp_descricao'], 145, 548);
            $data_desc = ($data[0]['data_descricao'] == "0000-00-00") ? "" : $data[0]['data_descricao'];
            $page->drawText($data_desc, 455, 548, "UTF-8");
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::condensed(10));
            $this->_lineWrap(array(
                    'texto_para_partir' => $data[0]['txt_intervencao'] ,
                    'page' => $page ,
                    'enconding' => 'UTF-8' ,
                    'posicaoX' => 40 ,
                    'posicaoY' => 95));
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::normal(10));
            $page->drawText($data[0]['resp_intervencao'], 170, 388, "UTF-8");
            $data_inter = ($data[0]['data_intervencao'] == "0000-00-00") ? "" : $data[0]['data_intervencao'];
            $page->drawText($data_inter, 455, 388, "UTF-8");
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::condensed(10));
            $this->_lineWrap(array(
                    'texto_para_partir' => $data[0]['txt_melhoria'] ,
                    'page' => $page ,
                    'enconding' => 'UTF-8' ,
                    'posicaoX' => 40 ,
                    'posicaoY' => 245));
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::normal(10));
            $page->drawText($data[0]['resp_melhoria'], 55, 292, "UTF-8");
            $data_mel = ($data[0]['data_melhoria'] == "0000-00-00") ? "" : $data[0]['data_melhoria'];
            $page->drawText($data_mel, 455, 292, "UTF-8");
            $page->drawText($data[0]['resp_verif_final'], 165, 171, "UTF-8");
            $data_ver = ($data[0]['data_verif_final'] == "0000-00-00") ? "" : $data[0]['data_verif_final'];
            $page->drawText($data_ver, 455, 171, "UTF-8");
            $page->restoreGS();
            
            $page->saveGS();
            $page->setStyle(RPS_Helpers_PDF_Styles::condensed(9));
            $this->_lineWrap(array(
                    'texto_para_partir' => $data[0]['notas'] ,
                    'page' => $page ,
                    'enconding' => 'UTF-8' ,
                    'posicaoX' => 40 ,
                    'posicaoY' => 460), 160, 11);
            $page->restoreGS();
        }
        
        return $pdf;
        
    }
    
    
    
    
    
}


