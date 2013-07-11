<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>index.php/home/index">ADMINISTRATION AREA - <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("index.php/home/logout","Logout", "");?></li>
                </ul>
  </div>
</div>
    <div class='span6 CRUDMainMenu'>
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    CRUD operations for PLAYER entity
                  </a>
                </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/home/prepare_player", "CREATE Player", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/home/read_player", "READ Player", array("class"=>"btn")); ?>
                            <button class='btn'>UPDATE Player</button>
                            <button class='btn'>DELETE Player</button>
                        </div>
                    </div>
            </div><!--ends player entity options-->
            <div class="accordion-group">
                <div class="accordion-heading">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        CRUD operations for TEAM entity
                      </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/home/prepare_team", "CREATE Team", array("class"=>"btn")); ?>
                        <button class='btn'>READ Team</button>
                        <button class='btn'>UPDATE Team</button>
                        <button class='btn'>DELETE Team</button>
                    </div>
                </div>
            </div><!--ends team entity options-->
            <div class="accordion-group">
                <div class='accordion-heading'>
                    <a class='accordion-toggle' data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                        CRUD operations for TITLE entity
                    </a> 
                </div>
                <div id="collapseThree" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/home/prepare_title", "CREATE Title", array("class"=>"btn")); ?>
                        <button class='btn'>READ Title</button>
                        <button class='btn'>UPDATE Title</button>
                        <button class='btn'>DELETE Title</button>
                    </div>
                </div>
            </div><!--ends title entity options-->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                        CRUD operations for PLAYER VIDEO entity
                    </a>
                </div>
                <div id="collapseFour" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/home/prepare_video", "CREATE Video", array("class"=>"btn")); ?>
                        <button class='btn'>READ Video</button>
                        <button class='btn'>UPDATE Video</button>
                        <button class='btn'>DELETE Video</button>
                    </div>
                </div>
            </div><!--ends player_videos entity options-->
        </div>
    </div><!--ends CRUD main menu-->
    <div class='span6 reportsOperationsArea'>
    	<table class="table table-striped">
    		<thead>
    			<th>Nickname</th>
    			<th>Name</th>
    			<th>DOB</th>
    			<th>Country</th>
    			<th>Race</th>
    			<th>Team</th>
    			<th>Winnings</th>
    		</thead>
    		<tbody>
    			<?php foreach($player_details as $player): ?>
	    			<tr>
	    				<td><?php echo $player->nickname; ?></td>
	    				<td><?php echo $player->name; ?></td>
	    				<td><?php echo $player->DOB; ?></td>
	    				<td><?php echo $player->country; ?></td>
	    				<td><?php echo $player->race; ?></td>
	    				<td><?php echo $player->team; ?></td>
	    				<td><?php echo $player->winnings; ?></td>
	    			</tr>
    			<?php endforeach; ?>
    		</tbody>
    	</table>
    </div><!--ends section data-->
</div><!--ends main container-->