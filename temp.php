		<SELECT name = "monthSelected">
				<?php 
					$i = 12;
					while($i!=0){
						if($i == date('n')){
							echo "<OPTION value =".$i." selected>".switchcall($i)."</OPTION>";		
						}
						else
							echo "<OPTION value =".$i.">".switchcall($i)."</OPTION>";		
						$i--;
					}				
	 			?>
		</SELECT>
		