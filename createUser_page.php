<div class = 'page-header'>
	<form method ='post'>
		<h4> Create User
			<button type = "submit" class = 'btn btn-default' formaction = "/codeigniter/3339/index.php/login/logout">
				Logout
			</button>
		</h4>
	</form>
</div>

<form class="form-horizontal">


	<div class="form-group">
		<label for="deptName">User Type</label>
		<div class="col-xs-4">
			<select name="userType" class="form-control">
			<option>Student</option>
        	<option>Instructor</option>
        	<option>Registrar</option>
      		</select>
      	</div>
    </div>
    
    <br/>
    <br/>
	<br/>
   
if(isset($levelSelected))
{

	<div class="form-group">
    	<label for="courseName" class="col-sm-2 control-label">First Name</label>
    	<div class="col-xs-2">
      		<input type="text" class="form-control" name="firstName" placeholder="">
    	</div>
  	</div>
   
   <br/>
   <br/>
   <br/>

	<div class="form-group">
    	<label for="courseNum" class="col-sm-2 control-label">Last Name</label>
    	<div class="col-xs-2">
      		<input type="text" class="form-control" name="lastName" placeholder="">
    	</div>
  	</div>
  	<br/>
  	<br/>
  	<br/>
  	
  	<div class="form-group">
    	<label for="courseNum" class="col-sm-2 control-label">Email</label>
    	<div class="col-xs-2">
      		<input type="text" class="form-control" name="email" placeholder="">
    	</div>
  	</div>
  
  <br/>
  <br/>
  <br/>
  
  if($levelSelected == 10)
  {
  

    <div class="form-group">
    	<label for="majorSelect" class="col-sm-2 control-label">Major</label>
    	<div class="col-xs-2">
    		<select name="majorSelect" class="form-control">
    		<?php echo"<option value = '0' selected = 'selected' >Select Major</option>";
    		foreach($allMajors as $major)
    		{
    			echo "<option value = '".$major['major_id']."'>". $major['major_string']."</option>";
    		}
    		?>
        
      		</select>
      	</div>
    </div>
    
    <br/>
    <br/>
    <br/>
    
 
    <div class="form-group">
    	<label for="classSelect" class="col-sm-2 control-label">Classification</label>
    	<div class="col-xs-2">
    		<select id="class" class="form-control">
        	<?php echo"<option value = '0' selected = 'selected' >Select Class</option>";
    		foreach($allClasses as $class)
    		{
    			echo "<option value = '".$class['class_id']."'>". $class['class_string']."</option>";
    		}
    		?>
      		</select>
      	</div>
    </div>
 <br/>
 <br/>
 <br/>
    }
    
    if($levelSelected == 20)
    {
   
  <div class="form-group">
    	<label for="rankSelect" class="col-sm-2 control-label">Rank</label>
    	<div class="col-xs-2">
    		<select name="rankSelect" class="form-control">
        	<?php echo"<option value = '0' selected = 'selected' >Select Rank</option>";
    		foreach($allRanks as $rank)
    		{
    			echo "<option value = '".$rank['rank_id']."'>". $rank['rank_string']."</option>";
    		}
    		?>
      		</select>
      	</div>
    </div>
    
<br/>
<br/>
<br/>

  <div class="form-group">
    	<label for="schoolSelect" class="col-sm-2 control-label">School</label>
    	<div class="col-xs-2">
    		<select name="schoolSelect" class="form-control">
        	<?php echo"<option value = '0' selected = 'selected' >Select School</option>";
    		foreach($allSchools as $school)
    		{
    			echo "<option value = '".$school['school_id']."'>". $school['school_string']."</option>";
    		}
    		?>
      		</select>
      	</div>
    </div>
    
    <br/>
    <br/>
    <br/>
    }
}


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-default">Submit</button>
    	</div>
  	</div>
</form>