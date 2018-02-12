<?php

/**
 * Модель возвращает массив названий файлов в дирретории
 *
 * @return array возвращает массив названий файлов в дирретории
 * @param string $directory дирректория с файлами
 */

function get_all_filenames_in_the_directory($directory) {
	return array_slice(scandir($directory), 2);
}

?>