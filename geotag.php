<?php
include 'core/functions.php';
//image file path
$imageURL = "images/tes.jpg";

//get location of image
$imgLocation = get_image_location($imageURL);

//latitude & longitude
$imgLat = $imgLocation['latitude'];
$imgLng = $imgLocation['longitude'];
?>