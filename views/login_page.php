<div class='page-header'>
	<h4> Login Menu </h4>
</div>

<div class='well'>

<!-- Check for errors returned from controller -->
<?php if(isset($loginError)) { echo $loginError; } ?>
<?php if(isset($logoutPrompt)) { echo $logoutPrompt; } ?>
	
	<form method='post'> 
		<input type='text' name='loginFormUsername' value='<?php if(isset($reloadedUsername)) { echo $reloadedUsername; } ?>' placeholder='Username'/>
		<br />
		<input type='password' name='loginFormPassword' value='' placeholder='Password' />
		<br />
		<br />
		<button type="submit" class='btn btn-primary' formaction="/codeigniter/3339/index.php/login/validateLoginCredentials"> 
			Log In 
		</button>
		<button type="submit" class='btn btn-primary' formaction="/codeigniter/3339/index.php/login/testing">
			Run Test
		</button>
	</form>

</div>