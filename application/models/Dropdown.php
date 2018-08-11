<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dropdown extends CI_Model{
    function __construct() {
        $this->Category = 'mst_bookcat';
        $this->book = 'mst_book';
     
    }
    
    /*
     * Get country rows from the bookcat table
     */
    function getCategoryRows($params = array()){
        $this->db->select('c.bookcatID, c.bookcat');
        $this->db->order_by("bookcat", "asc");
        $this->db->from($this->Category.' as c');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        //return fetched data
        return $result;
    }
    
    /*
     * Get state rows from the bookcatID table
     */
    function getBookRows($params = array()){
        $this->db->select('s.bookcatID, s.*');
        $this->db->from($this->book.' as s');
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('s.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
    
    /*
     * Get city rows from the book table
     */
    function getBookid($params = array()){
        $this->db->select('c.bookID, c.author, c.accesseion_no, c.bookcatID');
        $this->db->order_by("book", "asc");
        $this->db->from($this->book.' as c');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
   
}