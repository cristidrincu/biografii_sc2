<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - REPORT <?php echo $report_entity; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/logout","Logout", "");?></li>
                </ul>
  		</div>
	</div>
	<div class="span12 containerTableReport">
	<?php switch($entity_type):
			case 1:
	?>
	<h1 class="successTitle">Ai introdus cu success urmatorul jucator:</h1>
	<table class="table table-condensed">
		<thead>
			<th>Name</th>
			<th>Nickname</th>
			<th>DOB</th>
			<th>Country</th>
			<th>Race</th>
			<th>Team</th>
			<th>Winnings</th>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $player_name; ?></td>
				<td><?php echo $player_nickname; ?></td>
				<td><?php echo $player_dob; ?></td>
				<td><?php echo $player_country; ?></td>
				<td><?php echo $player_race; ?></td>
				<td><?php echo $player_team; ?></td>
				<td><?php echo $player_winnings; ?></td>
			</tr>
		</tbody>
	</table>
    <?php echo anchor('player/prepare_player', 'Introdu un alt jucator', 'title="Introdu un nou jucator"'); ?>
    <?php echo anchor('player/read_player', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
	<?php break; ?>
	<?php 
		case 2:
	?>
	<h1>Ai introdus cu success urmatoarea echipa:</h1>
	<table class="table table-condensed">
		<thead>
			<th>Name</th>
			<th>Country</th>
			<th>Number of players</th>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $team_name; ?></td>
				<td><?php echo $team_country; ?></td>
				<td><?php echo $team_number_of_players; ?></td>
				<td><?php echo $team_founded; ?></td>
				<td><?php echo $team_manager; ?></td>
				<td><?php echo $team_sponsors; ?></td>
			</tr>
		</tbody>
	</table>
    <?php echo anchor('team/prepare_team', 'Introdu o alta echipa', 'title="Introdu o noua echipa"'); ?>
    <?php echo anchor('team/read_team', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
	<?php break; ?>
	<?php 
		case 3: 
	?>
	<h1>Ai introdus cu success urmatorul titlu:</h1>
	<table class="table table-condensed">
		<thead>
			<th>Player</th>
			<th>Title Name</th>
			<th>Title Date</th>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $player_nickname; ?></td>
				<td><?php echo $title_name; ?></td>
				<td><?php echo $title_date; ?></td>
			</tr>
		</tbody>
	</table>
   <?php echo anchor('title/prepare_title', 'Introdu un alt titlu', 'title="Introdu un alt titlu"'); ?>
   <?php echo anchor('title/read_title', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
	<?php break; ?>
	<?php 
		case 4:
	?>
	<h1>Ai introdus cu success urmatorul video:</h1>
	<table class="table table-condensed">
		<thead>
			<th>Player</th>
			<th>Video Title</th>
			<th>Video Link</th>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $player_nickname; ?></td>
				<td><?php echo $video_name; ?></td>
				<td><?php echo anchor($video_link, $video_name); ?></td>
			</tr>
		</tbody>
	</table>
    <?php echo anchor('video/prepare_video', 'Introdu un alt video', 'title="Introdu un alt video"'); ?>
    <?php echo anchor('video/read_video', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
	<?php break; ?>
	<?php endswitch;?>
	</div><!--ends span12-->
</div>
