<h1><?php echo $title;?></h1>
<p><?php echo anchor("admin/customers/create", "Create new customer");?>
<?php
if ($this->session->flashdata('message')){
	echo "<div class='message'>".$this->session->flashdata('message')."</div>";
}

if (count($customers)){
	echo "<table border='1' cellspacing='0' cellpadding='3' width='400'>\n";
	echo "<tr valign='top'>\n";
	echo "<th>ID</th>\n<th>Name</th><th>Class</th><th>Actions</th>\n";
	echo "</tr>\n";
	foreach ($admins as $key => $list){
		echo "<tr valign='top'>\n";
		echo "<td>".$list['id']."</td>\n";
		echo "<td>".$list['name']."</td>\n";
		echo "<td align='center'>".$list['class']."</td>\n";
		echo "<td align='center'>";
		echo anchor('admin/customers/edit/'.$list['id'],'edit');
		echo " | ";
		echo anchor('admin/customers/delete/'.$list['id'],'delete');
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>";
}
?>