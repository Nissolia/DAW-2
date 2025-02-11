<?php
class TiendaDB {
    private static $host = "127.0.0.1";
    private static $db = "tiendanb";
    private static $user = "root"; // Cambia esto si tienes credenciales diferentes
    private static $pass = "";
    private static $charset = "utf8mb4";
    private static $pdo = null;

    public static function connectDB() {
        if (self::$pdo === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
                self::$pdo = new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
