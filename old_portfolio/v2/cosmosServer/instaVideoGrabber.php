<?php


function get_fresh_link($post_link)
{
	while(!($vid_html=file_get_contents($post_link.'/embed/captioned'))) {};

	$cleaned = explode('"',substr($vid_html,strpos($vid_html,".mp4")-150,350));

	$videoLink="";
	foreach($cleaned as $link)
	{
		if(strpos($link,".mp4")>0)
			$videoLink=str_replace("\u0026","&",$link);
	}

	return $videoLink;

}

?>
