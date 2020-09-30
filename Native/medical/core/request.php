<?php 

// prepares input (remove special chars and extra spaces)
function prepareInput(string $input): string
{
  return trim(htmlspecialchars($input));
}

// redirect to website-url/path
function redirect(string $path)
{
  header("location:" . URL . $path);
}

// redirect to website-url/admin/path
function aredirect(string $path)
{
  header("location:" . AURL . $path);
}

function abort()
{
  header("location:" . URL . "404.php");
}