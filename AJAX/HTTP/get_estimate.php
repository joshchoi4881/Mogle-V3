<?php
    require "../../vendor/autoload.php";
    require "../../config.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, "../../.env");
    $dotenv->load();
    $location = $_POST["location"];
    $platform = $_POST["platform"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $url = "http://".$_ENV["SERVER_IP"].":".$flaskPort."/get_estimate";
    $data = json_encode(array("location"=>$location, "platform"=>$platform, "start_date"=>$start_date, "end_date"=>$end_date));
    $CURL = curl_init();
    curl_setopt($CURL, CURLOPT_URL, $url);
    curl_setopt($CURL, CURLOPT_POST, true);
    curl_setopt($CURL, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
    curl_setopt($CURL, CURLOPT_POSTFIELDS, $data);
    curl_setopt($CURL, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($CURL, CURLOPT_TIMEOUT, 0);
    curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($CURL, CURLOPT_USERAGENT, "Mogle");
    $result = curl_exec($CURL);
    curl_close($CURL);
    $json = json_decode($result, true);
    echo json_encode($json);
?>