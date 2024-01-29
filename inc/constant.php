<?php
if (!function_exists('connect_db')) {
    function connect_db() {
        $db_host = "localhost";
        $db_name = "market_atici";
        $db_user= "root";
        $db_password= "";
        try {
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: ". $e->getMessage());
        }
        return $conn;
    }
}
?>
