<?php
class Daybookrepmodel extends CI_Model{
    
    function insertdata($table,$data)
	{         
        $result = $this->db->insert($data,$table);
        return $result;
    }
    function insertrecord($table,$data)
	{         
        $this->db->insert($data,$table);
        $result = $this->db->insert_id();
        return $result;
    }
    function updatedata($table,$data,$id)
    {
        $this->db->where('id',$id);
		$result = $this->db->update($data,$table);
      	return $result;
	} 
	function getconissuedata($table,$date){

		// $tdate=$this->input->post('tdate');
		$result11=array();
		$data=array();
        $this->db->select('cont_issue_receive.*, con-party_master.name as co_name,batch_master.batch as batchname,wages_fixation.name as wagesname');    
        $this->db->order_by('batch_master.batch','DESC');
        $this->db->from('cont_issue_receive');
        $this->db->join('con-party_master', 'con-party_master.id = cont_issue_receive.cont_name');
        $this->db->join('batch_master', 'batch_master.id = cont_issue_receive.batch1');
        $this->db->join('wages_fixation', 'wages_fixation.id = cont_issue_receive.wages');
       	$this->db->where('date',$date);
		$query55 = $this->db->get()->result();
		
		
		
		$tdate=$this->input->post('tdate');
        $this->db->select('batch_master.batch,SUM(cont_issue_receive.asal_bidi)as asal_bidi,sum(cont_issue_receive.chant_bidi_pcs)as chant_bidi_pcs,SUM(cont_issue_receive.chant_bidi_kgs)as chant_bidi_kgs,SUM(cont_issue_receive.tob)as tob,sum(cont_issue_receive.tob_bag)as tob_bag,sum(cont_issue_receive.leaves)as leaves,SUM(cont_issue_receive.leaves_bag) as leaves_bag, sum(cont_issue_receive.bl_yarn)as bl_yarn,sum(cont_issue_receive.wh_yarn) as wh_yarn,sum(cont_issue_receive.filter)as filter,sum(cont_issue_receive.disc)as disc,SUM(cont_issue_receive.cartons)as cartons');
        $this->db->group_by('batch_master.batch');
        $this->db->order_by('batch_master.batch','DESC');
        $this->db->from('cont_issue_receive');
        $this->db->join('batch_master','batch_master.id=cont_issue_receive.batch1');
        $this->db->where('date',$date);
      
		$query15=$this->db->get()->result();
		

		$this->db->select('cont_adj.*, con-party_master.name as co_name,batch_master.batch as batchname');    
        $this->db->from('cont_adj');
        $this->db->join('con-party_master', 'con-party_master.id = cont_adj.contractor');
        $this->db->join('batch_master', 'batch_master.id = cont_adj.batch');
        $this->db->where('date',$date);
		$query25 = $this->db->get()->result();
		

		$this->db->select('vouchar.*,cm.name as contractor');    
		$this->db->from('vouchar');
		$this->db->join('con-party_master cm' ,'cm.id=vouchar.from');
	
		$this->db->where('vouchar.date', $date);
		//$this->db->join('con-party_master cm1','cm1.id=vouchar.to');,cm1.name as tcontractor
		$query = $this->db->get()->result();
		//echo $this->db->last_query();
		foreach($query as $row){
			$id=$row->id;
			$date=$row->date;
			$type=$row->type;
			$from=$row->from;
			$to=$row->to;
			$contractor=$row->contractor;
			$amount=$row->amount;
			$remark=$row->remark;
			//echo $this->db->last_query();
			if($to != ''){
				$this->db->select('name as tcontractor');    
				$this->db->from('con-party_master');
				$this->db->where('id',$to);
				$result = $this->db->get()->result();
				foreach($result as $row){
					$tcontractor=$row->tcontractor;
					$to=$to;
				}
				if($tcontractor != ''){
					$tcontractor=$tcontractor;
				  //  $tcontrct='';
				}
				else{
					$tcontractor='';
				}
			}
			else{
				$tcontractor=='';
				$to='';
			}
			//if($to == 0 )
			if($type=="Contractor"){
				$this->db->select_sum('amount');
				//$this->db->select('*');
				$this->db->from('information');
				$this->db->where('refid',$id);
				$result=$this->db->get()->result();
				foreach($result as $row){
				   // $refid=$row->refid;
					$amount=$row->amount;
				}
				//echo $this->db->last_query();
				$data[]=array(
					'id'=>$id,
					'date'=>$date,
					'type'=>$type,
					'from'=>$from,
					'to'=>$to,
					'amount'=>$amount,
					'remark'=>$remark,
					'contractor'=>$contractor,
					'tcontractor'=>''
				);

			}else{
				$data[]=array(
					'id'=>$id,
					'date'=>$date,
					'type'=>$type,
					'from'=>$from,
					'to'=>$to,
					'amount'=>$amount,
					'remark'=>$remark,
					'contractor'=>$contractor,
					'tcontractor'=>$tcontractor
				);

			}
			
		}

		$this->db->select('finished_product.*,packingbatch.lablenm,packingbatch.id as pid,packingbatch.asalbidi as bidi,packingbatch.chantbidi as cbidi');    
            $this->db->from('finished_product');
            $this->db->join('packingbatch','packingbatch.id=finished_product.label_id');
            $this->db->where('date',$date);
           
			$query35 = $this->db->get()->result();
			

			$this->db->select('purchase_master.*,con-party_master.name as party_name');    
			$this->db->from('purchase_master');
			$this->db->join('con-party_master', 'con-party_master.id = purchase_master.party_id');
		//	$this->db->where('type',$where);
				$this->db->where("(type='Purchase' OR type='Sale')");
			$this->db->where('voucher_date',$date);
			$query45 = $this->db->get()->result();



			$this->db->select('tobaccomix_master.*,raw_batch_master.batch as batch_name');    
           $this->db->from('tobaccomix_master');
           $this->db->join('raw_batch_master','raw_batch_master.id=tobaccomix_master.batch');
           $this->db->where('date',$date);
           $queryt = $this->db->get()->result();
           
			
           
        
	   
		$result11[]=array(
			'coniss'=>$query55,
			'batchdata'=>$query15,
			'conadj'=>$query25,
			'voucher'=>$data,
			'finishpro'=>$query35,
			'rawitempur'=>$query45,
			'tabacomix'=>$queryt,
		);
		return $result11;

	}


