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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  $age = $_POST['age'] ?? '';
  $dob = $_POST['dob'] ?? '';
  $contact = $_POST['contact'] ?? '';
  $address = $_POST['address'] ?? '';

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (username, password, age, dob, contact, address) VALUES (:username, :password, :age, :dob, :contact, :address)");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $hashedPassword);
  $stmt->bindParam(':age', $age);
  $stmt->bindParam(':dob', $dob);
  $stmt->bindParam(':contact', $contact);
  $stmt->bindParam(':address', $address);

  try {
    $stmt->execute();
    echo "Registration successful!";
  } catch (PDOException $e) {
    echo "Registration failed: " . $e->getMessage();
  }
}
?>
