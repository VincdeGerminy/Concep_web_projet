<?php 
	echo "id emetteur post parent nbVotes<br/>";
	foreach ($context->tab as $key => $value)
	{
		foreach ($value as $key2 => $value2)
		{
			echo $value2." ";
		}
		echo "<br/>";
	}
?>