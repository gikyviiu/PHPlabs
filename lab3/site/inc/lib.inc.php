<?php
declare(strict_types=1);

/**
 * Summary of getTable
 * @param int $cols
 * @param int $rows
 * @param string $color
 * @return int
 */
function getTable(int $cols = 7, int $rows = 7, string $color = 'orange'): int
{
	static $count = 0;
	$count++;
	$table = '<table>';
	for ($i = 1; $i <= $cols; $i++) {
		$table .= '<tr>';
		for ($j = 1; $j <= $rows; $j++) {
			if ($i == 1 || $j == 1) {
				$table .= '<th style="background-color:' . $color . ';">' . $i * $j . '</th>';
			} else {
				$table .= '<td>' . $i * $j . '</td>';
			}
		}
		$table .= '</tr>';
	}
	$table .= '</table>';
	echo $table;
	return $count;
}



/**
 * Summary of getMenu
 * @param array $menu
 * @param bool $vertical
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void
{
    if($vertical) echo '<ul class="menu">';
    else echo '<ul class="menu vertical">';
        foreach ($menu as $item) {
            echo '<li><a href="' . $item['href'] . '">' . $item['link'] . '</a></li>';
        }
    echo '</ul>';
}