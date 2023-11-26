<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($username === 'janani123' && $password === '1234') {
    echo "Login successful";
    
  } else {
    header('HTTP/1.1 401 Unauthorized');
    echo "Invalid username or password";
  }
}
?>
