<?php

class Application_Model_P15 implements RPS_Interfaces_CRUD
{

    protected $tableRegistos;

    /**
     */
    public function __construct ()
    {
        $config = Zend_Registry::get('p15');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        
        $this->tableRegistos = new Application_Model_DbTable_Registos();
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::deleteRecord()
     *
     */
    public function deleteRecord ($id)
    {
        $where = $this->tableRegistos->getAdapter()->quoteInto('id = ?', $id);
        $this->tableRegistos->delete($where);
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::getAllRecords()
     *
     */
    public function getAllRecords ()
    {
        $rows = $this->tableRegistos->fetchAll(null, 'data_abertura DESC');
        
        return $rows;
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::findById()
     *
     */
    public function findById ($id)
    {
        $row = $this->tableRegistos->find($id);
        return $row;
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::insertData()
     *
     */
    public function insertData (array $params)
    {
        $data = array(
                'id'               => $params['id'],
                'tipo'             => $params['tipo'],
                'data_abertura'    => $params['data_abertura'],
                'turno'            => $params['turno'],
                'seccao'           => $params['seccao'],
                'txt_descricao'    => $params['txt_descricao'],
                'resp_descricao'   => $params['resp_descricao'],
                'data_descricao'   => $params['data_descricao'],
                'txt_intervencao'  => $params['txt_intervencao'],
                'resp_intervencao' => $params['resp_intervencao'],
                'data_intervencao' => $params['data_intervencao'],
                'txt_melhoria'     => $params['txt_melhoria'],
                'resp_melhoria'    => $params['resp_melhoria'],
                'data_melhoria'    => $params['data_melhoria'],
                'resp_verif_final' => $params['resp_verif_final'],
                'data_verif_final' => $params['data_verif_final'],
                'notas'            => $params['notas']
        );
        
        $find = $this->findById($params['id']);
        
        if (count($find) > 0) {
            $where = $this->tableRegistos->getAdapter()->quoteInto('id = ?', $params['id']);
            $this->tableRegistos->update($data, $where);
            
            return $params['id'];
            
        } else {
            
            $this->tableRegistos->insert($data);
            
            return $this->tableRegistos->getAdapter()->lastInsertId();
        }
    }
    
    /**
     * 
     * @param date $date
     * @return Zend_Db_Table_Row
     */
    
    public function getByDate($date)
    {
        $sql = $this->tableRegistos->select();
        $sql->where('date(data_abertura)= ?', $date);
        
        $rows = $this->tableRegistos->fetchAll($sql);
        
        return $rows;
    }
}

?>