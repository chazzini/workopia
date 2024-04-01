<?php
/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string
{
  return __DIR__ . '/' . $path;
}

/**
 * Load view
 *
 * @param string $view
 * @param array $data
 * @return void
 */
function loadView(string $view, array $data = []): void
{
  $viewPath = basePath("views/{$view}.view.php");

  if (file_exists($viewPath)) {
    extract($data);
    require $viewPath;
  } else {
    echo "{$view} not found";
  }
}
/**
 * Load partials
 *
 * @param string $view
 * @return void
 */
function loadPartial(string $view): void
{

  $viewPath = basePath("views/partials/{$view}.php");



  if (file_exists($viewPath)) {

    require $viewPath;
  } else {
    echo "{$view} not found";
  }
}

/**
 * Inspect  a value
 * 
 * @param mixed $value
 * @return void
 */
function inspect(mixed $value): void
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';

}
/**
 * Inspect  a value and Die
 * 
 * @param mixed $value
 * @return void
 */
function inspectAndDie(mixed $value): void
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';

  die();

}



function formatSalary(string $salary): string
{
  $formated_salary = '$' . number_format(floatval($salary));
  return $formated_salary;
}