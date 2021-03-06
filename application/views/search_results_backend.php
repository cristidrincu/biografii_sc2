<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/logout","Logout", "");?></li>
                </ul>
  </div>
</div>
    <div class="span3"><!--container for crud operations for players-->
        <!--section for international players - CRUD ops-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>JUCATORI STRAINI</h4>
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            CRUD operations for PLAYER entity
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("player/prepare_player", "CREATE Player", array("class"=>"btn")); ?>
                            <?php echo anchor("player/read_player", "READ Player", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player entity options-->

                <div class="accordion-group">
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            CRUD operations for TITLE entity
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("title/prepare_title", "CREATE Title", array("class"=>"btn")); ?>
                            <?php echo anchor("title/read_title", "READ Title", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends title entity options-->
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            CRUD operations for VIDEO entity
                        </a>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("video/prepare_video", "CREATE Video", array("class"=>"btn")); ?>
                            <?php echo anchor("video/read_video", "READ Video", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player_videos entity options-->
            </div>
        </div><!--ends CRUD main menu-->


        <!--operations for TEAM entity-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>ECHIPE</h4>
            <div class="accordion" id="accordion4">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapseTeam">
                            CRUD operations for TEAM entity
                        </a>
                    </div>
                    <div id="collapseTeam" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("team/prepare_team", "CREATE Team", array("class"=>"btn")); ?>
                            <?php echo anchor("team/read_team", "READ Team", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div>
            </div><!--ends team entity options-->

        </div><!--ends CRUD main menu for team operations-->
        <?php if($user_role == 'admin'): ?>
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>USERS</h4>
            <div class="accordion" id="accordion4">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapseTeam">
                            CRUD operations for USERS
                        </a>
                    </div>
                    <div id="collapseTeam" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("user/prepare_create_user", "CREATE User", array("class"=>"btn")); ?>
                            <?php echo anchor("user/read_users", "READ User", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div>
            </div><!--ends team entity options-->
        </div><!--ends CRUD main menu for team operations-->
        <?php endif; ?>
    </div><!--ends container for CRUD menus-->
    <div class='span9 reportsOperationsArea'>
    	<table class="table table-striped">
            <?php switch($entity_type):
                    case 1:
            ?>
            <div class="input-append">
                <?php
                    $form_attributes = array('class'=>'form-search formSimpleJucator');
                    $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                    $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Cauta jucator');

                    echo form_open('search/get_player_backend', $form_attributes);
                    echo form_input($input_field_attributes);
                    echo form_button($submit_btn_attributes);
                    echo form_close();
                ?>
            </div>
    		<thead>
    			<th>Nickname</th>
    			<th>Name</th>
    			<th>DOB</th>
    			<th>Country</th>
    			<th>Race</th>
    			<th>Team</th>
    			<th>Winnings</th>
                <th>Update</th>
                <th>Delete</th>
    		</thead>
    		<tbody>
    			<?php foreach($player_entity as $player): ?>
	    			<tr>
	    				<td><?php echo $player->nickname; ?></td>
	    				<td><?php echo $player->name; ?></td>
	    				<td><?php echo $player->DOB; ?></td>
	    				<td><?php echo $player->country; ?></td>
	    				<td><?php echo $player->race; ?></td>
	    				<td><?php echo $player->team; ?></td>
	    				<td><?php echo $player->winnings; ?></td>
                        <td><?php echo anchor('player/prepare_update_player/'.$player->player_ID, 'Update', array("class"=>"btn btn-primary")); ?></td>
                        <td><?php echo anchor('player/prepare_delete_player/'.$player->player_ID, 'Delete', array("class"=>"btn btn-danger")); ?></td>
	    			</tr>
    			<?php endforeach; ?>
    		</tbody>
            <?php break; ?>
            <?php case 2: ?>
                <div class="input-append">
                    <?php
                    $form_attributes = array('class'=>'form-search formSimpleJucator');
                    $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                    $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Cauta echipa');

                    echo form_open('search/get_team_backend', $form_attributes);
                    echo form_input($input_field_attributes);
                    echo form_button($submit_btn_attributes);
                    echo form_close();
                    ?>
                </div>
                <thead>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Jucatori</th>
                    <th>Fondata in</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
            <tbody>
                <?php foreach($team_entity as $team): ?>
                    <tr>
                        <td><?php echo $team->team_name; ?></td>
                        <td><?php echo $team->team_country; ?></td>
                        <td><?php echo $team->number_of_players; ?></td>
                        <td><?php echo $team->team_found_date; ?></td>
                        <td><?php echo anchor('team/prepare_update_team/'.$team->ID, 'Update', array("class"=>"btn btn-primary")); ?></td>
                        <td><?php echo anchor('team/prepare_delete_team/'.$team->ID, 'Delete', array("class"=>"btn btn-danger")); ?></td>
                    </tr>
            </tbody>
                <?php endforeach; ?>
            <?php break; ?>
            <?php case 3: ?>
                <div class="input-append">
                    <?php
                    $form_attributes = array('class'=>'form-search formSimpleJucator');
                    $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                    $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Cauta titlu');

                    echo form_open('search/get_title_backend', $form_attributes);
                    echo form_input($input_field_attributes);
                    echo form_button($submit_btn_attributes);
                    echo form_close();
                    ?>
                </div>
                <thead>
                    <th>Nickname</th>
                    <th>Title name</th>
                    <th>Title date</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
            <tbody>
                <?php foreach($title_entity as $title): ?>
                <tr>
                    <td><?php echo $title->nickname; ?></td>
                    <td><?php echo $title->title_name; ?></td>
                    <td><?php echo $title->title_date; ?></td>
                    <td><?php echo anchor('title/prepare_update_title/'.$title->ID, 'Update', array("class"=>"btn btn-primary")); ?></td>
                    <td><?php echo anchor('title/prepare_delete_title/'.$title->ID, 'Delete', array("class"=>"btn btn-danger")); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <?php break; ?>
            <?php case 4: ?>
                <div class="input-append">
                    <?php
                    $form_attributes = array('class'=>'form-search formSimpleJucator');
                    $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                    $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Cauta video');

                    echo form_open('search/get_video_backend', $form_attributes);
                    echo form_input($input_field_attributes);
                    echo form_button($submit_btn_attributes);
                    echo form_close();
                    ?>
                </div>
                <thead>
                    <th>Name</th>
                    <th>Video Title</th>
                    <th>Video Link</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php foreach($video_entity as $video): ?>
                        <tr>
                            <td><?php echo $video->nickname; ?></td>
                            <td><?php echo $video->video_title; ?></td>
                            <td><?php echo anchor($video->video_link, $video->video_title); ?></td>
                            <td><?php echo anchor('video/prepare_update_video/'.$video->video_id, 'Update', array("class"=>"btn btn-primary")); ?></td>
                            <td><?php echo anchor('video/prepare_delete_video/'.$video->video_id, 'Delete', array("class"=>"btn btn-danger")); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php break; ?>
            <?php endswitch; ?>
    	</table>
    </div><!--ends section data-->
</div><!--ends main container-->
</div>