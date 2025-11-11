<?php
try {
  $pdo = new PDO("mysql:host=127.0.0.1;dbname=prueba", "root", "123");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
  echo "<pre>";
  print_r($usuarios);
  echo "</pre>";

} catch (PDOException $e) {
  echo "❌ Error: " . $e->getMessage();
}
?>
