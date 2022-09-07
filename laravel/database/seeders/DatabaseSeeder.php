<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        DB::table('markdowns')->insert([
            'title' => 'Workshop Amazon Lightsail Containers',
            'content' => <<<EOF

## Workshop Deploy Laravel App dengan Amazon Lightsail Containers

Pada workshop ini peserta akan mempraktikkan bagaimana melakukan deployment sebuah web app menggunakan Amazon Lightsail Containers. Sebuah app sederhana untuk melakukan konversi Markdown ke HTML yang dibangun dengan Laravel framework akan digunakan sebagai contoh pada praktik ini. 

Peserta dapat mengikuti panduan workshop melalui step-step atau langkah-langkah yang telah disediakan secara berurutan mulai dari step 1 hingga step 15.

- [Step 1 - Kebutuhan](STEP-1.md)
- [Step 2 - Menginstal Lightsail Control Plugin](STEP-2.md)
- [Step 3 - Download Contoh Aplikasi](STEP-3.md)
- [Step 4 - Menjalankan untuk Development](STEP-4.md)
- [Step 5 - Menjalankan untuk Production](STEP-5.md)
- [Step 6 - Membuat Container Service di Amazon Lightsail](STEP-6.md)
- [Step 7 - Push Container Image ke Amazon Lightsail](STEP-7.md)
- [Step 8 - Deploy Container](STEP-8.md)
- [Step 9 - Membuat Versi Baru dari API](STEP-9.md)
- [Step 10 - Update Container Image](STEP-10.md)
- [Step 11 - Push Container Image Versi Terbaru](STEP-11.md)
- [Step 12 - Deploy Versi Terbaru dari API](STEP-12.md)
- [Step 13 - Menambah Jumlah Node](STEP-13.md)
- [Step 14 - Rollback API ke Versi Sebelumnya](STEP-14.md)
- [Step 15 - Menghapus Amazon Lightsail Container Service](STEP-15.md)

Jika anda lebih menyukai semua langkah dalam satu halaman maka silahkan membuka file [README.single-page.md](README.single-page.md).

<table border="0" style="width: 100%; display: table;"><tr><td><a href="STEP-15.md">&laquo; Sebelumnya</td><td align="center"><a href="README.md">Daftar Isi</a></td><td align="right"><a href="STEP-1.md">Berikutnya &raquo;</a></td></tr></table>

<sup>Workshop: Deploy Laravel App dengan Amazon Lightsail Containers  
Version: 2022-24-06  
Author: [@rioastamal](https://github.com/rioastamal)</sup>
EOF
        ]);
        
        DB::table('markdowns')->insert([
            'title' => 'STEP 1',
            'content' => <<<EOF

### <a name="step-1"></a>Step 1 - Kebutuhan

Sebelum memulai workshop pastikan sudah memenuhi kebutuhan yang tercantum di bawah ini.

- Memiliki akun AWS aktif
- Sudah menginstal Docker
- Sudah menginstal AWS CLI v2 dan konfigurasinya
- Apache 2
- PHP 8.1
- Composer 2.3

Untuk menginstal PHP 8.1 dan Apache 2 gunakan perintah berikut.

```sh
docker pull public.ecr.aws/docker/library/php:8.1-apache
```

Untuk Composer 2.3 gunakan perintah berikut.

```sh
docker pull public.ecr.aws/docker/library/composer:2.3
```

Untuk memastikan image sudah ada pada lokal mesin, jalankan perintah ini.

```sh
docker images
```

```
REPOSITORY                               TAG          IMAGE ID       CREATED             SIZE
public.ecr.aws/docker/library/php        8.1-apache   9e0b7aff3bd6   38 hours ago        458MB
public.ecr.aws/docker/library/composer   2.3          a0dc29169f36   2 weeks ago         199MB
```


<table border="0" style="width: 100%; display: table;"><tr><td><a href="README.md">&laquo; Sebelumnya</td><td align="center"><a href="README.md">Daftar Isi</a></td><td align="right"><a href="STEP-2.md">Berikutnya &raquo;</a></td></tr></table>

<sup>Workshop: Deploy Laravel App dengan Amazon Lightsail Containers  
Version: 2022-24-06  
Author: [@rioastamal](https://github.com/rioastamal)</sup>
EOF
        ]);
        
        DB::table('markdowns')->insert([
            'title' => 'STEP 2',
            'content' => <<<EOF

### <a name="step-2"></a>Step 2 - Menginstal Lightsail Control Plugin

Plugin CLI ini digunakan untuk mengupload container image dari komputer lokal ke Amazon Lightsail container service. Jalankan perintah berikut untuk menginstal Lightsail Control Plugin. Diasumsikan bahwa terdapat perintah `sudo` pada distribusi Linux yang anda gunakan.

```sh
sudo curl "https://s3.us-west-2.amazonaws.com/lightsailctl/latest/linux-amd64/lightsailctl" -o "/usr/local/bin/lightsailctl"
```

Tambahkan atribut _execute_ pada file `lightsailctl` yang baru saja didownload.

```sh
sudo chmod +x /usr/local/bin/lightsailctl
```

Pastikan atribut _execute_ sudah teraplikasikan ke file.

```sh
ls -l /usr/local/bin/lightsailctl
```

```
-rwxr-xr-x 1 root root 13201408 May 28 03:16 /usr/local/bin/lightsailctl
```

Itu ditandai dengan adanya huruf `x` pada daftar atribut, contohnya `-rwxr-xr-x`.


<table border="0" style="width: 100%; display: table;"><tr><td><a href="STEP-1.md">&laquo; Sebelumnya</td><td align="center"><a href="README.md">Daftar Isi</a></td><td align="right"><a href="STEP-3.md">Berikutnya &raquo;</a></td></tr></table>

<sup>Workshop: Deploy Laravel App dengan Amazon Lightsail Containers  
Version: 2022-24-06  
Author: [@rioastamal](https://github.com/rioastamal)</sup>
EOF
        ]);
    }
}
