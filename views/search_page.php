<div class = 'page-header'>
	<form method ='post'>
		<h4> 
			<?php if($userInfo['access_id'] == 10) {
					echo "Search Courses Page";
					echo "<button type = 'submit' class = 'btn btn-default' formaction = '/codeigniter/3339/index.php/schedule/home'>";
					echo "Back";
					echo "</button>";
				}
				else if($userInfo['access_id'] == 30){
					echo "Regisrar Homepage";
					echo "<button type = 'submit' class = 'btn btn-default' formaction = '/codeigniter/3339/index.php/schedule/createCourseForm'>";
					echo "Create Course";
					echo "</button>";
				}
				?>
			<button type="submit" class='btn btn-primary' formaction="/codeigniter/3339/index.php/login/logout"> 
			Log out
		</button>
		</h4>
	</form>
</div>


<div class="form-group">
	<form method='post'>
		<div class="form-group">
    		<label for="searchInput" class="col-sm-2 control-label">Search</label>
			<input type="text" class="form-control" name="searchID" placeholder="Input Search Here">
		</div>
		<div class="form-group">
		<label for="deptName">Search Criteria</label>
		<select name="deptName" class="form-control">
			<option value = '0' selected="selected"> Select Field to Search</option>
			<option value = 'course_name'>Course Name</option>
        	<option value = 'course_number'>Course Number</option>
        	<option value = 'dept_name'>Department Name</option>
        	<option value = 'user_lastName'>Professor Name</option>
      	</select>
		</div>
      	<button type="submit" class="btn btn-default" formaction="/codeigniter/3339/index.php/search/searchResults">Search</button>
	</form>      	
</div>

<?php
	
	if(isset($listOfCourses)) {
		if(count($listOfCourses) == 0) {
			echo "<div class='alert alert-danger'><strong> Search Returned No Results, Please Try Another Keyword </strong>";
		}
		else {
		//echo print_r($listOfCourses);
		echo "<div class='well'>"; 
		echo "<h4>Search Result Courses </h4>";
	
		echo "<table class='table table-hover-condensed'>";
		echo "<thead>";
		echo "<tr>";
		echo "	<th>Course</th>";
		echo "	<th>Course Name</th>";
		//echo "	<th>Description</th>";
		echo "	<th>Instructor</th>";
		echo "	<th>Days</th>";
		echo "	<th>Time</th>";
		echo "	<th>Drop</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		foreach($listOfCourses as $course)
		{
			
			echo "<tr>";
			echo "<td>".$course['dept_name']." ".$course['course_number']."</td>"."\n";
			echo "<td>".$course['course_name']."</td>"."\n";
			//echo "<td>".$course['course_descript']."</td>"."\n";
			echo "<td>".$course['user_firstName']." ".$course['user_lastName']."</td>"."\n";
			echo "<td>".$course['ts_daysOfWeek']."</td>"."\n";
			echo "<td>".$course['ts_timeStart']." - ".$course['ts_timeEnd']."</td>"."\n";
			
			echo "<td>"."\n";
			echo "<form method='post'>"."\n";
			echo "<input type='hidden' name='cour' value='".$course['sect_id']."'>"."\n";
			echo "<input type='hidden' name='use' value='".$userInfo['user_id']."'>"."\n";
			echo "<button type='submit' class='btn btn-info'"."\n";
			echo " formaction='/codeigniter/3339/index.php/schedule/add'>"."\n";
			echo "Add"."\n";  
			echo "</button>"."\n";
			echo "</form>";
			echo "</tr>";
		}		
		echo "</tbody>";
		}
		echo "</table>";
		echo "</div>";
	}
	?>