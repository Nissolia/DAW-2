

<?php
function conectarDB() {
    $host = "localhost"; 
    $dbname = "tiendanb"; 
    // $dbname = "tienda"; 
    $user = "root";       
    $pass = "";          

    try {
        // Crear conexión usando PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; // Retornar la conexión
    } catch (PDOException $e) {
        die(json_encode(["error" => "Error de conexión: " . $e->getMessage()]));
    }
}
?>
