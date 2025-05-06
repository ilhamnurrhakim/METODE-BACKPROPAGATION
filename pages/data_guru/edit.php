<?php
$id = $_GET['i'];
$query = getRecord("data_guru", "*", "WHERE id='$id'");
$row = fetch($query);
?>

<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Ubah Data Guru</h1>

    <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

    <div class="py-2">
        <form action="" method="POST">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex">
                    <label for="nip" class="w-[25%] py-2 text-[#07074D] font-medium">NIP</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="nip" type="number" required name="nip" value="<?= $row['nip'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="nama" class="w-[25%] py-2 text-[#07074D] font-medium">Nama</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="nama" type="text" required name="nama" value="<?= $row['nama'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="jk" class="w-[25%] py-2 text-[#07074D] font-medium">Jenis Kelamin</label>
                    <div id="jk" class="text-center py-2 w-[10%]">:</div>
                    <?php
                        $a = $row['jk'];
                        if ($a == 'Laki - Laki')
                            $A = "selected";
                        else
                            $A = "";

                        if ($a == 'Perempuan')
                            $B = "selected";
                        else
                            $B = "";
                    ?>
                    <select name="jk" require class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="A" <?= $A ?>>Laki - Laki</option>
                        <option value="B" <?= $B ?>>Perempuan</option>
                    </select>
                </div>

                <div class="flex">
                    <label for="jabatan" class="w-[25%] py-2 text-[#07074D] font-medium">Jabatan</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="jabatan" type="text" required name="jabatan" value="<?= $row['jabatan'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="mt-2 flex flex-row-reverse">
                    <button name="btnSave"
                        class="hover:shadow-form w-[20vh] rounded-md bg-[#6A64F1] py-2 px-8 text-center text-base font-semibold text-white outline-none">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['btnSave'])) {

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jabatan = $_POST['jabatan'];

    $tabel = 'data_guru';
    $where = "id = '$id'";
    $value = "nip = '$nip', nama = '$nama', jk = '$jk', jabatan = '$jabatan'";

    $query = update($tabel, $value, $where);

    if ($query) {
        echo '<script type="text/javascript"> Edit("./?p=data_guru"); </script>';
    }
    else {
        echo '<script> gagal("Data gagal disimpan"); </script>';
    }
}
?>