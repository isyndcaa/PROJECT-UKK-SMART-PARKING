<?php

class AuthController
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login()
    {

        if (isset($_POST['login'])) {

            $u = mysqli_real_escape_string($this->conn, $_POST['username']);
            $p = mysqli_real_escape_string($this->conn, $_POST['password']);

            $q = mysqli_query($this->conn, "
                SELECT *
                FROM tb_user
                WHERE username='$u'
                AND password='$p'
                AND status_aktif=1
            ");

            if (mysqli_num_rows($q) > 0) {

                $d = mysqli_fetch_assoc($q);

                $_SESSION['role'] = $d['role'];
                $_SESSION['nama'] = $d['nama_lengkap'];
                $_SESSION['id_user'] = $d['id_user'];

                header("Location: ?page=dashboard");
                exit();

            } else {

                $error = "Username atau Password salah!";

            }

        }

        require BASE_PATH . 'app/views/auth/login.php';

    }

}
?>