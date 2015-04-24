<html>
  <head>
  
    <title>
    
    	{$title}
    
    
    </title>
    
<!--     	<link rel="stylesheet" type="text/css" href="Smarty/main/libs/templates/rsc/css/main.css" /> -->
    
    
    
    	<link rel="stylesheet" type="text/css" href="{$path_css}" /><!-- working -->
    	
    	
<!--     	<link rel="stylesheet" type="text/css" href="/Smarty/main/libs/templates/rsc/css/main.css" /> -->
    	
  </head>
	
  <body>
  
	  <hr>

	  		<table>
	  			{php}
	  				
	  				global $index;	{* works *}
	  				
	  				$index = 1;
	  				
	  				{* {$smarty}->assign("index", $index); *}
	  				//$smarty->assign("index", $index);
	  				
	  				//$this->assign("index", $index);
	  				
	  				global $foo, $bar;
					   if($foo == $bar){
					     echo 'This will be sent to browser';
					   }
					   
					//$this->assign('varX','Toffee');
	  				
	  			{/php}
	  			
	  			<tr>
	  			
	  				<td>
	  					{php}
	  					
	  						echo "hi";
	  						
	  						echo " ";
	  						
	  						//echo $index;
	  						
	  						//echo $title;	{* Undefined variable: title *}
	  					
	  					{/php}
	  					{$index}
	  				</td>
	  			</tr>
		  	
			</table>  
		  
		  {assign var="y" value=0}
		  
		  {$y}

		  
			{* {counter start=1 skip=1} *}
			{* {section name=cnt loop=$xxxxxx} *}
			  {* index:{$smarty.section.cnt.index} *}
			{* {$smarty.section.cnt.iteration} *}
			
			{* {if !$smarty.section.cnt.first} *}
			{*     counter:{counter} *}
			{*   {/if} *}
			{*   {if !$smarty.section.cnt.last} *}
			{*     counter:{counter} *}
			{*   {/if} *}
			{* {/section} *}		  
		  
		  {* {section name=sec start=0 loop=5} *}
		  
		  	{* => Cannot use object of type SmartyBC as array *}
		  
		  {* {/section} *}
		  
		  {php}
		  
		  {/php}
	
	  <hr>
	  
	  <div class="blue">yes</div>
	  
	  <br>
	  <br>
	  
	  
		
  </body>
  
</html>