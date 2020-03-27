<?php

class Model_Report extends CI_Model{
	public function fetch(){
	//	$this->db->order_by('q_id','DESC');
		return $this->db->get('quiz_response');
	}
	
	public function fetch_single_details(){
		$score = 0;
		
		$data = $this->db->get('quiz_response');
		$output = '<table width = 100% cellspacing = "5" cellpadding= "5">';
		foreach($data->result() as $row){
			if($row->response == $row->result){
			 $score = $score +1;
			$output .= '
			<tr>
			<td width ="75%">
			<p><b>id : </b>'.$row->id.'</p>
			<p><b>User_id : </b>'.$row->user_id.'</p>
			<p><b>Quiz_id : </b>'.$row->q_id.'</p>
			<p><b>Question_number : </b>'.$row->ques.'</p>
			<p><b>Response : </b>'.$row->response.'</p>
			<p><b>Result : </b>'.$row->result.'</p>

			<p><b>Ans: Correct   </b></p>
			</td>
			</tr>
			';
		}
			else{
				$output .= '
			<tr>
			<td width ="75%">
			<p><b>id : </b>'.$row->id.'</p>
			<p><b>User_id : </b>'.$row->user_id.'</p>
			<p><b>Quiz_id : </b>'.$row->q_id.'</p>
			<p><b>Question_number : </b>'.$row->ques.'</p>
			<p><b>Response : </b>'.$row->response.'</p>
			<p><b>Result : </b>'.$row->result.'</p>

			<p><b>Ans:Incorrect  </b></p>
			</td>
			</tr>
			';
		}

			}
		
		
		$output .= '<p><b>Final Score:   </b> '.$score.'</p>';
		$output .= '
		<tr>
		<td colspan ="2" align ="center"><a href = "'.base_url().'Report_controller" class = "btn btn-primary">Back</a></td>
		</tr>
		';
				

		$output .= '</table>';
		return $output;
	}
}
?>