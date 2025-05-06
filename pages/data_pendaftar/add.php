<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Input Data Siswa Pendaftar</h1>

    <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

    <div class="py-2">
        <form action="" method="POST" autocomplete="off">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex">
                    <label for="nama" class="w-[25%] py-2 text-[#07074D] font-medium">Nama</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="nama" type="text" required name="nama"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="nisn" class="w-[25%] py-2 text-[#07074D] font-medium">NISN</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="nisn" type="number" required name="nisn"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="tempat" class="w-[25%] py-2 text-[#07074D] font-medium">Tempat Lahir</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="tempat" type="text" required name="tempat"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="tgl" class="w-[25%] py-2 text-[#07074D] font-medium">Tanggal Lahir</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="tgl" type="date" required name="tgl"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="jk" class="w-[25%] py-2 text-[#07074D] font-medium">Jenis Kelamin</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <select id="jk" name="jk" require class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="flex">
                    <label for="as" class="w-[25%] py-2 text-[#07074D] font-medium">Asal Sekolah</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="as" type="text" required name="as"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
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

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tmpt = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $as = $_POST['as'];

    $tabel = 'data_pendaftar';
    $field = '(nama, nisn, tmpt_lahir, tgl_lahir, jk, asal_sekolah)';
    $value = "('$nama', '$nisn', '$tmpt', '$tgl', '$jk', '$as')";

    $query = insert($tabel, $field, $value);

    if ($query) {
        echo '<script type="text/javascript"> simpan("./?p=data_pendaftar&a=add", "./?p=data_pendaftar"); </script>';
    }
    else {
        echo '<script> gagal("Data gagal disimpan"); </script>';
    }
}
?>