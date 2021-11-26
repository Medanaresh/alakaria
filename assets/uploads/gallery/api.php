<?php 

	$video_path = $_REQUEST['video_path'];
	$name = $_REQUEST['name'];

	if($video_path)
	{
		$ffmpeg     = '/usr/bin/ffmpeg' ;
		$video_file = $video_path;
		$imagefile  = $name;
		$size       = "720x500" ;
		$second     = 3 ;
		$cmd        = "$ffmpeg -i $video_file -an -ss $second -s $size $imagefile" ;

		if(!shell_exec($cmd))
		{
			return $imagefile;
		}
		else
		{
			return 0;
		}
	}

?>