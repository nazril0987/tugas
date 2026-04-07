<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Catatan: Sangat disarankan menggunakan Prepared Statements seperti saran sebelumnya
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['username'] = $user;
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        header("location:login.php?pesan=gagal");
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Sekolah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body { 
            background: linear-gradient(135deg, #06c9fa 0%, #105efb 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
        }

        .login-box { 
            background: rgba(255, 255, 255, 0.95); 
            padding: 40px; 
            border-radius: 15px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h3 { color: #333; margin-bottom: 30px; font-weight: 600; }

        .input-group { position: relative; margin-bottom: 20px; text-align: left; }

        .input-group label { display: block; font-size: 14px; margin-bottom: 5px; color: #666; }

        .input-group input { 
            width: 100%; 
            padding: 12px 15px; 
            border: 2px solid #eee; 
            border-radius: 8px; 
            outline: none;
            transition: 0.3s;
            font-size: 14px;
        }

        .input-group input:focus { border-color: #06c9fa; }

        /* Fitur Toggle Password */
        .password-container { position: relative; }

        .toggle-password { 
            position: absolute; 
            right: 15px; 
            top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer; 
            color: #999;
            transition: 0.3s;
        }

        .toggle-password:hover { color: #06c9fa; }

        button { 
            width: 100%; 
            padding: 12px; 
            background: #40cc2e; 
            color: white; 
            border: none; 
            border-radius: 8px;
            cursor: pointer; 
            font-size: 16px; 
            font-weight: 600;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover { background: #27ae60; transform: translateY(-2px); }

        .pesan-error {
            background: #ffe5e5;
            color: #e74c3c;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            border: 1px solid #ffcccc;
        }

        .garis {
        width: 120px;
        height: 3px;
        background: #01151a;
        margin: -20px auto 25px auto; 
        border-radius: 2px;
}
    </style>
</head>
<body>

    <div class="login-box">
        <h3>Login!</h3>
        <div class="garis"></div>
     
        <?php if(isset($_GET['pesan'])) { ?>
            <div class="pesan-error">
                <i class="fas fa-exclamation-circle"></i> Sandi atau username salah!.
            </div>
        <?php } ?>

        <form method="post">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="password-container">
                    <input type="password" name="password" id="passwordField" placeholder="Masukkan password" required>
                    <i class="fas fa-eye toggle-password" id="toggleIcon" onclick="togglePassword()"></i>
                </div>
            </div>

            <button type="submit" name="login">MASUK</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("passwordField");
            const toggleIcon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                // fitur mata tertutup
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                // fitur mata terbuka 
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>
</html>