<?php

if (!isset($day))
	$day = null;

$result = match($day) {
	1, 2, 3, 4, 5 => "Это рабочий день",
	6, 7 => "Это выходной день",
	default => "Неизвестный день",
};

return $result;