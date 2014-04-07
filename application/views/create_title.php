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

    </div><!--ends container for CRUD menus-->
    <div class='span12 reportsOperationsArea'>
        <div class='span12'>
            <?php
              $form_attributes = array('class'=>'form-horizontal');

              $drop_down_title=array();
              foreach($players as $player){
                $drop_down_title[$player->nickname]=$player->nickname;
              }

              $drop_down_id='id="selectPlayer"';

              $input_field_name=array('name'=>'title_name','id'=>'titleName','class'=>'input-large', 'required' => 'required');
              $input_field_date=array('name'=>'title_date','id'=>'titleDate','class'=>'input-large', 'required' => 'required');
              
              

              $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn btn-success', 'type'=>'submit','content'=>'Creeaza Titlu');
            ?>

        <?php
            echo form_open('title/create_title', $form_attributes);
        ?>
            <div class="formBreaker span5">
                <div class="control-group">
                    <label class="control-label" for="teamName">Nume titlu</label>
                    <div class="controls">
                        <?php echo form_input($input_field_name); ?>
                    </div>
                </div>
            </div>

            <div class="formBreaker span5">
                <div class="control-group">
                    <label class="control-label" for="teamCountry">Data obtinerii</label>
                    <div class="controls">
                        <?php echo form_input($input_field_date); ?>
                    </div>
                </div>
            </div>


            <div class="formBreaker span5">
                <div class="control-group">
                    <label class="control-label" for="selectPlayer">Jucator</label>
                    <div class="controls">
                        <?php echo form_dropdown('player_nickname',$drop_down_title,'', $drop_down_id); ?>
                    </div>
                </div>
            </div>

            <div class="formBreaker span12">
                <div class="control-group">
                    <div class="controls">
                        <?php echo form_button($submit_btn_attributes);  ?>
                    </div>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div><!--ends form insert new title-->
    </div><!--ends section data-->
    <br class="clearFloats"/>
</div><!--ends main container-->