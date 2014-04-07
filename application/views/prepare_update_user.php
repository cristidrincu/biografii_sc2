<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA</a>
            <ul class="nav pull-right">
                <li class='username'>Bine ai venit, <?php echo $username; ?> </li>
                <li><?php echo anchor("home/logout","Logout", "");?></li>
            </ul>
        </div>
    </div>
    <div class='span12 formUpdateValuesEntity'>
        <!--form populated with current entity information goes here-->

        <h4>Formular modificare informatii utilizator</h4>
        <?php
        $form_attributes = array('class'=>'form-horizontal');
        $input_field_name = array('name'=>'user_name','id'=>'userName','class'=>'input-large', 'value'=>$user_details[0]->user_name);
        $input_field_email = array('name'=>'user_email','id'=>'userEmail','class'=>'input-large', 'value'=>$user_details[0]->user_email);
        $input_field_password = array('name' => 'user_password', 'id' => 'userPassword', 'class'=>'input-large');
        $input_field_confirm_password = array('name' => 'confirm_user_password', 'id' => 'confirmUserPassword', 'class'=>'input-large');

        $drop_down_user_role=array(
            'contributor' => 'Contributor'
        );

        $drop_down_id = 'id="selectUserRole"';

        $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update user');
        ?>

        <?php
        echo form_open('user/update_user/'. $user_details[0]->user_id, $form_attributes);
        ?>
        <div class="control-group">
            <label class="control-label" for="userName">Nume</label>
            <div class="controls">
                <?php echo form_input($input_field_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="userEmail">Adresa Email</label>
            <div class="controls">
                <?php echo form_input($input_field_email); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="newPassword">Parola noua</label>
            <div class="controls">
                <?php echo form_input($input_field_password); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="teamCountry">Rescrie parola noua</label>
            <div class="controls">
                <?php echo form_input($input_field_confirm_password); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="userRole">User role</label>
               <div class="controls">
                   <?php echo form_dropdown('user_role', $drop_down_user_role, '', $drop_down_id); //name = user_role?>
               </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?php echo form_button($submit_btn_attributes);  ?>
            </div>
        </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>