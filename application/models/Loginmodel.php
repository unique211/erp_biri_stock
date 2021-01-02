<?php
class Loginmodel extends CI_Model{
	
	
 function check_login(){
	 
        $user_id =$this->input->post('user_id');
		$password =$this->input->post('password');
		$userpermission=array();
       // $user_id ="admin";
      //  $password ="admin";
		$msg = 0;	 
			$this->db->select(['password','user_id','user_master.id','role','user_name','role_master.name']);    
			$this->db->from('user_master');
			$this->db->join('role_master', 'role_master.id = user_master.role');
			$this->db->where('user_id', $user_id);
			$this->db->where('password', $password);
			$query = $this->db->get();

			if($query->num_rows()>0){
			
			$get_email = $query->row()->user_id;
			$get_password = $query->row()->password;
			$get_id = $query->row()->id;
			$role = $query->row()->name;
			$roleid = $query->row()->role;
			$username = $query->row()->user_name;
			
			
			
				if(($get_email==$user_id)&&($get_password==$password)){
					$msg = 1;
					
					$this->session->userid = $get_id;
					$this->session->role = $role;
					$this->session->roleid = $roleid;
					$this->session->username = $username;

					$sidermenu=array();
					$this->db->select('menu_master.*');    
					$this->db->from('menu_master');
					$query =$this->db->get();
					$query =  $query ->result();

					foreach($query as $row){
						$menuid=$row->id;
						$menuname=$row->menuname;
						$create_p=0;
						$edit_p=0;
						$delete_p=0;
						$read_p=0;
						$menuper=0;
						$this->db->select('user_permission.*');    
						$this->db->from('user_permission');
						$this->db->where('role_id', $roleid);;
						$this->db->where('menu_id', $menuid);;
						$menuinfo =$this->db->get();

						if($menuinfo->num_rows() >0){
							$menupermission =  $menuinfo ->result();
							$menuper=1;
							foreach($menupermission as $menuinfo){
								$create_p=$menuinfo->create_p;
								$edit_p=$menuinfo->edit_p;
								$delete_p=$menuinfo->delete_p;
								$read_p=$menuinfo->read_p;
								
							}

						$submenudata=array();
						$submenuper=0;
						$this->db->select('submeny_master.*');    
					$this->db->from('submeny_master');
					$this->db->where('main_menu_id', $menuid);;
					$query1 = $this->db->get();
					$query1= $query1->result();
					 foreach($query1 as $srow){
						$submenu_id=  $srow->id;
						$menu_id=  $srow->main_menu_id;
						$submenuname=  $srow->sub_menu_name;
						$this->db->select('user_permission.*');    
						$this->db->from('user_permission');
						$this->db->where('role_id', $roleid);;
						$this->db->where('submenu_id', $submenu_id);;
						$submenuinfo =$this->db->get();

						if($submenuinfo->num_rows() >0){
							$submenuper=1;
							$submenudata[]=array(
								'submenuid'=>$submenu_id,
								'submenuper'=>$submenuper,
							);
						}
						
						
					 }
					
					}
					$sidermenu[]=array(
						'menu_id'=>$menuid,
						'menuper'=>$menuper,
						'create_p'=>$create_p,
						'edit_p'=>$edit_p,
						'delete_p'=>$delete_p,
						'read_p'=>$read_p,
						
						'submenudata'=>$submenudata,
					);
				}
				$this->session->permission = $sidermenu;
					
				}
				
			}
			return $msg;
			
       }
}
?>
