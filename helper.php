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
  $viewPath = basePath("App/views/{$view}.view.php");

  if (file_exists($viewPath))
  {
    extract($data);
    require $viewPath;
  } else
  {
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

  $viewPath = basePath("App/views/partials/{$view}.php");



  if (file_exists($viewPath))
  {

    require $viewPath;
  } else
  {
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


/**
 * Sanitize data
 * 
 * @param string $dirty
 * @return string
 */
function sanitize($dirty)
{
  $data = trim($dirty);
  return filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
}


/**
 * Redirect to a url
 * 
 * @param string url
 * @return void
 */
function redirect($url)
{
  header("Location: $url");
  exit();
}