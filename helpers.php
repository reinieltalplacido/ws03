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
    $partialPath = basePath('App/views/partials/' . $partial . '.php');

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial {$partial} not found";
    }
}

function loadView($name, $data = [])
{
    $viewPath = basePath('App/views/' . $name . '.view.php');

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$name} not found";
    }
}

function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}
