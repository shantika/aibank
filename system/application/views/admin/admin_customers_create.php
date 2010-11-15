<?php $this->load->view('header_view'); ?>

<?php
echo form_open('admin/customers/create');
echo "<p><label for='name'>Name</label><br/>";
$data = array('name'=>'name','id'=>'name','size'=>25);
echo form_input($data) ."</p>";

echo "<p><label for='dob_year'>Year of birth</label><br/>";
$data = array('name'=>'dob_year','id'=>'dob_year','size'=>25);
echo form_input($data) ."</p>";

echo "<p><label for='info'>Info</label><br/>";
$data = array('name'=>'info','id'=>'info','size'=>50);
echo form_input($data) ."</p>";

echo "<p><label for='job'>Job</label><br/>";
$options = array('Profession/Management' => '5', 'Technical Employee/Highly Skilled Engineer' => '4', 'Office staff' => '3', 'Student' => '2', 'Worker' => '1', 'Part-timer' =>'0');
echo form_dropdown('job',$options) ."</p>";

echo "<p><label for='housing_status'>Housing status</label><br/>";
$options = array('Private home' => '2', 'Renting apartment' => '1', 'Live with relatives/friends' => '0');
echo form_dropdown('housing_status',$options) ."</p>";

echo "<p><label for='credit_quality'>Credit Quality</label><br/>";
$options = array('Very good' => '3', 'Normal' => '2', 'Unidentified' => '1', 'Bad' => '0');
echo form_dropdown('credit_quality',$options) ."</p>";

echo "<p><label for='work_ex'>Working Experience</label><br/>";
$options = array('More than 1 year' => '1', 'Less than 1 year' => '0');
echo form_dropdown('work_ex',$options) ."</p>";

echo "<p><label for='living_time'>Time of living at present residence</label><br/>";
$options = array('More than 1 year' => '1', 'Less than 1 year' => '0');
echo form_dropdown('living_time',$options) ."</p>";

echo "<p><label for='landline'>Landline</label><br/>";
$options = array('Yes' => '1', 'No' => '0');
echo form_dropdown('landline',$options) ."</p>";

echo "<p><label for='dependants'>Number of dependants</label><br/>";
$options = array('0' => '0', '1' => '1', '2' => '2', '3' => '3', 'More than 3' => '4');
echo form_dropdown('dependants',$options) ."</p>";

echo "<p><label for='accounts'>Opened bank accounts</label><br/>";
$options = array('both saving and current accounts' => '3', 'Only saving account' => '2', 'Only current account' => '1', 'None' => '0');
echo form_dropdown('accounts',$options) ."</p>";

echo "<p><label for='income'>Income per month</label><br/>";
$options = array('' => '', '' => '', '' => '', '' => '');
echo form_dropdown('income',$options) ."</p>";

echo "<p><label for='class'>Class</label><br/>";
$options = array('High' => 'high', 'Medium' => 'medium', 'Low' => 'low');
echo form_dropdown('class',$options) ."</p>";

echo form_submit('submit','create customer');
echo form_close();


?>

<?php $this->load->view('footer_view'); ?>