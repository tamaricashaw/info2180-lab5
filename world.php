
<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = $_GET['country'];

if (isset($_GET['lookup']) && $_GET['lookup'] === 'cities') {
  // Cities Lookup
  $stmt = $conn->query("SELECT * FROM countries cty join cities c on c.country_code = cty.code WHERE cty.name LIKE '%$country%'");

} else {
  // Country Lookup;
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['lookup']) && $_GET['lookup'] === 'cities'){
  
   // Output as a table for city lookup
   echo '<table border="1">';
   echo '<thead><tr><th>Name</th><th>District</th><th>Population</th></tr></thead>';
   echo '<tbody>';
   foreach ($results as $row) {
       echo '<tr>';
       echo '<td>' . htmlspecialchars($row['name']) . '</td>';
       echo '<td>' . htmlspecialchars($row['district']) . '</td>';
       echo '<td>' . htmlspecialchars($row['population']) . '</td>';
       echo '</tr>';

} echo '</tbody></table>';

}else{

  // Output as a table for country lookup
  echo '<table border="1">';
  echo '<thead><tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr></thead>';
  echo '<tbody>';
  foreach ($results as $row) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($row['name']) . '</td>';
      echo '<td>' . htmlspecialchars($row['continent']) . '</td>';
      echo '<td>' . htmlspecialchars($row['independence_year']) . '</td>';
      echo '<td>' . htmlspecialchars($row['head_of_state']) . '</td>';
      echo '</tr>';
  }
  echo '</tbody></table>';
}



?>


