<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Input Data Biaya SPP</h1>

    <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

    <div class="py-2">
        <form action="" method="POST" autocomplete="off">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex">
                    <label for="biaya" class="w-[25%] py-2 text-[#07074D] font-medium">Biaya</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <div class="text-center py-2 w-[10%]">Rp</div>
                    <input id="biaya" type="number" required name="biaya"
                        class="w-[55%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
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

    $biaya = $_POST['biaya'];
    $tgl = $_POST['tgl'];

    $tabel = 'data_spp';
    $field = '(biaya, tgl_berlaku)';
    $value = "($biaya, '$tgl')";

    $query = insert($tabel, $field, $value);

    if ($query) {
        echo '<script type="text/javascript"> simpan("./?p=data_spp&a=add", "./?p=data_spp"); </script>';
    }
    else {
        echo '<script> gagal("Data gagal disimpan"); </script>';
    }
}
?>