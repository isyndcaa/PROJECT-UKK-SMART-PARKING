<?php
class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        if (self::$conn == null) {
            self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!self::$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
        }
        return self::$conn;
    }
}
?>