<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner breakerMainForm">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - CREATE <?php echo $page_title; ?></a>
            <ul class="nav pull-right">
                <li class='username'>Bine ai venit, <?php echo $username; ?> </li>
                <li><?php echo anchor("home/logout","Logout", "");?></li>
            </ul>
        </div>
    </div>
    <div class='span12 reportsOperationsArea'>
        <div class='span12'>
            <?php
            $form_attributes = array('class'=>'form-horizontal');
            $input_field_user_name = array('name' => 'user_name','id' => 'userName','class' => 'input-large', 'required' => 'required');
            $input_field_user_email=array('name'=>'user_email','id'=>'playerNickname','class'=>'input-large', 'required' => 'required');
            $input_field_user_pass=array('name' => 'user_pass', 'id' => 'playerPass', 'class' => 'input-large', 'required' => 'required');

            $drop_down_user_role=array(
                'admin' => 'Administrator',
                'contributor' => 'Contributor'
            );

            $drop_down_id = 'id="selectUserRole"';

            $submit_btn_attributes = array('name'=>'submitBtn','class' => 'btn btn-success', 'type' => 'submit','value' => 'Creeaza User');
            ?>

            <?php
            echo form_open('user/create_user', $form_attributes);
            ?>
            <div class="formBreaker span3">
                <div class="control-group">
                    <label class="control-label" for="userName">Username</label>
                    <div class="controls">
                        <?php echo form_input($input_field_user_name); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="userEmail">User email</label>
                    <div class="controls">
                        <?php echo form_input($input_field_user_email); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="userPass">User pass</label>
                    <div class="controls">
                        <?php echo form_input($input_field_user_pass); ?>
                    </div>
                </div>
            </div>
            <div class="formBreaker span3">
                <div class="control-group">
                    <label class="control-label" for="selectUserRole">User Role</label>
                    <div class="controls">
                        <?php echo form_dropdown('user_role',$drop_down_user_role,'',$drop_down_id); //name = player_team?>
                    </div>
                </div>
            </div>
            <div class="formBreakerSubmit span12">
                <div class="control-group">
                    <div class="controls">
                        <?php echo form_submit($submit_btn_attributes);  ?>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div><!--ends form insert new player-->
    </div><!--ends section data-->
</div>