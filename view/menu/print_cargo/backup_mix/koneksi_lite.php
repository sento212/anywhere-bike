<?php

$host_lite	= "localhost";
$user_lite	= "prog-x";
$pass_lite	= "N@tiv3_pr0g_x";
$db_lite	  = "epolis";
$conn       = mysqli_connect($host_lite,$user_lite,$pass_lite, $db_lite);

$host_litea	= "localhost";
$user_litea	= "prog-x";
$pass_litea	= "N@tiv3_pr0g_x";
$db_litea	  = "epolis";
$conn_PDO   = new PDO('mysql:host=localhost;dbname=epolis', $user_litea, $pass_litea );


$host_lite	= "localhost";
$user_lite	= "entry";
$pass_lite	= "3ntry-p0l!s_kuuuu";
$db_lite	  = "entry_polis";
$login_db_lite = mysqli_connect($host_lite,$user_lite,$pass_lite,$db_lite);

// $host_react	     = "localhost";
// $user_react	     = "entry";
// $pass_react	     = "3ntry-p0l!s_kuuuu";
// $db_react	       = "react_native";
// $login_db_react  = mysqli_connect($host_react,$user_react,$pass_react,$db_react);


// $host_araksa 		 = "localhost";
// $user_araksa 		 = "araksa_root";
// $pass_araksa 		 = "raksa2282$@";
// $db_araksa   		 = "araksa_visitor";
// $login_db_araksa = mysqli_connect($host_araksa,$user_araksa,$pass_araksa,$db_araksa);


// $host_sur_digi	    = "localhost";
// $user_sur_digi	    = "entry";
// $pass_sur_digi      = "3ntry-p0l!s_kuuuu";
// $db_sur_digi        = "survey_digital";
// $login_db_sur_digi  = mysqli_connect($host_sur_digi,$user_sur_digi,$pass_sur_digi,$db_sur_digi);

?>
