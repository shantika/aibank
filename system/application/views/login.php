<?php $this->load->view('header_view'); ?>
<div class="post">
    <h2 class="title">Please login to Access the Dashboard</h2>
    <p class="meta"><small>Enter your personal details</small></p>
</div>
<div id="form"> 
<?php
    echo form_open("home/index");
    echo "<p>";
    echo form_label("Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","u");
    $udata = array('name'=>'username','id'=>'u','size'=>15);
    echo form_input($udata) . "</p>";
    echo "<br />";                                 
    echo form_label("Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","p");
    $pdata = array('name'=>'password','id'=>'p','size'=>15);
    echo form_password($pdata) . "</p>";
                                     
    echo form_submit('submit','login');
    echo form_close();
?>
</div>
<?php $this->load->view('footer_view'); ?>