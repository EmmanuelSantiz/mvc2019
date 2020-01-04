<?php
class Supermodel {

    private $from;
    private $select;
    private $join;
    private $fields;
    private $where;
    private $group_by;
    //private 
	
	public function __construct() {
        $this->db = new Database();
        $this->select = 'SELECT ';
        $this->where = ' WHERE 1';
    }

    public function find($type, $params = array()) {
        //Set Fields
        if(isset($params['fields'])) {
            $this->fields($params['fields']);
        }
        //Set From
        if(isset($params['from'])) {
            $this->from($params['from']);
        }
        //Set Joins
        if(isset($params['joins'])) {
            $this->join($params['joins']);
            //dd($params['joins']);
        } else {
            $this->join = '';
        }
        //Set Where
        if(isset($params['where'])) {
            $this->where($params['where']);
        }
        //Set group By
        if(isset($params['group'])) {
            $this->group_by($params['group']);
        }

        //$query = $this->db->connect()->prepare($this->preparar());
        //$query->execute();
        $result = $this->preparar();
        switch($type) {
            case 'count':
                break;
            case 'first':
                //$result = $query->fetch(PDO::FETCH_ASSOC);
                break;
            default:
                //$result = $query->fetchAll(PDO::FETCH_ASSOC);
                break;
        }
        return $result;
        //return $this->preparar();
    }
    public function from($from) {
        $this->from = ' FROM ';
        if(isset($from)) {
            $this->from .= $from;
        }
    }
    public function fields($fields) {
        if(is_array($fields)) {
            if(count($fields) < 1) {
                $this->fields = '*';
            }
            foreach($fields as $ele) {
                if($this->fields == '') {
                    $this->fields = $ele;
                } else {
                    $this->fields .= ', '.$ele;
                }
            }
        } else {
            $this->fields = $fields == '' ? '*' : $fields;
        }
    }
    public function join($join) {
        if(is_array($join)) {
            foreach($join as $ele => $value) {
                $this->join .= ' '.$value[1].' JOIN '.$ele.' ON '.$value[0];
            }
        }
    }
    public function where($where) {
        if(is_array($where)) {
            foreach($where as $ele => $value) {
                $this->where .= ' AND ';
                foreach($value as $key => $val) {
                    $this->where .= $ele.' '.$key.' '.$val;
                }
            }
        } else {
            $this->where = $where ? ' WHERE '.$where : ' WHERE 1';
        }
    }
    public function group_by($by) {
        $this->group_by = ' GROUP BY '.$by;
    }
    public function preparar() {
        $salida = '';
        if($this->select) $salida .= $this->select;
        if($this->fields) $salida .= $this->fields;
        if($this->from) $salida .= $this->from;
        if($this->join) $salida .= $this->join;
        $salida .= $this->where;
        if($this->group_by) $salida .= $this->group_by;
        return $salida;
    }
}
?>
