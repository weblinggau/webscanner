# webscanner
Web silent scanner driver epson 

# fitur
web scanner mendukung semua driver scanner semua merk yang menggunakan driver TWAIN dalam kasus ini diguakan epson l3150<br/><br/>
juga di dukung ajax long poling yang data index gambar secara realtime

# database
database berada di folder `` database/scanner.sql `` silahkan untuk import ke database local.

# login
untuk login ke web gunakan akses berikut<br/><br/>
username : admin<br/>
password : 1234

# setting web
untuk melakukan setting silahkan clone project ini lalu atur seperti pengatuaran web CI biasa pada file `` autoload.php `` `` config.php `` `` database.php `` tertama pada database dan `` base_url[''] `` .
![contoh pengaturan](https://i.ibb.co/gT4rChx/sss.png)

# setting apps destop 
silhkn install aplikasi destop terlebih dahulu di folder app, matikan antivirus terlebih dahulu karna file destop belum di autorisasi di windiws sehingga di anggap virus dan setting next-next pada bagian url isikan url api nya seperti berikut `` http://localhost/webscanner/scan ``  pada bagian ini `` http://localhost/webscanner/ `` isi sesuai dengan pengaturan local anda.

# Cangelog
03-01-2021<br/>
-install semua kelengkpan CI<br/>
-membuat konstrktor untuk database dan template<br/><br/>
05-01-2021<br/>
-menambhan metode login<br/>
-module crud data<br/>
-module scan via web<br/>
-projek selesai<br/>



