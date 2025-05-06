/*
*   Sweetalert
*   ---------------------------------------------------------------
*/

function simpan(pageYa, pageTidak) {
    Swal.fire({
        title: 'Data Berhasil disimpan',
        text: 'Apakah ingin menambah Data lagi?',
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isDismissed) {
            window.location.href = pageTidak;
        }
        if (result.isConfirmed) {
            window.location.href = pageYa;
        }
    })
}

function simpanExcel(page) {
    Swal.fire({
        title: 'Success',
        text: 'Data Excel berhasil diinput',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = page;
        }
    })
}

function Edit(page) {
    Swal.fire({
        title: 'Success',
        text: 'Data berhasil diubah',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = page;
        }
    })
}

function gagal(pesan) {
    Swal.fire({
        icon: 'error',
        title: 'Opps...',
        text: pesan,
    })
}

function hapus(table, idd) {
    const id = idd;
    const tabel = table;

    Swal.fire({
        title: 'Apakah anda ingin menghapus data ini?',
        text: "Anda tidak akan dapat mengembalikan data tersebut!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        allowOutsideClick: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'apps/delete.php',
                method: 'post',
                data: {
                    'tabel': tabel,
                    id: id
                },
                success: function(response) {
                    Swal.fire(
                        'Success!',
                        'Data berhasil dihapus.',
                        'success'
                    )
                    $('#tr_' + id).hide(500)
                }
            })
        }
    })
};

function printPage() {
    window.print();
}

function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Format jam, menit, dan detik agar selalu dua digit
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var timeString = hours + ':' + minutes + ':' + seconds;

    document.getElementById('clock').innerText = timeString;
}

    // Memperbarui jam setiap detik
    setInterval(updateClock, 1000);

/*
*   jQuery
*   ---------------------------------------------------------------
*/



