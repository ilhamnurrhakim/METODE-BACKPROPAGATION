<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Input Data Akreditasi</h1>

    <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

    <div class="py-2">
        <form action="" method="POST" autocomplete="off">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex">
                    <label for="sk" class="w-[25%] py-2 text-[#07074D] font-medium">No SK</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="sk" type="text" required name="sk"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="akre" class="w-[25%] py-2 text-[#07074D] font-medium">Akreditasi</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <select id="akre" name="akre" require class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" disabled selected>-- Pilih Akreditasi --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>

                <div class="flex">
                    <label for="tgl" class="w-[25%] py-2 text-[#07074D] font-medium">Tanggal Berlaku</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="tgl" type="date" required name="tgl"
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

    $sk = $_POST['sk'];
    $akre = $_POST['akre'];
    $tgl = $_POST['tgl'];

    $tabel = 'data_akreditasi';
    $field = '(no_sk, akreditasi, tgl_berlaku)';
    $value = "('$sk', '$akre', '$tgl')";

    $query = insert($tabel, $field, $value);

    if ($query) {
        echo '<script type="text/javascript"> simpan("./?p=data_akreditasi&a=add", "./?p=data_akreditasi"); </script>';
    }
    else {
        echo '<script> gagal("Data gagal disimpan"); </script>';
    }
}
?>