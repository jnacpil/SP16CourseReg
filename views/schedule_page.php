<div class='page-header'>
	<form method='post'>
		<h4> Student Homepage 
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/search/init"> 
			Search Courses
		</button>
		
		<!--<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/"> 
			Search Course Catalog
		</button>-->
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/login/logout"> 
			Log out
		</button>
	
		</h4>
	</form>
</div>	
	
	<div class = 'form-group'>
		<h4> Student ID:
		<?php echo $userInfo['user_id']; ?>
		</h4>
	</div>
		
	<div class = 'form-group'>
		<h4> Student Name: 
		<?php echo $userInfo['user_firstName']; ?>
		<?php echo $userInfo['user_lastName']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4>Classification:
		<?php echo $userInfo['class_string']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4>Major:
		<?php echo $userInfo['major_string']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4>Email:
		<?php echo $userInfo['user_email']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4>Test Cases</h4>
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/schedule/testing">
		Testing
		</button>
	</div>
	
</br>
</br>
</br>
</br>
</br>

<div class='well'>  
	   <h4> <?php echo $courseInfo[0]['tp_name']." ".$courseInfo[0]['tp_year'];?> Courses </h4>
	
<table class='table table-hover-condensed'>
		<thead>
			<tr>
				<th>Course</th>
				<th>Course Name</th>
				<th>Instructor</th>
				<th>Days</th>
				<th>Time</th>
				<th>Drop</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($courseInfo as $course)
				{
					echo "<tr>";
						echo "<td>".$course['dept_name']." ".$course['course_number']."</td>"."\n";
						echo "<td>".$course['course_name']."</td>"."\n";
						
						
						echo "<td>".$course['user_lastName']."</td>"."\n";
						echo "<td>".$course['ts_daysOfWeek']."</td>"."\n";
						echo "<td>".$course['ts_timeStart']." - ".$course['ts_timeEnd']."</td>"."\n";
						
						echo "<td>"."\n";
							echo "<form method='post'>"."\n";
							//echo "<input type='hidden' name='edit' value='".$row['Name']."'>"."\n";
							echo "<button type='submit' class='btn btn-danger'"."\n";
							echo " formaction=''>"."\n";
							echo "<i class='fa fa-trash' aria-hidden='true'></i>"."\n";  
							echo "</button>"."\n";
							echo "</form>";
					echo "</tr>";
				}
				?>
		</tbody>
</table>
</div>
<div class='well'>  
	   <h4> Next Semester's Courses </h4>
	
<table class='table table-hover-condensed'>
		<thead>
			<tr>
				<th>Course</th>
				<th>Course Name</th>
				<th>Capacity</th>
				<th>Registered</th>
				<th>Instructor</th>
				<th>Time</th>
				<th>Days</th>
			</tr>
		</thead>
</table>
</div>