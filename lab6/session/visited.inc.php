<?php

echo '<h2>Список посещённых страниц</h2>';
if(isset($_SESSION['visitedPages'])){
	foreach($_SESSION['visitedPages'] as $page){
		echo $page . '<br>';
	}
}
?>