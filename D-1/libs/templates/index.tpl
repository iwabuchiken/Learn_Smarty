<html>
  <head>
    <title>Smarty</title>
  </head>
  <body>
  
	<pre>
		User Information:
		
		Name: {$name|capitalize}
		Address: {$address|escape}
		Date: {$smarty.now|date_format:"%b %e, %Y"}
	</pre>
  
  	<?php 
  	
// 		echo    "Hello, {$name}!";
  	
  	?>
  	<?php 
  		
//   		for ($i = 0; $i < 3; $i++) {
  			
// 			echo "yes";
  	?>
<!--   	Hello, {$name} -->

  	<?php 
  	
//   	  		}
  	  		
  	?>
  	
  	<?php 
  	
//   		echo "hi";
  	
  	?>
  	
  </body>
</html>