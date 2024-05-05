<?php

class GlobalCrud extends CI_Model {
    
    public function all($table){
        return $this->db->get($table);
    }
    
    public function get($table,$id){
        return $this->db->get_where($table,$id);
    }
    
    public function insert($table,$query = []){
        return $this->db->insert($table,$query);
    }
    
    public function delete($table,$column,$id){
        $this->db->where($column,$id);
        return $this->db->delete($table);
    }
    
    public function update($table,$query,$column,$id){
        $this->db->where($column,$id);
        return $this->db->update($table,$query);
    }
    
    public function count_table($table){
        return $this->db->count_all($table);
    }
    
    public function twoTablesFusion($table1,$table2,$select,$clause){
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2,$clause);
        return $this->db->get();
    }
    
    
}