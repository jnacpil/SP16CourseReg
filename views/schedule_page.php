<div class='page-header'>
	<form method='post'>
		<h4> Student Homepage 
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/"> 
			View Next Semester
		</button>
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/"> 
			Search Current Courses
		</button>
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/"> 
			Search Course Catalog
		</button>
		
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
	
</br>
</br>
</br>
</br>
</br>

<div class='well'>  
	   <h4> Current Semester's Courses </h4>
	
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
		<tbody>
			<?php foreach($courseInfo as $course)
				{
					echo "<tr>";
					echo "<td>".$course['dept_id']." ".$course['course_number']."</td>"."\n";
					echo "<td>".$course['course_name']."</td>"."\n";
					echo "<td>"."</td>"."\n";
					echo "<td>"."</td>"."\n";
					echo "<td>".$course['user_id']."</td>"."\n";
					echo "<td>".$course['ts_id']."</td>"."\n";
					echo "<td>".$course['ts_id']."</td>"."\n";
					echo "</tr>";
				}
				?>
		</tbody>
</table>
</div>
<div class='well'>  
	   <h4> Waitlisted Courses </h4>
	
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