<?php

//UserImpl.php

require_once "User.php"

class UserImpl implements User {

protected $firstName = "";
protected $lastName = "";
protected $email = "";
protected $username = "";
protected $password = "";
protected $major = "";
protected $classification = "";
protected $school = "";
protected $rank = "";
protected $accessLevel;

public function __construct ($theFirstName, $theLastName, $theEmail, $theUsername, $thePassword, $theMajor, $theClassification, $theSchool, $theRank, $theAccessLevel)
{
$this -> firstName = $theFirstName;
$this -> lastName = $theLastName;
$this -> email = $theEmail;
$this -> username = $theUsername;
$this -> password = $thePassword;
$this -> major = $theMajor;
$this -> classification = $theClassification;
$this -> school = $theSchool;
$this -> rank = $theRank;
$this -> accessLevel = $theAccessLevel;
}

//Pre: N/A
//Post: rv == The first name of the User
public function getFirstName()
{
return $this->firstName;
}

//Pre: N/A
//Post: rv == The last name of the User
public function getLastName()
{
return $this->lastName;
}

//Pre: N/A
//Post: rv == The email of the User
public function getEmail()
{
return $this->email;
}

//Pre: N/A
//Post: rv == The Username name of the User
public function getUsername()
{
return $this->username;
}

//Pre: N/A
//Post: rv == The Password of the User
public function getPassword()
{
return $this->password;
}

//Pre: N/A
//Post: rv == The Classification of the User
public function getClassification()
{
return $this->classification;
}

//Pre: N/A
//Post: rv == The Major of the User
public function getMajor()
{
return $this->major;
}

//Pre: N/A
//Post: rv == The Rank of the User
public function getRank()
{
return $this->rank;
}

//Pre: N/A
//Post: rv == The School of the User
public function getSchool()
{
return $this->school;
}

//N/A
//Post: rv == The Access Level of the User
public function getAccessLevel()
{
return $this->accessLevel;
}
?>