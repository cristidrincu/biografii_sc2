<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>index.php/home/index">ADMINISTRATION AREA</a>
            <ul class="nav pull-right">
                <li class='username'>Bine ai venit, <?php echo $username; ?> </li>
                <li><?php echo anchor("index.php/home/logout","Logout", "");?></li>
            </ul>
        </div>
    </div>
    <div class='span7 currentValuesEntity'>
        <h4 style='padding-bottom:20px;'>Informatiile prezente in baza de date pentru resursa <?php echo $requested_resource[0]->resource_name ?></h4>
        <div class="alert alert-error">
            <p>ATENTIE! In cazul modificarii echipei, fi sigur ca acea echipa exista in baza de date. Daca nu, atunci te rugam sa folosesti optiunea de CREATE TEAM pentru a introduce noua echipa</p>
        </div>
        <div class='span3'>
            <h4 style="padding-bottom:15px;">Alte informatii</h4>
            <ul>
                <?php foreach($requested_resource as $resource): ?>
                <li>Nume: <?php echo $resource->resource_name; ?></li>
                <li>Link: <?php echo $resource->resource_link; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class='span4 offset1 formUpdateValuesEntity'>
        <!--form populated with current entity information goes here-->

        <h4 style='padding-bottom:35px; text-align:center'>Formular modificare informatii resursa</h4>
        <?php
        $form_attributes=array('class'=>'form-horizontal');
        $input_field_current_name=array('name'=>'resource_name','id'=>'currentResourceName','class'=>'input-large', "readonly"=>"readonly", 'value'=>$requested_resource[0]->resource_name);
        $input_field_current_link=array('name'=>"resource_link",'id'=>'currentResourceLink','class'=>'input-large', "readonly"=>"readonly", 'value'=>$requested_resource[0]->resource_link);
        $input_field_current_player=array("name"=>"resource_player_name", "id"=>"currentResourcePlayer", "class" => "input_large", "readonly" => "readonly", "value"=>$requested_resource_player[0]->requested_player_nickname);
        $input_field_new_name=array("name"=>"new_resource_name", "class"=>"input-large");
        $input_field_new_link=array("name"=>"new_resource_link", "class"=>"input-large");

        $drop_down_other_players = array();
        $drop_down_other_players["please select"]="please select";
        $drop_down_id = 'id="selectOtherPlayer"';
        foreach($requested_other_players as $other_player){
            $drop_down_other_players[$other_player->requested_player_nickname] = $other_player->requested_player_nickname;
        }

        $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update requested resource');
        ?>

        <?php
        echo form_open('index.php/resources_requested_player/update_requested_resource/'. $requested_resource[0]->resource_id, $form_attributes);
        ?>
        <div class="control-group">
            <label class="control-label" for="resourceCurrentName">Current Name</label>
            <div class="controls">
                <?php echo form_input($input_field_current_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="resourceNewName">New Name</label>
            <div class="controls">
                <?php echo form_input($input_field_new_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="resourceCurrentLink">Current Link</label>
            <div class="controls">
                <?php echo form_input($input_field_current_link); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="resourceNewLink">New Link:</label>
            <div class="controls">
                <?php echo form_input($input_field_new_link); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="resourceCurrentPlayer">Current player:</label>
            <div class="controls">
                <?php echo form_input($input_field_current_player); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="resourceSelectAnotherPlayer">Choose Another Player: </label>
            <div class="controls">
                <?php echo form_dropdown('other_player',$drop_down_other_players,"please select", $drop_down_id); ?>
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