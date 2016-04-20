<?php

class RPS_Mail_Template
{
    
    
    public function setP15ID($id)
    {
        $this->id = $id;      
               
     }
     
     private function _getP15ID()
     {
         
         return $this->id;
     }
     
    
     public function template()
     {
         
         return 
         '<html><head><style type="text/css" media="screen">*{font-family: Arial, Helvetica, Geneva, sans-serif;margin: 0;padding: 0;}.all{background-color: #f9f9f9;margin: 0;padding: 0;height:500px;}.navbar{color: silver;font-size: 16px;text-transform: uppercase;background-color: black;height: 30px;margin: 0 0 15px;padding-top: 10px;padding-left: 12px;}.initform{margin: auto auto 30px;width: 500px;border: 1px solid silver;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;padding: 25px;background-color: white;}.titulo{color: gray;font-size: 18px;font-weight: bold;text-align: center;margin-bottom: 15px;}.body_p15 p{text-align: center;color: black;font-size: 13px;}.body_p15 td{font-size: 80%;}.body_p15 th{background-color: #e5e5e5;text-align: center;color: gray;padding: 7px;}.body_p15{text-align: center;}.body_p15 table{text-align: center;width: 100%;margin-top: 20px;}
                 .botao {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ededed", endColorstr="#dfdfdf");
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
}.botao:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#dfdfdf", endColorstr="#ededed");
	background-color:#dfdfdf;
}.botao:active {
	position:relative;
	top:1px;
}.body_p15 img{padding-top: 25px;padding-bottom: 25px;}.body_p15 a, a:hover, a:visited{text-decoration: none;}.footer{
	background-color: #a7a7a7;
	color: #e5e5e5;
	font-size: 9px;
	text-align: center;
	padding-top: 2px;
	padding-bottom: 2px;
} </style></head><body><div class="all"><div class="navbar">REGISTO DE MANUTENÇÃO CORRECTIVA - [P15]</div><div class="initform"><p class="titulo">Foi criado um novo Registo de Manutenção Correctiva</p><div class="body_p15" align="center"><p>Para aceder tem 2 opções:</p><table><tr><th>On-line</th><th>PDF</th></tr><tr><td><img alt="pdf" src="data:image/jpeg;base64,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" width="100px" height="100px"/></td><td><img alt="cloud" src="data:image/jpeg;base64,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" width="100px" height="100px"/></td></tr><tr><td><span class="botao"><a href="http://p15.intranet.fterceiro.pt/index/view/'.$this->_getP15ID().'" target="_blank">Clique para aceder</a></span></td><td><span class="botao"><a href="http://p15.intranet.fterceiro.pt/index/pdf/'.$this->_getP15ID().'" target="_blank">Clique para gerar PDF</a></span></td></tr></table></div></div></div><div class="footer">&copy;'.Zend_Date::now()->toString('YYYY').' - Fernandes &amp; Terceiro, S.A.</div></body></html>';
     }
     
     
    
}