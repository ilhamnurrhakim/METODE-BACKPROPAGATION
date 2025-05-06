<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Input Data Akun</h1>

    <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

    <div class="py-2">
        <form action="" method="POST" autocomplete="off">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex">
                    <label for="username" class="w-[25%] py-2 text-[#07074D] font-medium">Username</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="username" type="text" required name="username"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="pass" class="w-[25%] py-2 text-[#07074D] font-medium">Password</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="pass" type="password" required name="pass"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="cpass" class="w-[25%] py-2 text-[#07074D] font-medium">Konfirmasi Password</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="cpass" type="password" required name="cpass"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="level" class="w-[25%] py-2 text-[#07074D] font-medium">Level</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <select id="level" name="level" require class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" disabled selected>-- Pilih Level --</option>
                        <option value="Admin">Admin</option>
                        <option value="Pimpinan">Pimpinan</option>
                    </select>
                </div>

                <div class="mt-2 flex flex-row-reverse">
                    <button name="btnSave" type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-2 px-8 text-center text-base font-semibold text-white outline-none">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['btnSave'])) {

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $level = $_POST['level'];

    if ($pass == $cpass) {
        $hash = hash('sha256', $cpass);
        $tabel = 'akun';
        $field = '(username, password, level)';
        $value = "('$username', '$hash', '$level')";

        $query = insert($tabel, $field, $value);

        if ($query) {
            echo '<script type="text/javascript"> simpan("./?p=data_akun&a=add", "./?p=data_akun"); </script>';
        }
        else {
            echo '<script> gagal("Data gagal disimpan"); </script>';
        }
    } else {
        echo '<script> gagal("Password Tidak Sama"); </script>';
    }
}
?>