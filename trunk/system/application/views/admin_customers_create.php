<?php $this->load->view('admin_header');?>
<div id='main'>
<h1><?php echo $title;?></h1>

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

echo "<p><label for='job_position'>Job Position</label><br/>";
$options = array('6' => 'Profession/Director/CEO', '5' => 'Manager/Leader','4' => 'Staff','3' => 'Worker','2' => 'Apprentice','1' => 'Student', '0' => 'Others');
echo form_dropdown('job_position',$options) ."</p>";

echo "<p><label for='job_contract_period'>Job Contract Period</label><br/>";
$options = array('5' => 'More than 1 years', '4' => '1 year','3' => '6 months','2' => 'Temporarily','1' => 'Part Time');
echo form_dropdown('job_contract_period',$options) ."</p>";

echo "<p><label for='housing_status'>Housing status</label><br/>";
$options = array('4' => 'Private home more than 100 metre square','3' => 'Private home less than 100 metre square','2' => 'Renting apartment','1' => 'Live with relatives/friends');
echo form_dropdown('housing_status',$options) ."</p>";

echo "<p><label for='resident'>Resident</label><br/>";
$options = array('3' => 'Big City','2' => 'Small City','1' => 'Others');
echo form_dropdown('resident',$options) ."</p>";

echo "<p><label for='vehicle'>Vehicle</label><br/>";
$options = array('3' => 'Car','2' => 'Motorbike','1' => 'Bicycle or social vehicles');
echo form_dropdown('vehicle',$options) ."</p>";

echo "<p><label for='credit_quality'>Credit Quality</label><br/>";
$options = array('4' => 'Very good','3' => 'Medium','2' => 'Not good','1' => 'Poor');
echo form_dropdown('credit_quality',$options) ."</p>";

echo "<p><label for='education_level'>Education Level</label><br/>";
$options = array('5' =>'High school','4' => 'Intermediate','3' => 'College','2' => 'University','1' => 'Post Graduated');
echo form_dropdown('education_level',$options) ."</p>";

echo "<p><label for='work_ex'>Working Experience</label><br/>";
$options = array('1' =>'1 - 2 years','2' => '3 - 5 years','3' => 'above 5 years');
echo form_dropdown('work_ex',$options) ."</p>";

echo "<p><label for='insurance'>Insurance</label><br/>";
$options = array('1' => 'Yes' , '2' => 'No');
echo form_dropdown('insurance',$options) ."</p>";

echo "<p><label for='is_marriage'>Marriage?</label><br/>";
$options = array('1' => 'Yes' , '2' => 'No');
echo form_dropdown('is_marriage',$options) ."</p>";

echo "<p><label for='dependants'>Number of dependants</label><br/>";
$options = array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => 'More than 3');
echo form_dropdown('dependants',$options) ."</p>";

echo "<p><label for='money_owned'>Properties Owned</label><br/>";
$data = array('name'=>'money_owned','id'=>'money_owned','size'=>25);
echo form_input($data) ."</p>";

echo "<p><label for='Income'>Income per month</label><br/>";
$data = array('name'=>'income','id'=>'income','size'=>25);
echo form_input($data) ."</p>";

echo "<p><label for='familiar_income'>Familiar Income per month</label><br/>";
$data = array('name'=>'familiar_income','id'=>'familiar_income','size'=>25);
echo form_input($data) ."</p>";

echo "<p><label for='Outcome'>Outcome per month</label><br/>";
$data = array('name'=>'outcome','id'=>'outcome','size'=>25);
echo form_input($data) ."</p>";

echo "<p><label for='class'>Class</label><br/>";
$options = array('high' => 'High', 'medium' => 'Medium', 'low' => 'Low');
echo form_dropdown('class',$options) ."</p>";

echo form_submit('submit','create customer');
echo form_close();
?>
</div>
<?php $this->load->view('admin_footer');?>