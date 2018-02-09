<?php

/**
 * @param string $dirPath - путь к диретории
 * @return array  - массив имён изображений
 */
function scan_dir_images($dirPath)
{
    $result = array();
    
    $scanDir = scandir($dirPath);
    /**
     * 
     */
    array_splice($scanDir, 0, 2);
    
    return $scanDir;
}
