<body><pre><code>
<?php

$a=file_get_contents("https://www.instagram.com/p/Bz-_dLtoxlw/embed/captioned");
file_put_contents("a.txt",$a);

// $a=str_replace("<head>", "<head><base href=\"https://www.instagram.com\"/>",$a);
// $a=str_replace("<body", "<body style=\"overflow:auto\"",$a);
// $a=str_replace("<div class=\"Header\"","<div class=\"Header\" style=\"display:none\"",$a);
// $a=str_replace("<div class=\"PrimaryCTA\"","<div class=\"PrimaryCTA\" style=\"display:none\"",$a);
// $a=str_replace("<a class=\"HoverCardRoot\"","<a class=\"HoverCardRoot\" style=\"display:none\"",$a);
// $a=str_replace("<div class=\"Feedback\"","<div class=\"Feedback\" style=\"display:none\"",$a);
// $a=str_replace("<div class=\"SocialProof\"","<div class=\"SocialProof\" style=\"display:none\"",$a);
// $a=str_replace("<div class=\"Caption\"","<div class=\"Caption\" style=\"display:none\"",$a);
// $a=str_replace("<div class=\"Footer\"","<div class=\"Footer\" style=\"display:none\"",$a);


// echo $a."</body></html>";




// $styles = $dom->getElementsByTagName('link');

// $links = $dom->getElementsByTagName('a');

// $scripts = $dom->getElementsByTagName('script');

// foreach($styles as $style)
// {

//     if($style->getAttribute('href')!="#")

//     {
//         echo $style->getAttribute('href');
//         echo'<br>';
//     }
// }

// foreach ($links as $link){

//     if($link->getAttribute('href')!="#")
//     {
//         echo $link->getAttribute('href');
//         echo'<br>';
//     }
// }

// foreach($scripts as $script)
// {

//         echo $script->getAttribute('src');
//         echo'<br>';

// }



$cleaned = explode('"',substr($a,strpos($a,".mp4")-150,350));

$videoLink;
foreach($cleaned as $link)
{
	if(strpos($link,".mp4")>0)
		$videoLink=str_replace("\u0026","&",$link);
}

// $fp = fopen("vid.mp4", "w");
// 	fwrite($fp, file_get_contents($videoLink));
// 	fclose($fp);
echo $videoLink;
//copy($videoLink,"vid.mp4");
?>


<video width="480" height="480" controls>
	<source src="<?php echo $videoLink; ?>" type="video/mp4">
	Your browser does not support the video tag.
</video> 
