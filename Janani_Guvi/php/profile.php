
<?php

$servername = "DB_HOST";
$username = "DB_USER";
$password = "DB_PASSWORD";
$dbname = "DB_NAME";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit();
}

$userID = $_SESSION['user_id']; 
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :userID");
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$userDetails = $stmt->fetch(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($userDetails);
?>
