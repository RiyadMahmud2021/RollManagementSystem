<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Company_Setting extends CI_Model{
	
  	public function __construct(){
        parent:: __construct();
    }

    public function getCountry()
    {
        return $this->db->get('countries')->result();
    }

    public function getState() 
    {
        return $this->db->get('states')->result();
    }
 
    public function addUpdate($data)
    {       
      $d = $this->db->get('company_settings')->result();
 
      if($d != null)
      {
          return $this->db->update('company_settings',$data);
      }
      else
      {
          return $this->db->insert('company_settings',$data); 
      }
    }
    
    public function getData()
    {
      return $this->db->get('company_settings')->result();
    }

}
