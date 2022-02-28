<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=youtube', 'root', '');

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  //'title'   => $row["title"],
  'title'   => "See conversation",
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
   'url' => "?stck_id=".$row['s_id']."&date=".$row['start_event'],
 );
}

echo json_encode($data);

?>