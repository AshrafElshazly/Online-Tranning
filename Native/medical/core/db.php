<?php 

$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//getOne Function*******
function getOne(string $table, string $where): array
{
  global $conn;
  
  $sql = "SELECT * FROM $table WHERE $where LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    return mysqli_fetch_assoc($result);
  } else {
    return [];
  }
}  


//getAll Function*******
function getAll(string $table): array 
{
  global $conn;
  
  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    return [];
  }
}


//getWhere Function*******
function getWhere(string $table, string $where): array 
{
  global $conn;
  
  $sql = "SELECT * FROM $table WHERE $where";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    return [];
  }
}

//getCount Function*******
function getCount(string $table): int
{
  global $conn;

  $sql = "SELECT COUNT(*) AS cnt FROM $table";

  $result = mysqli_query($conn, $sql);

  return mysqli_fetch_assoc($result)['cnt'];
}


//getCountWhere Function*******
function getCountWhere(string $table, string $where): int
{
  global $conn;

  $sql = "SELECT COUNT(*) AS cnt FROM $table WHERE $where";

  $result = mysqli_query($conn, $sql);

  return mysqli_fetch_assoc($result)['cnt'];
}


//insert Function*******
function insert(string $table, array $data): bool
{
  global $conn;
  $keys = '';
  $values = '';

  foreach ($data as $key => $value) {
    $keys .= "$key,";
    $values .= "'$value',";
  }

  $keys = substr($keys, 0, -1);
  $values = substr($values, 0, -1);

  $sql = "INSERT INTO $table ($keys) VALUES ($values)";

  return mysqli_query($conn, $sql);
}


//update Function*******
function update(string $table, array $data, string $where): bool
{
  global $conn;
  $set = '';

  foreach ($data as $key => $value) {
    $set .= "$key = '$value',";
  }

  $set = substr($set, 0, -1);

  $sql = "UPDATE $table SET $set WHERE $where";

  return mysqli_query($conn, $sql);
}


//delete Function*******
function delete(string $table, string $where): bool 
{
  global $conn;

  $sql = "DELETE FROM $table WHERE $where";

  return mysqli_query($conn, $sql);
}


//orders data

function ordersdata() : array
{
  global $conn;

  $sql = "SELECT orders.order_id,orders.order_name,orders.order_email,orders.order_phone,orders.order_created_at, cities.city_name , services.services_name
          FROM orders
          INNER JOIN cities
          ON orders.order_city_id = cities.city_id 
          INNER JOIN services
          ON orders.order_services_id = services.services_id
          ;";
$result = mysqli_query($conn,$sql);
return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


