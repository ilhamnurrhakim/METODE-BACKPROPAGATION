<?php
session_start();
include "../apps/apis.php";


// Cek Cookie
/* if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // Ambil Data Username - Email Berdasarkan Id
    $result = mysqli_query($conn, "SELECT username OR email FROM tb_users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // Cek Cookie Username - Email
    if ($key === md5($row['username'])) {
        $_SESSION["login"] = true;
    }
} */

if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/tailwind/output.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/js/alert.js"></script>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>

    <title>Login</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center w-full bg-gray-200">
        <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
            <form action="" method="POST">
                <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Welcome Back!</h1>
                <div class="flex flex-col gap-2">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Username</label>
                        <input id="username" type="text" required name="username" placeholder="Enter your username" class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                        <input id="password" type="password" required name="password" placeholder="Enter your password" class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <a href="#" class="text-xs text-gray-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Forgot Password?</a>
                    </div>
                    <div class="flex mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none">
                            <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="login" class="w-full hover:shadow-form rounded-md bg-indigo-600 hover:bg-indigo-700 py-2 px-8 text-center text-base font-semibold text-white outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
            </form>
        </div>
    </div>

    <script src="../assets/js/alert.js"></script>
</body>

</html>

<?php
    if (isset($_POST["login"])) {
        $username = $_POST['username'];
        $rawpassword = $_POST['password'];
        $pass = hash('sha256', $rawpassword);

        $tabel = "akun";
        $field = "*";
        $where = "WHERE username = '$username'";

        $query = getRecord($tabel, $field, $where);
        $row = fetch($query);

        if (!empty($row)) {
            if ($pass == $row['password']) {

                // Set Session
                $_SESSION["login"] = true;
                $_SESSION["user"] = $row['level'];

                // Cek Cookie (Remember Me)
                if (isset($_POST["remember"])) {

                    // Buat Cookie
                    setcookie('id', $row['id'], time() + 60, "/", "localhost", 1);
                    setcookie('key', md5($row['username']), time() + 60, "/", "localhost", 1);
                }

                echo "<script> document.location.href = '../index.php'</script>";

            } else {
                echo '<script> gagal("User tidak ditemukan"); </script>';
            }
        } else {
            echo '<script> gagal("User tidak ditemukan"); </script>';
        }
    }
?>