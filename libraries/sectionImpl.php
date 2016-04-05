<?php

class sectionImpl implements Section  {

protected $sectID;
protected $sectNum;
protected $tpID;
protected $tsID;
protected $profID;
protected $courseID;
protected $courseName = "";
protected $courseNumber;
protected $courseDesc = "";
protected $courseDept = "";
protected $courseSchool = "";

public function sectionImpl($theSectID, $theSectNumber, $theTpID, $theTsID, $theProfID, $theCourseID, $theCourseName, $theCourseNumber, $theCourseDescription, $theCourseDepartment, $theCourseSchool)
{
  $this -> sectID = $theSectID;
  $this -> sectNum = $theSectNumber;
  $this -> tpID = $theTpID;
  $this -> tsID = $theTsID;
  $this -> profID = $theProfID;
  $this -> courseID = $theCourseID;
  $this -> courseName = $theCourseName;
  $this -> courseNumber = $theCourseNumber;
  $this -> courseDesc = $theCourseDescription;
  $this -> courseDept = $theCourseDepartment;
  $this -> courseSchool = $theCourseSchool;
}

public function getSectionID()
{
  return $this -> sectID;
}

public function getSectionNumber()
{
  return $this -> sectNum;
}

public function getTpID()
{
  return $this -> tpID;
}

public function getTsID()
{
  return $this -> tsID;
}

public function getProfID()
{
  return $this -> profID;
}

public function getCourseID()
{
  return $this -> courseID;
}

public function getCourseName()
{
  return $this -> courseName;
}

public function getCourseNumber()
{
  return $this -> courseNumber;
}

public function getCourseDescription()
{
  return $this -> courseDesc;
}

public function getCourseDepartment()
{
  return $this -> courseDept;
}

public function getCourseSchool()
{
  return $this -> courseSchool;
}

}

?>
