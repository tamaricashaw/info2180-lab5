
<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// $stmt = $conn->query("SELECT * FROM countries");
$country = $_GET['country'];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<table border="2">
  <thead>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence </th>
      <th>Head of State</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['continent']) ?></td>
        <td><?= htmlspecialchars($row['independence_year']) ?></td>
        <td><?= htmlspecialchars($row['head_of_state']) ?></td>
    
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>





<!-- <ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul> -->
