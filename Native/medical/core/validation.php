<?php 

$errors = [];

// checks if input is required/not
function isRequired($input): bool
{
  return (! empty($input));
}

// checks if input is string/not
function isString($input): bool
{
  return (gettype($input) == 'string');
}

// checks if input is email/not
function isEmail($input): bool 
{
  return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function lessThanEq(string $input, int $length): bool 
{
  return ( strlen($input) <= $length );
}

function moreThanEq(string $input, int $length): bool 
{
  return ( strlen($input) >= $length );
}

function getError(string $key) 
{
  global $errors;
  
  if(isset($errors[$key])) { 
    echo "<span class='text-danger'>(" . $errors[$key] . ")</span>";  
  }
}