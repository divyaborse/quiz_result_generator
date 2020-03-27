<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
if(isset($quiz_data)){
	?>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th>Id</th>
			<th>User Id</th>
			<th>Quiz_Id</th>
			<th>Question number</th>
			<th>Response</th>
			
		</tr>
		<?php 
		foreach($quiz_data->result() as $row)
		{
				echo '
				<tr>
				<td>'.$row->id.'</td>
				<td>'.$row->user_id.'</td>
				<td>'.$row->q_id.'</td>
				<td>'.$row->ques.'</td>
				<td>'.$row->response.'</td>
				
				</tr>
				';
		}
					?>
		
	</table>
</div>
<form>

        <a href="<?= base_url('Report_controller/pdfdisplay')?>" class="btn btn-primary" >Generate Report</a>
<?php }
if(isset($question_details)){
	echo $question_details;
}
?>
</body>
</html>