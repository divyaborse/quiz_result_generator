<?php
class Report_controller extends CI_Controller{
public function __construct()
{
	parent::__construct();
	$this->load->model('Model_Report');
	$this->load->library('pdf');

}
public function index()
{
	$data['quiz_data'] = $this->Model_Report->fetch();
	$this->load->view('Report_View',$data);
}
public function details(){
if($this->uri->segment(3)){
$q_id = $this->uri->segment(3);
$data['question_details'] = $this->Model_Report->fetch_single_details($q_id);
$this->load->view('Report_View',$data);
}
}
public function pdfdetails(){
	if($this->uri->segment(3)){
		$quiz_id = $this->uri->segment(3);
		$html_content =  $this->Model_Report->fetch_single_details($quiz_id);
		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
		$stream = TRUE;
		 if ($stream) {
        $this->pdf->stream($quiz_id.".pdf", array("Attachment" => 0));
    } 
	}
}
public function pdfdisplay(){
	$content = $this->Model_Report->fetch_single_details();
	$this->pdf->loadHtml($content);
	$this->pdf->render();
	$stream = TRUE;
	if ($stream) {
        $this->pdf->stream("1.pdf", array("Attachment" => 0));
    } 
}
}
?>