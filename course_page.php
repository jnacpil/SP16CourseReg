<div class='page-header'>
	<form method='post'>
		<h4> Course Details 
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/search/init"> 
			Home
		</button>
		
		
		<button type="submit" class='btn btn-default' formaction="/codeigniter/3339/index.php/schedule/delete"> 
			Delete Course
		</button>
	
		</h4>
	</form>
</div>	
	
	<div class = 'form-group'>
		<h4> Course: 
		<?php echo $sectionDetails['dept_name']." ".$sectionDetails['course_number']; ?>
		</h4>
	</div>
		
	<div class = 'form-group'>
		<h4> Course Name: 
		<?php echo $sectionDetails['course_name']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4> Instructor: 
		<?php echo $sectionDetails['user_lastName']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4> Course Description: 
		<?php echo $sectionDetails['course_descript']; ?>
		</h4>
	</div>
	
	<div class = 'form-group'>
		<h4> Time Slot:
		<?php echo $sectionDetails['ts_daysOfWeek']." ".$sectionDetails['ts_timeStart']." - ".$sectionDetails['ts_timeEnd']; ?>
		</h4>
	</div>
	<div class = 'form-group'>
		<h4> Semester:
		<?php echo $sectionDetails['tp_name']." ".$sectionDetails['tp_year']; ?>
		</h4>
	</div>
	
</br>
</br>
</br>
</br>
</br>




roster_page.php roster table
	
<div class='well'>  
	  // <h4> <?php echo $Roster[0]['dept_name']." ".$courseRoster[0]['course_number']." ".$courseRoster[0]['course_name'];?> </br>
	   //<?php echo $courseRoster[0]['ts_timeStart']." - ".$courseRoster[0]['ts_timeEnd']."         ".$courseRoster[0]['tp_name']." ".$courseRoster[0]['tp_year'];?></h4>
		<h4><?php echo $courseRoster[0]['course_name'];?></h4>
<table class='table table-hover-condensed'>
		<thead>
			<tr>
				<th>#</th>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Email</th>
				<th>Major</th>
				<th>Classification</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($courseRoster as $student)
				{
					echo "<tr>";
						echo "<td>".$student['user_id']."</td>"."\n";
						echo "<td>".$student['user_firstName']." ".$student['user_lastName']."</td>"."\n";
						echo "<td>".$student['user_email']."</td>"."\n";
						echo "<td>".$student['major_string']."</td>"."\n";
						echo "<td>".$student['class_string']."</td>"."\n";
						
						
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








