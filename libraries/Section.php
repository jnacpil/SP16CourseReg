<?php

interface Section {

//pre: N/A
//post: rv == section ID
public function getSectionID();

//pre: N/A
//post: rv == section number
public function getSectionNumber();

//pre: N/A
//post: rv == time period ID
public function getTpID();

//pre: N/A
//post: rv == time slot ID
public function getTsID();

//pre: N/A
//post: rv == professor ID
public function getProfID();

//pre: N/A
//post: rv == course ID
public function getCourseID();

//pre: N/A
//post: rv == name of course
public function getCourseName();

//pre: N/A
//post: rv == number of course
public function getCourseNumber();

//pre: N/A
//post: rv == description of course
public function getCourseDescription();

//pre: N/A
//post: rv == course department
public function getCourseDepartment();

//pre: N/A
//post: school of course
public function getCourseSchool();

}

?>
