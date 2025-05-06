Sebelum menjalankan program php ini, lakukan langkah berikut :

1. Install Composer dan Node.JS
    - Link Composer : https://getcomposer.org/download/
    - Link Node.JS : https://nodejs.org/en/download/prebuilt-installer (gunakan versi Node.JS yang LTS)

2. Setelah Menginstall kedua tools diatas selanjutnya buka folder program
   dengan aplikasi TextEditor yang memiliki terminal seperti :
    - VSCode
    - JetBrains

3. Selanjutnya Buka terminal pada aplikasi TextEditor.

4. Ketik command berikut pada terminal (tanpa tanda kutip) :
   pertama  : "composer update"

        setelah command diatas selesai lanjut command kedua

   kedua    : "npm update"

5. Selanjutnya import file database SQL yang ada pada folder "assets/SQL".

6. Gunakan username dan password berikut untuk mengakses menu:

    level Admin     :   Username : admin
                        Password : admin

    level pimpinan  :   Username : pimpinan
                        Password : 12345



Untuk melakukan perubahan desain jalankan command berikut pada terminal (tanpa tanda kutip)

    "npx tailwindcss -i ./assets/tailwind/input.css -o ./assets/tailwind/output.css --watch"

    note : command di atas harus dijalankan setiap pertama kali membuka TextEditor.

Setelah itu anda sudah bisa melakukan perubahan desain pada website, namun perlu diingat bahwa website ini
tidak menggunakan CSS murni, melainkan menggunakan Tailwind CSS, untuk mengetahui class Tailwind dapat dilihat
dokumentasi pada website Tailwind. Berikut adalah link website Tailwind https://tailwindcss.com/docs/installation
