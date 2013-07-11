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
        <h4>Informatiile prezente in baza de date pentru titlul <?php echo $title_details[0]->title_name ?></h4>
        <div class='span3'>
            <ul>
                <?php foreach($title_details as $title): ?>
                    <li>Nume: <?php echo $title->title_name; ?></li>
                    <li>Data: <?php echo $title->title_date; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class='span5 formUpdateValuesEntity'>
        <!--form populated with current entity information goes here-->

        <h4>Formular modificare informatii titlu</h4>
        <?php
        $form_attributes=array('class'=>'form-horizontal');
        $input_field_name=array('name'=>'title_name','id'=>'titleName','class'=>'input-large', 'value'=>$title_details[0]->title_name);
        $input_field_date=array('name'=>'title_date','id'=>'titleDate','class'=>'input-large', 'value'=>$title_details[0]->title_date);

        $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update title');
        ?>

        <?php
        echo form_open('index.php/title_ro/update_title_ro/'. $title_details[0]->ID, $form_attributes);
        ?>
        <div class="control-group">
            <label class="control-label" for="teamName">Name</label>
            <div class="controls">
                <?php echo form_input($input_field_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="teamCountry">Date</label>
            <div class="controls">
                <?php echo form_input($input_field_date); ?>
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