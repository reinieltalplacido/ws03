<?php

/**
 * Get the base path
 * 
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view partial
 *
 * @param string $partial
 * @param array $data
 * @return void
 */
function loadPartial($partial, array $data = [])
{
    $partialPath = basePath('views/partials/' . $partial . '.php');
    
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial {$partial} not found";
    }
}

function loadView($view, array $data = [])
{
    extract($data, EXTR_SKIP);
    require basePath('views/' . $view . '.view.php');
}

