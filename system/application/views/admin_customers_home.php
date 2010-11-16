<h1><?php echo $title;?></h1>
<p><?php echo anchor("admin/customers/create", "Create new customer");?>
<?php
if ($this->session->flashdata('message')){
	echo "<div class='message'>".$this->session->flashdata('message')."</div>";
}

if (count($customers)){
	echo "<div style=\"height:300px;width:620px;overflow:auto;\">";
	echo "<table border='1' cellspacing='0' cellpadding='3' width='600'>\n";
	echo "<tr valign='top'>\n";
	echo "<th>ID</th>\n<th>Name</th><th>Class</th><th>Status</th><th>Actions</th>\n";
	echo "</tr>\n";
	foreach ($customers as $key => $list){
		if ($list['status'] == 1) $status = 'active'; else $status = 'inactive';
		echo "<tr valign='top'>\n";
		echo "<td>".$list['id']."</td>\n";
		echo "<td>".$list['name']."</td>\n";
		echo "<td align='center'>".$list['class']."</td>\n";
		echo "<td align='center'>".$status."</td>\n";
		echo "<td align='center'>";
		echo anchor('admin/customers/edit/'.$list['id'],'edit');
		echo " | ";
		echo anchor('admin/customers/delete/'.$list['id'],'deactive');
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>";
	echo "</div>";
}
?>