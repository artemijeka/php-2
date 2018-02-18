<?php

/**
 * Модель возвращает массив названий файлов в дирретории
 *
 * @return array возвращает массив названий файлов в дирретории
 * @param string $directory дирректория с файлами
 */

function getAllFileNames($directory) {
	return array_slice(scandir($directory), 2);
}

?>