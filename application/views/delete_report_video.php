<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/do_logout","Logout", "");?></li>
                </ul>
  		</div>
	</div>
	<div class='alert alert-error'>Esti sigur ca doresti sa stergi acest video?</div>
	<h4>Detalii titlu</h4>
	<ul>
	<?php
		foreach($video_details as $video):	
	?>
	<li>Titlu: <?php echo $video->video_title; ?></li>
	<li>Link: <?php echo $video->video_link; ?></li>

	<?php endforeach; ?>
	</ul>

	<?php echo anchor('video/delete_video/'.$video->video_id, 'Sterge', array('class'=>'btn')); ?>
	<?php echo anchor('video/read_video', 'Inapoi', array('class'=>'btn')); ?>
</div><!--ends row-fluid mainCotentContainer-->