    function showalldata($table,$id)
    {
        if($table == 'information'){
            $this->db->select('information.*,con-party_master.name as contractor');    
            $this->db->from($table);
            $this->db->join('con-party_master','con-party_master.id=information.name');
            $this->db->where('refid',$id);
            $query = $this->db->get();
            return $query->result();
        }
        else if($table=="vouchar"){
            $fromdate=$this->input->post('fromdate');
			$todate=$this->input->post('todate');
            $result ='';$tcontractor='';$data[]='';$query='';$id='';$date='';$type='';$from=0;$to=0;$contractor='';
            $amount=''; $remark='';
            $this->db->select('vouchar.*,cm.name as contractor');    
            $this->db->from($table);
			$this->db->join('con-party_master cm' ,'cm.id=vouchar.from');
			$this->db->where('vouchar.date >=', $fromdate);
					$this->db->where('vouchar.date <=', $todate);
            //$this->db->join('con-party_master cm1','cm1.id=vouchar.to');,cm1.name as tcontractor
			$query = $this->db->get()->result();
			// echo $this->db->last_query();
            foreach($query as $row){
                $id=$row->id;
                $date=$row->date;
                $type=$row->type;
                $from=$row->from;
                $to=$row->to;
                $contractor=$row->contractor;
                $amount=$row->amount;
                $remark=$row->remark;
                //echo $this->db->last_query();
                if($to != ''){
                    $this->db->select('name as tcontractor');    
                    $this->db->from('con-party_master');
                    $this->db->where('id',$to);
                    $result = $this->db->get()->result();
                    foreach($result as $row){
                        $tcontractor=$row->tcontractor;
                        $to=$to;
                    }
                    if($tcontractor != ''){
                        $tcontractor=$tcontractor;
                      //  $tcontrct='';
                    }
                    else{
                        $tcontractor='';
                    }
                }
                else{
                    $tcontractor=='';
                    $to='';
                }
                //if($to == 0 )
                if($type=="Contractor"){
                    $this->db->select_sum('amount');
                    //$this->db->select('*');
                    $this->db->from('information');
                    $this->db->where('refid',$id);
                    $result=$this->db->get()->result();
                    foreach($result as $row){
                       // $refid=$row->refid;
                        $amount=$row->amount;
                    }
                    //echo $this->db->last_query();
                    $data[]=array(
                        'id'=>$id,
                        'date'=>$date,
                        'type'=>$type,
                        'from'=>$from,
                        'to'=>$to,
                        'amount'=>$amount,
                        'remark'=>$remark,
                        'contractor'=>$contractor,
                        'tcontractor'=>''
                    );
    
                }else{
                    $data[]=array(
                        'id'=>$id,
                        'date'=>$date,
                        'type'=>$type,
                        'from'=>$from,
                        'to'=>$to,
                        'amount'=>$amount,
                        'remark'=>$remark,
                        'contractor'=>$contractor,
                        'tcontractor'=>$tcontractor
                    );
    
                }
                
            }
            //echo "data " .json_encode($data);
            return $data;
        }
    }

    function delete_data($table_name,$id)
    {
        if($table_name=='information'){
            $this->db->where('refid',$id);
        }else{
        
            $this->db->where('id',$id);
        }
        $result = $this->db->delete($table_name);
        return $result;
    } 
    function getname($table){
        $where=$this->input->post('ledger');
        $this->db->select('id,name');
        $this->db->from($table);
        //$this->db->where('party',$where);
        //$this->db->where('index_value!=""');
        $query=$this->db->get()->result();
        return $query;
    }
    function getnamebywhere($table){
        $ledger=$this->input->post('ledger');
        $where=$this->input->post('where');
        $where1=$this->input->post('where1');
        $this->db->select('id,name');
        $this->db->from($table);
        $this->db->where('party',$ledger);
        $this->db->where('ledger',$where);
        $this->db->or_where('ledger',$where1);
        $query=$this->db->get()->result();
        return $query;
    }
    function getparty($table){
        $where=$this->input->post('contractor');
        $this->db->select('id,name');
        $this->db->from($table);
        $this->db->where('party',$where);
        $this->db->where('index_value!=""');
        $query=$this->db->get()->result();
        return $query;
    }
}
?>
