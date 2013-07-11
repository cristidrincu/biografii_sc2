<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
 
<head>    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Starcraft2 Vidcasts - ADMIN AREA</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css"/>
        <link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css"/>
</head>
<body>
	<div class="row-fluid">
		<div class="span12">
			<div class="navbar">
				  <div class="navbar-inner">
				    <a class="brand" href="#">ADMIN LOGIN AREA SCREEN</a>
				  </div>
			</div>
		</div>
	</div>
<div class='mainContainerLoginForm'>
    <div class='row'>
    	<div class='span12 formContainer'>
		    	
		        <form class="form-horizontal loginForm" action='<?php echo base_url();?>index.php/login/process' method='post' name='process'>
		        	<div class="control-group">
		        		<label class="control-label" for='username'>Username</label>
		        		<div class="controls">
		        			<input type='text' name='username' id='username' size='25' />
		        		</div>	
		        	</div>
		            <div class="control-group">
		            	<label class="control-label" for='password'>Password</label>
		            	<div class="controls">
		            		<input type='password' name='password' id='password' size='25' />
		            	</div>
		            </div>
		            <div class="control-group">
		            	<div class="controls">
		            		<button type='Submit' class='btn'/>Sign in</button>
		            	</div>
		            </div>            
		        </form>
    	</div>
   </div>
</div>
</body>
</html>