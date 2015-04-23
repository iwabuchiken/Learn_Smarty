<?php
	
	//phpinfo();
	$dir_name = ".";
// 	$dir_name = "../images";	//=> Failed to open
	
	// REF opendir http://phpspot.net/php/pg%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%81%AE%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%83%AA%E3%82%B9%E3%83%88%E3%82%92%E5%8F%96%E5%BE%97.html
	if ($dir = opendir($dir_name)) {
		while (($file = readdir($dir)) !== false) {
			if ($file != "." && $file != "..") {
// 				echo "$file\n";
				echo "<a href=\"$file\">$file</a><br>";
			}
		}
		
				closedir($dir);
				
	}//if ($dir = opendir("data/")) {
	
?>

<!-- <a href="../images/toranomon_explanation-1.bmp">toranomon_explanation-1.bmp</a><br> -->

<!-- <a href="../images/toranomon_explanation-2.bmp">toranomon_explanation-2.bmp</a><br> -->