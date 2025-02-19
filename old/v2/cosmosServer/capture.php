<?php

include "headerAllow.php";
include "cred.php";
include "instaVideoGrabber.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}

$post_data = file_get_contents('php://input');

$data=json_decode($post_data);

if($data->choice=="instagram_single")
{
	while(!($insta_details=file_get_contents('https://api.instagram.com/oembed?url='.$data->link))){};
	$details=json_decode($insta_details);

	$img_domain="https://www.padmeshkunwar.me/cosmosServer/";
	$img_link="images/".base64_encode(date("d-m-y-H:i:s")).".jpg";
	$img = file_get_contents($details->thumbnail_url);
	$fp = fopen($img_link, "w");
	fwrite($fp, $img);
	fclose($fp);

	$sql="INSERT INTO posts (access_key,type,content,post_author,post_link,post_image,post_caption) VALUES ('".$data->accessToken."','instagram_single','','".$details->author_name."','".$data->link."','".$img_domain.$img_link."','".mysqli_real_escape_string($conn,$details->title)."')";


	$result=mysqli_query($conn,$sql);

	$i = (object)array();
	$i->status="aa gya";
	echo json_encode($i);
}

if($data->choice=="instagram_multi")
{
	while(!($insta_details=file_get_contents('https://api.instagram.com/oembed?url='.$data->link))){};
	$details=json_decode($insta_details);

	$linkCleaned=$data->link;

	if(strpos($linkCleaned,"/?igshid")>0)
		$linkCleaned=substr($linkCleaned,0,strpos($linkCleaned,"/?igshid"));
	if($linkCleaned[strlen($linkCleaned)-1]=='/')
		$linkCleaned=substr($linkCleaned,0,strlen($linkCleaned)-1);

	while(!($frame_details=file_get_contents($linkCleaned.'/embed/captioned'))) {};

	$frame_details=str_replace("<head>", "<head><base href=\"https://www.instagram.com\"/>",$frame_details);
	$frame_details=str_replace("<body", "<body style=\"overflow:auto\"",$frame_details);
	$frame_details=str_replace("<div class=\"Header\"","<div class=\"Header\" style=\"display:none\"",$frame_details);
	$frame_details=str_replace("<div class=\"PrimaryCTA\"","<div class=\"PrimaryCTA\" style=\"display:none\"",$frame_details);
	$frame_details=str_replace("<a class=\"HoverCardRoot\"","<a class=\"HoverCardRoot\" style=\"display:none\"",$frame_details);
	$frame_details=str_replace("<div class=\"Feedback\"","<div class=\"Feedback\" style=\"display:none\"",$frame_details);
	$frame_details=str_replace("<div class=\"SocialProof\"","<div class=\"SocialProof\" style=\"display:none\"",$frame_details);
	$frame_details=str_replace("<div class=\"Caption\"","<div class=\"Caption\" style=\"display:none\"",$frame_details);
	$frame_details=str_replace("<div class=\"Footer\"","<div class=\"Footer\" style=\"display:none\"",$frame_details);
	$frame_details=$frame_details."</body></html>";

	$img_domain="https://www.padmeshkunwar.me/cosmosServer/";
	$img_link="assets/".base64_encode(date("d-m-y-H:i:s")).".html";
	$fp = fopen($img_link, "w");
	fwrite($fp, $frame_details);
	fclose($fp);

	$sql="INSERT INTO posts (access_key,type,content,post_author,post_link,post_image,post_caption) VALUES ('".$data->accessToken."','instagram_multi','','".$details->author_name."','".$linkCleaned."','".$img_domain.$img_link."','".mysqli_real_escape_string($conn,$details->title)."')";


	$result=mysqli_query($conn,$sql);

	$i = (object)array();
	$i->status="media aa gya";
	echo json_encode($i);
}


if($data->choice=="instagram_video")
{
	while(!($insta_details=file_get_contents('https://api.instagram.com/oembed?url='.$data->link))){};
	$details=json_decode($insta_details);

	$linkCleaned=$data->link;

	if(strpos($linkCleaned,"/?igshid")>0)
		$linkCleaned=substr($linkCleaned,0,strpos($linkCleaned,"/?igshid"));
	if($linkCleaned[strlen($linkCleaned)-1]=='/')
		$linkCleaned=substr($linkCleaned,0,strlen($linkCleaned)-1);


	$videoLink=get_fresh_link($linkCleaned);

	$sql="INSERT INTO posts (access_key,type,content,post_author,post_link,post_image,post_caption) VALUES ('".$data->accessToken."','instagram_video','','".$details->author_name."','".$linkCleaned."','".$videoLink."','".mysqli_real_escape_string($conn,$details->title)."')";


	$result=mysqli_query($conn,$sql);

	$i = (object)array();
	$i->status="media aa gya";
	echo json_encode($i);
}

if($data->choice=="content")
{
	$sql="INSERT INTO posts (access_key,type,content,post_author,post_link,post_image,post_caption) VALUES ('".$data->accessToken."','content','".$data->content."','','','','')";

	$result=mysqli_query($conn,$sql);

	$i = (object)array();
	$i->status="content aa gya";
	echo json_encode($i);
}


// $i = (object)array();
// $i->status=$data->choice;
// echo json_encode($i);


?>