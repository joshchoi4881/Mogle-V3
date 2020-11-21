<?php
	include("../classes/Database.php");
    $email = $_POST["email"];
    $features = $_POST["features"];
    $platforms = $_POST["platforms"];
    $location = $_POST["location"];
    $newsletter = 0;
    $analytics = 0;
    $scheduler = 0;
    $Uber = 0;
    $Lyft = 0;
    $Uber_Eats = 0;
    $Postmates = 0;
    $DoorDash = 0;
    $Grubhub = 0;
    $Instacart = 0;
    $Shipt = 0;
    $other = "";
    $city = $location[0];
    $state = $location[1];
    if($features[0] == "true") {
        $newsletter = 1;
    }
    if($features[1] == "true") {
        $analytics = 1;
    }
    if($features[2] == "true") {
        $scheduler = 1;
    }
    if($platforms[0] == "true") {
        $Uber = 1;
    }
    if($platforms[1] == "true") {
        $Lyft = 1;
    }
    if($platforms[2] == "true") {
        $Uber_Eats = 1;
    }
    if($platforms[3] == "true") {
        $Postmates = 1;
    }
    if($platforms[4] == "true") {
        $DoorDash = 1;
    }
    if($platforms[5] == "true") {
        $Grubhub = 1;
    }
    if($platforms[6] == "true") {
        $Instacart = 1;
    }
    if($platforms[7] == "true") {
        $Shipt = 1;
    }
    if($platforms[8] != "") {
        $other = $platforms[8];
    } else {
        $other = "None";
    }
    if(!Database::query("SELECT email FROM waitlist WHERE email=:email", array(":email"=>$email))) {
        Database::query("INSERT INTO waitlist VALUES (:id, :email, :newsletter, :analytics, :scheduler, :Uber, :Lyft, :Uber_Eats, :Postmates, :DoorDash, :Grubhub, :Instacart, :Shipt, :other, :city, :state_)", array(":id"=>null, ":email"=>$email, ":newsletter"=>$newsletter, ":analytics"=>$analytics, ":scheduler"=>$scheduler, ":Uber"=>$Uber, ":Lyft"=>$Lyft, ":Uber_Eats"=>$Uber_Eats, ":Postmates"=>$Postmates, ":DoorDash"=>$DoorDash, ":Grubhub"=>$Grubhub, ":Instacart"=>$Instacart, ":Shipt"=>$Shipt, ":other"=>$other, ":city"=>$city, ":state_"=>$state));
        echo "Successfully added to the waitlist!";
    } else {
        echo "You're already in the waitlist!";
    }
?>