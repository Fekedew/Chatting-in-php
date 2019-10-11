<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "owas";
  
  $selected_username = $_COOKIE["user_first_name"];
  $users_last_name = $_COOKIE["users_last_name"];

  $connection_String = mysqli_connect($host,$user,$pass,$database);

  $command_query = "SELECT * FROM tbl_login WHERE First_Name = '$selected_username' AND Middle_Name = '$users_last_name'";

  $execute_command_query = mysqli_query($connection_String,$command_query);

  while($row = mysqli_fetch_assoc($execute_command_query)){

    if($row["Profile_Picture"]==""){
        echo "<img class='my_profile_pic' src='Profile_Pictures/default.png' title='Click to change profile picture'/>";
    }else{
        $picture_holder = $row["Profile_Picture"];
        echo "<img class='my_profile_pic' src='Profile_Pictures/$picture_holder' title='Click to change profile picture'/>";
    }
  }

  mysqli_close($connection_String);


?>
