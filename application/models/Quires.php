<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	class Quires extends CI_Model {
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function show($table_name){
			$query = $this->db->get($table_name);
			return $query->result(); 
		}

		public function show_where($table_name, $condition) {
			$this->db->where($condition);  // apply the condition first
			$query = $this->db->get($table_name);
			return $query->result(); 
		}
		
			function insert_batch($values, $table_name)
			{
				$this->db->insert($table_name, $values);
			}

		function update_where($data, $table_name, $where)
		{
			$this->db->where($where);
			$this->db->update($table_name, $data);
			if ($this->db->affected_rows() == 1) {
				return true; // update succeeded
			} else {
				return false; // update failed
			}
		}
	function select_where($fields, $table_name, $where, $boolean = false, $single = false)
	{

		$query = $this->db->select($fields)
			->from($table_name)
			->where($where)
			->get();

		if ($query->num_rows() > 0) :
			if ($boolean == true) :
				return true;
			else :
				if ($single == true) :
					return $query->row()->$fields;
				else :
					return $query->result_array();
				endif;
			endif;
		endif;

		return false;
	}


	public function cra_show()
	{
		$this->db->select('step.processing_step,
						   step.p_step_id,
						   cra.id,
						   cra.cra_is_applied,
						   cra.cra_jstify,
						   cra.cra_food_safety_hazard, 
						   cra.cra_prvntv_ctrl, 
						   cra.cra_proccessing_id, 
						   legend.legend_id, 
						   legend.legend_name, 
						   legend.legend_desc');
		$this->db->from('fwc_cra cra');
		$this->db->join('cra_proccesing_step step', 'FIND_IN_SET(step.p_step_id, cra.cra_proccessing_id) > 0');
		$this->db->join('cra_legend legend', 'FIND_IN_SET(legend.legend_id, cra.cra_legend_id) > 0');
		$this->db->distinct();
		$this->db->order_by('cra.cra_proccessing_id');
		$query = $this->db->get();
		return $query->result();

	}
	public function cra_show_record($record_id)
	{
		$this->db->select('
					   cr.table_id,
					   crs.rev_sign,
					   crs.rev_name,
					   crs.rev_position,
					   crs.rev_date,
					   crs.appr_sign,
					   crs.appr_name,
					   crs.appr_position,
					   crs.appr_date,
					   cr.date_recorded, 
                       cps.processing_step, 
                       cr.cra_prvntv_ctrl_record, 
                       cr.cra_jstify_record, 
                       cr.cra_food_safety_hazard_record, 
                       cr.cra_is_applied_record,
					   cr.id_report, 
                       cl.legend_name, 
                       cl.legend_desc');
		$this->db->from('cra_record cr');
		$this->db->join('cra_reviewer_sign crs', 'FIND_IN_SET(crs.table_id, cr.table_id) > 0');
		$this->db->join('cra_proccesing_step cps', 'FIND_IN_SET(cps.p_step_id, cr.id_report) > 0');
		$this->db->join('cra_legend cl', 'FIND_IN_SET(cl.legend_id, cr.cra_legend_id) > 0');
		$this->db->where('cr.table_id', $record_id);
		$query = $this->db->get();
		$result = $query->result();
		return $result; // Add this line to return the result
	}
	public function cra_update_legend($value, $table_name, $id)
	{
		$legend_rep = $value[0]['legend_id'];
		$legend_name = $value[0]['cra_legend'];

		// Fetch the legend_id for the given legend_name
		$this->db->select('legend_id');
		$this->db->from('cra_legend');
		$this->db->where('legend_name', $legend_name);
		$query = $this->db->get();
		$row = $query->row();
		$legend_id = $row->legend_id;

		// Update the database with the new value
		$this->db->set('cra_legend_id', "REPLACE(cra_legend_id, $legend_rep, $legend_id)", FALSE);
		$this->db->where('id', $id);
		$result = $this->db->update($table_name);
		return $result;
	}
	
	function cra_update_legend_description($data, $table_name, $id)
	{
		$this->db->set('legend_desc', $data);
		$this->db->where('legend_id', $id);
		$result = $this->db->update($table_name);
		return $result;
	}

	function cra_processing_step_update($data, $table_name, $id)
	{
		$this->db->set('processing_step', $data);
		$this->db->where('p_step_id', $id);
		$result = $this->db->update($table_name);
		return $result;
	}
	function fwc_cra_tbl($columnName, $data, $table_name, $id)
	{
		$this->db->set($columnName, $data);
		$this->db->where('id', $id);
		$result = $this->db->update($table_name);
		return $result;
	}

	function insert_data($data, $dfi)
	{
		$p_steps = $dfi["p_steps"];
		$legend_justify = $dfi["lgend_justify"][0];
		$legend_applied_record = $dfi["lgend_applied_record"][0];

	
		// Insert processing step
		$process_steps = array(
			'p_step_id' => null,
			'processing_step' => $p_steps
		);
		$this->db->trans_start();
		$this->db->insert('cra_proccesing_step', $process_steps);
		$last_id = $this->db->insert_id();
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			echo "Error: " . $this->db->error();
		} else {
			$hazard_code = $data[0];
			$hazard_code_array = explode(',', $hazard_code);
			foreach ($hazard_code_array as $code) {
				$cra_data_steps = array(
					'cra_proccessing_id' => $last_id,
					'cra_legend_id' => $code,
					'cra_jstify' => $legend_justify,
					'cra_food_safety_hazard' => $legend_applied_record
				);
				$this->db->insert('fwc_cra', $cra_data_steps);
			}
		}
	}
	public function fwc_cra_delete_child($table_name, $id)
		{
			$this->db->where('id', $id);
			$this->db->delete($table_name); 
		}

		public function remove_parent($table_name, $id)
		{
			$this->db->where('cra_proccessing_id', $id); 
			$this->db->delete($table_name); 
		}

	function insert_cra_record($records,$reviewer)
	{
		$table_id = 1;
		$this->db->select('table_id');
		$this->db->from('cra_record');
		$query = $this->db->get();
		$existing_records = $query->result();

		foreach ($records['processing_id_records'] as $index => $processing_id) {
			foreach ($existing_records as $record) {
				if ($record->table_id == $table_id) {
					$table_id++;
				}
			}
			$insertedRecord = array(
				'table_id' => $table_id,
				'fwc_cra_id' => $processing_id,
				'id_report' => $records['id_report'][$index],
				'cra_legend_id' => $records['cra_legend_id'][$index],
				'cra_prvntv_ctrl_record' => $records['cra_prvntv_ctrl_record'][$index],
				'cra_jstify_record' => $records['cra_jstify_record'][$index],
				'cra_food_safety_hazard_record' => $records['cra_food_safety_hazard_record'][$index],
				'cra_is_applied_record' => $records['cra_is_applied_record'][$index]
			);
			$cra_records_succ = $this->db->insert('cra_record', $insertedRecord);
		}

		$success = $this->insert_batch($reviewer, 'cra_reviewer_sign');
		if($success) {
			$this->db->update('fwc_cra', array('cra_prvntv_ctrl' => NULL, 'cra_is_applied' => NULL));
		}

		
	}

	public function fwc_cra_add_child($id, $justify, $record)
	{
		$insertChild = array(
			'cra_proccessing_id' => $id,
			'cra_legend_id' => 1,
			'cra_jstify' => $justify,
			'cra_food_safety_hazard' => $record
		);
		$this->db->insert('fwc_cra', $insertChild);
	}
	
	}
