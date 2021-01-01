<?php
class Userpermissionmodel extends CI_Model{
	
	    function data_get($table){
			$result=array();
					$this->db->select('menu_master.*');    
					$this->db->from('menu_master');
					$query =$this->db->get();
					$query =  $query ->result();

					foreach($query as $row){
						$menuid=$row->id;
						$menuname=$row->menuname;
						$submenu=array();
						$this->db->select('submeny_master.*');    
					$this->db->from('submeny_master');
					$this->db->where('main_menu_id', $menuid);;
					$query1 = $this->db->get();
					$query1= $query1->result();
					 foreach($query1 as $srow){
						$submenu_id=  $srow->id;
						$menu_id=  $srow->main_menu_id;
						$submenuname=  $srow->sub_menu_name;
						$submenu[]=array(
							'submenu_id'=>$submenu_id,
							'menu_id'=>$menu_id,
						   'submenuname'=>$submenuname,
						);
					 }
					 $result[]=array(
						'menuid'=>$menuid,
						'menu_name'=>$menuname,
						'submenudata'=>$submenu,
					);
					}
					return $result;
				
		}
		function getsubmenu($id){
			// $this->db->select('submeny_master.*');    
			// 		$this->db->from('submeny_master');
			// 		$this->db->where('main_menu_id', $id);;
			// 		$query = $this->db->get();
			// 		return $query->result();
		}
		function save_data($userpermission,$role){

			$this->db->where('role_id',$role);
			$this->db->delete('user_permission');
			if($userpermission !=""){
				foreach ($userpermission as $value) {
					if($value["menuid"]==1){
						$data = array(
							'role_id' =>$role,
							'menu_id' =>$value["menuid"] ,
							'submenu_id' =>$value["submenu"] ,
								'create_p' =>$value["addpermission"] ,
								'read_p' =>$value["readpermission"] ,
								'edit_p' =>$value["editpermission"],
								'delete_p' =>$value["deletepermission"],
						);
						$result = $this->db->insert('user_permission',$data);
					}
					if(($value["addpermission"] >0) || ($value["editpermission"] >0) || ($value["deletepermission"] >0) ||($value["readpermission"] >0)){
						$data = array(
							'role_id' =>$role ,
							'menu_id' =>$value["menuid"] ,
							'submenu_id' =>$value["submenu"] ,
								'create_p' =>$value["addpermission"] ,
								'read_p' =>$value["readpermission"] ,
								'edit_p' =>$value["editpermission"],
								'delete_p' =>$value["deletepermission"],
						);
						$result = $this->db->insert('user_permission',$data);
					
					}
				}
				return 1;
			}
		}
		public function getuser_permisssion($role){
			$this->db->select('user_permission.*');    
					$this->db->from('user_permission');
					$this->db->where('role_id', $role);
					$query = $this->db->get();
					return $query->result();
		}
		
		
}
?>
