<?php

include "headerAllow.php";
include "relativeTime.php";
include "cred.php";
include "instaVideoGrabber.php";

function remoteFileExists($url) {
    $curl = curl_init($url);

    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);

    //do request
    $result = curl_exec($curl);

    $ret = false;

    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  

        if ($statusCode == 200) {
            $ret = true;   
        }
    }

    curl_close($curl);

    return $ret;
}

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}

$sql="SELECT p.type,p.content,p.post_link,p.post_image,p.post_author,p.post_caption,p.ts,u.username FROM posts AS p INNER JOIN users AS u ON p.access_key=u.access_key ORDER BY p.ts DESC";

$result=mysqli_query($conn,$sql);
$final=array();
if (mysqli_num_rows($result)>0) 
{
	while($row = mysqli_fetch_assoc($result)) 
    {
    	$row["ts"]=time_elapsed_string($row["ts"]);
    	if($row["type"]=="instagram_video")
    	{
    		if(!remoteFileExists($row["post_image"]))
    		{
    			$row["post_image"]=get_fresh_link($row["post_link"]);
    		}
    	}
    	$final[]=$row;
    }
}

echo json_encode($final);
?>
