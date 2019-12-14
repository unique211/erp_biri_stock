<?php
class Crudmodel extends CI_Model{
	
	    function data_insert($data,$table){
		
		if($table=="packingbatch"){
			$result = $this->db->insert($table,$data);
				$insert_id = $this->db->insert_id();
				return $insert_id;
		}else{
				$result = $this->db->insert($table,$data);
				return $result;
		}
			}
			function data_update($data,$table,$colum,$id){
						$this->db->where($colum,$id);
						
				
			$result = $this->db->update($table,$data);
			return $result;
		}
		
	    function data_get($table){
			if($table == 'vendor_registration'){
					$this->db->order_by('regdate','desc');
			}
			else if($table == 'batch_master'){
                $this->db->order_by('batch','ASC');
                $this->db->where('index_value!=""');
            }
            else if($table == 'checker_master'){
                $this->db->order_by('name','ASC');
                $this->db->where('index_value!=""');
            }
            else if($table == 'wages_fixation'){
                $this->db->order_by('name','ASC');
                $this->db->where('index_value!=""');
            }
            else if($table == 'packingbatch'){
				$this->db->order_by('lablenm','ASC');
            }
            else if($table == 'rate_master'){
				$this->db->order_by('batch','ASC');
		    }
			else if($table == 'states'){
				$this->db->order_by('name','ASC');
		    }
			$hasil=$this->db->get($table);
			return $hasil->result();
		}
	    function data_get_where($table,$where){
			$sql="";
			if($where!=""){
					if($table == 'project_master'){
						$this->db->where('project_master.status','1');	
					}
    								
			}
			if($table == 'character_master'){
				if($where=='1'){
                    $this->db->select('character_master.*,project_master.name as projectname,peopletype_master.name as peoplename');    
                    $this->db->from('character_master');
                    $this->db->join('project_master', 'project_master.id = character_master.projectid');
                    $this->db->join('peopletype_master', 'peopletype_master.id = character_master.peopletype');
                
                    $hasil=$this->db->get();
                }
                else{
                    $this->db->select('character_master.*');    
                    $this->db->from('character_master	');
                    $hasil=$this->db->get();
                }
            }
            else if($table=='item_master'){
				$this->db->select('item_master.*');    
				$this->db->from('item_master	');
				$this->db->where($where);	
				$hasil=$this->db->get();
            }
            else if($table=='packingbatch'){
				$this->db->select('packingbatch.*');    
				$this->db->from('packingbatch	');
				$this->db->where($where);	
				$hasil=$this->db->get();
			}else if($table=="packingbatchdetails"){
				$this->db->select('packingbatchdetails.*,item_master.name as name');    
			    $this->db->from('packingbatchdetails');
				$this->db->join('item_master', 'item_master.id = packingbatchdetails.itemid');
				$this->db->where('item_master.type','PACKING');
				$this->db->where($where);	
				$hasil=$this->db->get();
			}else if($table=='con-party_master'){
				$this->db->select('con-party_master.*');    
                $this->db->from('con-party_master');
                $this->db->where('index_value != ""');
				$this->db->where($where);	
				$hasil=$this->db->get();
				//$sql=$this->db->last_query();
			}	
			else{
				$hasil=$this->db->get($table);
			}
			//file_put_contents('./log_'.date("j.n.Y").'.txt', $where), FILE_APPEND);
			 //return $sql;
			//return $q;
			return $hasil->result();
			//echo $where.'='.$sql;
		}
	    function get_count($table){
			$hasil=$this->db->get($table);
			return $hasil->num_rows();
		}
	    function get_count_where($table,$where){
			if($where!=""){
    					$this->db->where($where);				
			}
			$hasil=$this->db->get($table);
			return $hasil->num_rows();
		}
		
	    function get_insertid($table,$id){
					$this->db->select_max($id);
			$hasil=$this->db->get($table);
			return $hasil->row()->$id;
		}
	    function get_insertid_new($table,$id){
			$query =" SHOW TABLE STATUS LIKE '$table' ";
			$hasil=$this->db->query($query);
			return $hasil->row()->Auto_increment;
		}
		
	    function data_delete($table,$colum,$id){
    		$this->db->where($colum,$id);
			$result = $this->db->delete($table);
			return $result;
		}
		
	
		
	   	
}
?>