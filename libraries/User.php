<?php

//User.php

interface User {

// Pre: N/A
// Post: rv == The ID of the User
// public function getID();

//Pre: N/A
//Post: rv == The first name of the User
public function getFirstName();

//Pre: N/A
//Post: rv == The last name of the User
public function getLastName();

//Pre: N/A
//Post: rv == The email of the User
public function getEmail();

//Pre: N/A
//Post: rv == The Username name of the User
public function getUsername();

//Pre: N/A
//Post: rv == The Password of the User
public function getPassword();

//Pre: N/A
//Post: rv == The Classification of the User
public function getClassification();

//Pre: N/A
//Post: rv == The Major of the User
public function getMajor();

//Pre: N/A
//Post: rv == The Rank of the User
public function getRank();

//Pre: N/A
//Post: rv == The School of the User
public function getSchool();

//N/A
//Post: rv == The Access Level of the User
public function getAccessLevel();

}
?>