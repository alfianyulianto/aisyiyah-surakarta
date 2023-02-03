<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // user
    DB::table('users')->insert([
      'id' => '1',
      'kader_nik' => '3372010107000002',
      'kategori_user_id' => 1,
      'nama' => 'Alfian Yulianto',
      'no_ponsel' => '081217432366',
      'password' => Hash::make('password'),
    ]);
    DB::table('users')->insert([
      'id' => '2',
      'kader_nik' => '3372010108199898',
      'kategori_user_id' => 1,
      'nama' => 'Budi Doremi',
      'no_ponsel' => '085432657890',
      'password' => Hash::make('password'),
    ]);
    DB::table('users')->insert([
      'id' => '3',
      'kader_nik' => '3372010108199809',
      'kategori_user_id' => 1,
      'nama' => 'Indah Larasati',
      'no_ponsel' => '085432987009',
      'password' => Hash::make('password'),
    ]);

    // kategori_user
    DB::table('kategori_user')->insert([
      'id' => 1,
      'kategori_user' => 'kader',
    ]);
    DB::table('kategori_user')->insert([
      'id' => 2,
      'kategori_user' => 'admin',
    ]);
    DB::table('kategori_user')->insert([
      'id' => 3,
      'kategori_user' => 'admin-daerah',
    ]);
    DB::table('kategori_user')->insert([
      'id' => 4,
      'kategori_user' => 'admin-cabang',
    ]);
    DB::table('kategori_user')->insert([
      'id' => 5,
      'kategori_user' => 'admin-ranting',
    ]);

    // profile-kader
    DB::table('kader')->insert([
      'nik' => "3372010107000002",
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-bnjr',
      'ranting_id_ranting' => 'rntng-mkbm',
      'pendidikan_terakhir_id_pendidikan_terakhir' => 'pndk-Pd7Y',
      'no_kta' => '54321',
      'no_ktm' => '12345',
      'nama' => 'Alfian Yulianto',
      'tempat_lahir' => 'Surakarta',
      'tanggal_lahir' => '2000-07-01',
      'alamat_asal_ktp' => 'Bratan RT 003 RW 006 Pajang Kecamatan Laweyan Kota Surakarta',
      'alamat_rumah_tinggal' => 'Bratan RT 003 RW 006 Pajang Kecamatan Laweyan Kota Surakarta',
      'status_pernikahan' => 'Belum Menikah',
      'pekerjaan' => 'Mahasiswa',
      'email' => 'alfianyulianto36@gmail.com',
      'no_ponsel' => '081217432366',
      'foto' => 'foto profil/avatar-3.png'
    ]);
    DB::table('kader')->insert([
      'nik' => "3372010108199898",
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-bnjr',
      'ranting_id_ranting' => 'rntng-sbbr',
      'pendidikan_terakhir_id_pendidikan_terakhir' => 'pndk-Pd7Y',
      'no_kta' => '23456',
      'no_ktm' => '65432',
      'nama' => 'Budi Doremi',
      'tempat_lahir' => 'Surakarta',
      'tanggal_lahir' => '2000-12-11',
      'alamat_asal_ktp' => 'Karang Turi RT 010 RW 002 Pajang Kecamatan Laweyan Kota Surakarta',
      'alamat_rumah_tinggal' =>
      'Karang Turi RT 010 RW 002 Pajang Kecamatan Laweyan Kota Surakarta',
      'status_pernikahan' => 'Menikah',
      'pekerjaan' => 'Pekerja',
      'email' => 'budi.doremi@gmail.com',
      'no_ponsel' => '085432657890',
      'foto' => 'foto profil/avatar-3.png'
    ]);
    DB::table('kader')->insert([
      'nik' => "3372010108199809",
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-bnjr',
      'ranting_id_ranting' => 'rntng-sbbr',
      'pendidikan_terakhir_id_pendidikan_terakhir' => 'pndk-Pd7Y',
      'no_kta' => '77777',
      'no_ktm' => '88888',
      'nama' => 'Indah Larasati',
      'tempat_lahir' => 'Surakarta',
      'tanggal_lahir' => '1999-01-11',
      'alamat_asal_ktp' => 'Sidodadi RT 002 RW 002 Pajang Kecamatan Laweyan Kota Surakarta',
      'alamat_rumah_tinggal' =>
      'Sidodadi RT 003 RW 002 Pajang Kecamatan Laweyan Kota Surakarta',
      'status_pernikahan' => 'Belum Menikah',
      'pekerjaan' => 'Mahasiswa',
      'email' => 'indah.larasati@gmail.com',
      'no_ponsel' => '085432987009',
      'foto' => 'foto profil/avatar-3.png'
    ]);

    // daerah
    DB::table('daerah')->insert([
      'id_daerah' => 'aisyiyah-surakarta',
      'nama_daerah' => 'Kota Surakarta',
      'alamat_daerah' => 'Jl. Imam Bonjol No.39, Keprabon, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57131',
      'sk_pimp_daerah' => '-'
    ]);

    // cabang
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-bnjr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Banjarsari',
      'alamat_cabang' => 'Jl. Banjarsari',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-jbrs',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Jebres',
      'alamat_cabang' => 'Jl. Jebres',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-ktbgw',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Kota Bengawan',
      'alamat_cabang' => 'Jl. Kota Bengawan',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-ktbr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Kota Barat',
      'alamat_cabang' => 'Jl. Kota Barat',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-lwyn',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Laweyan',
      'alamat_cabang' => 'Jl. Laweyan',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-slsl',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Solo Selatan',
      'alamat_cabang' => 'Jl. Solo Selatan',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-slut',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_cabang' => 'Solo Utara',
      'alamat_cabang' => 'Jl. Solo Utara',
      'sk_pimp_cabang' => '-'
    ]);

    // ranting banjarsari
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-mkbm',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-bnjr',
      'nama_ranting' => 'Mangkubumen',
      'alamat_ranting' => 'Jl. Mangkubumen',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-sbbr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-bnjr',
      'nama_ranting' => 'Sumber Barat',
      'alamat_ranting' => 'Jl. Sumber Barat',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-sbtm',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-bnjr',
      'nama_ranting' => 'Sumber Timur',
      'alamat_ranting' => 'Jl. Sumber Timur',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting jebres
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-tmrn',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-jbrs',
      'nama_ranting' => 'Timuran',
      'alamat_ranting' => 'Jl. Timuran',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kprb',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-jbrs',
      'nama_ranting' => 'Keprabon',
      'alamat_ranting' => 'Jl. Keprabon',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kstl',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-jbrs',
      'nama_ranting' => 'Kestelan',
      'alamat_ranting' => 'Jl. Kestelan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting kota bengawan
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-blwr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-ktbgw',
      'nama_ranting' => 'Baluwarti',
      'alamat_ranting' => 'Jl. Baluwarti',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-smng',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-ktbgw',
      'nama_ranting' => 'Semanggi',
      'alamat_ranting' => 'Jl. Semanggi',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kman',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-ktbgw',
      'nama_ranting' => 'Kamuan',
      'alamat_ranting' => 'Jl. Kamuan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting kota barat
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kdpr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-ktbr',
      'nama_ranting' => 'Kadipiro',
      'alamat_ranting' => 'Jl. Kadipiro',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-bnyr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-ktbr',
      'nama_ranting' => 'Banyuanyar',
      'alamat_ranting' => 'Jl. Banyuanyar',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-nskn',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-ktbr',
      'nama_ranting' => 'Nusukan',
      'alamat_ranting' => 'Jl. Nusukan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting laweyan
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-pwsr',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-lwyn',
      'nama_ranting' => 'Purwosari',
      'alamat_ranting' => 'Jl. Purwosari',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-pjng',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-lwyn',
      'nama_ranting' => 'Pajang',
      'alamat_ranting' => 'Jl. Pajang',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-bumi',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-lwyn',
      'nama_ranting' => 'Bumi',
      'alamat_ranting' => 'Jl. Bumi',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting solo selatan
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-srng',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-slsl',
      'nama_ranting' => 'Serengan',
      'alamat_ranting' => 'Jl. Serengan',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-tpes',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-slsl',
      'nama_ranting' => 'Tipes',
      'alamat_ranting' => 'Jl. Tipes',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-jyng',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-slsl',
      'nama_ranting' => 'Jayengan',
      'alamat_ranting' => 'Jl. Jayengan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting solo utara
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-jgln',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-slut',
      'nama_ranting' => 'Jagalan',
      'alamat_ranting' => 'Jl. Jagalan',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-mjsn',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-slut',
      'nama_ranting' => 'Mojosongo',
      'alamat_ranting' => 'Jl. Mojosongo',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-gndk',
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'cabang_id_cabang' => 'cbng-slut',
      'nama_ranting' => 'Gandekan',
      'alamat_ranting' => 'Jl. Gandekan',
      'sk_pimp_ranting' => '-'
    ]);

    // ortom
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-' . Str::random(4),
      'nama_ortom' => 'Hizbul Wathan',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-' . Str::random(4),
      'nama_ortom' => 'Nasyiatul Aisyiyah',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-'  . Str::random(4),
      'nama_ortom' => 'Ikatan Pelajar Mahasiswa',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-'  . Str::random(4),
      'nama_ortom' => 'Ikatan Mahasiswa Muhammadiyah',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-' .  Str::random(4),
      'nama_ortom' => 'Tapak Suci Putra Muhammdiyah',
    ]);

    // potensi
    DB::table('potensi')->insert([
      'id_potensi' => 'ptns-' . Str::random(4),
      'potensi' => 'Bidang Pendidikan',
    ]);
    DB::table('potensi')->insert([
      'id_potensi' => 'ptns-' . Str::random(4),
      'potensi' => 'Bidang Kesehatan',
    ]);
    DB::table('potensi')->insert([
      'id_potensi' => 'ptns-' . Str::random(4),
      'potensi' => 'Bidang Dakwah',
    ]);
    DB::table('potensi')->insert([
      'id_potensi' => 'ptns-' . Str::random(4),
      'potensi' => 'Bidang Ekonomi',
    ]);

    // pendidikan
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Sekolah Dasar',
      'created_at' => date('Y-m-d H:i:01')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Madrasah Ibtidaiyah',
      'created_at' => date('Y-m-d H:i:02')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Sekolah Menengah Pertama',
      'created_at' => date('Y-m-d H:i:03')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Madrasah Tsanawiyah',
      'created_at' => date('Y-m-d H:i:04')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-Pd7Y',
      'pendidikan' => 'Sekolah Menengah Atas',
      'created_at' => date('Y-m-d H:i:05')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Sekolah Menengah Kejuruan',
      'created_at' => date('Y-m-d H:i:06')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Madrasah Aliyah Negeri',
      'created_at' => date('Y-m-d H:i:07')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Diploma Satu',
      'created_at' => date('Y-m-d H:i:08')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Diploma Dua',
      'created_at' => date('Y-m-d H:i:09')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Diploma Tiga',
      'created_at' => date('Y-m-d H:i:10')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Diploma Empat',
      'created_at' => date('Y-m-d H:i:11')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Sarjana',
      'created_at' => date('Y-m-d H:i:12')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Magister',
      'created_at' => date('Y-m-d H:i:13')
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-' . Str::random(4),
      'pendidikan' => 'Doktor',
      'created_at' => date('Y-m-d H:i:14')
    ]);

    // jabatan
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:01')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Wakil Ketua 1',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:02')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Wakil Ketua 2',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:03')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Wakil Ketua 3',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:04')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:05')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Bendahara 1',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:06')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Bendahara 2',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:07')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Majelis Tabligh_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:08')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Majelis Tabligh_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:09')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Majelis Tabligh_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:10')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Majelis Tabligh_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:11')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Dikdasmen_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:12')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Dikdasmen_Sekertaris',
      'created_at' => date('Y-m-d H:i:13')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Dikdasmen_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:14')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Dikdasmen_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:15')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesehatan_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:16')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesehatan_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:17')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesehatan_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:18')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesehatan_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:19')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesejahteraan Sosial_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:20')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesejahteraan Sosial_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:21')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesejahteraan Sosial_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:22')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Kesejahteraan Sosial_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:23')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Ekonomi_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:24')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Ekonomi_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:25')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Ekonomi_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:26')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Ekonomi_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:27')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Pembinaan Kader_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:28')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Pembinaan Kader_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:29')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Pembinaan Kader_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:30')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Pembinaan Kader_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:31')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Hukum dan HAM_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:32')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Hukum dan HAM_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:33')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Hukum dan HAM_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:34')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Hukum dan HAM_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:35')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LPPA_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:36')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LPPA_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:37')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LPPA_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:38')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LPPA_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:39')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Lembaga Kebudayaan_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:40')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Lembaga Kebudayaan_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:41')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Lembaga Kebudayaan_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:42')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'Lembaga Kebudayaan_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:43')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LLHPB_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:44')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LLHPB_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:45')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LLHPB_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:46')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'LLHPB_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:47')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'BPH UNISA_Ketua',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:48')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'BPH UNISA_Sekertaris',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:49')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'BPH UNISA_Bendahara',
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:50')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => 'BPH UNISA_Anggota',
      'satu_kader' => false,
      'created_at' => date('Y-m-d H:i:51')
    ]);
    DB::table('jabatan')->insert([
      'id_jabatan' => 'jbtn-' . Str::random(4),
      'daerah_id_daerah' => 'aisyiyah-surakarta',
      'nama_jabatan' => "Kepala RT 'Aisyiyah",
      'satu_kader' => true,
      'created_at' => date('Y-m-d H:i:52')
    ]);

    // tabel periode
    DB::table('periode')->insert([
      'id_periode' => 'prd-' . Str::random(4),
      'periode' => '2005-2010',
      'created_at' => date('Y-m-d H:i:01')
    ]);
    DB::table('periode')->insert([
      'id_periode' => 'prd-' . Str::random(4),
      'periode' => '2010-2015',
      'created_at' => date('Y-m-d H:i:02')
    ]);
    DB::table('periode')->insert([
      'id_periode' => 'prd-' . Str::random(4),
      'periode' => '2015-2020',
      'created_at' => date('Y-m-d H:i:03')
    ]);
    DB::table('periode')->insert([
      'id_periode' => 'prd-' . Str::random(4),
      'periode' => '2020-2025',
      'created_at' => date('Y-m-d H:i:04')
    ]);

    // tabel tempat_lahir
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Surakarta',
      'created_at' => date('Y-m-d H:i:01')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Sukoharjo',
      'created_at' => date('Y-m-d H:i:02')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Klaten',
      'created_at' => date('Y-m-d H:i:03')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Wonogiri',
      'created_at' => date('Y-m-d H:i:04')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Kudus',
      'created_at' => date('Y-m-d H:i:05')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Sragen',
      'created_at' => date('Y-m-d H:i:06')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Karanganyar',
      'created_at' => date('Y-m-d H:i:07')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Boyolali',
      'created_at' => date('Y-m-d H:i:08')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Bogor',
      'created_at' => date('Y-m-d H:i:09')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Bekasi',
      'created_at' => date('Y-m-d H:i:10')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Semarang',
      'created_at' => date('Y-m-d H:i:11')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Cianjur',
      'created_at' => date('Y-m-d H:i:12')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Malang',
      'created_at' => date('Y-m-d H:i:13')
    ]);
    DB::table('tempat_lahir')->insert([
      'id_tempat_lahir' => 'tmptlhr-' . Str::random(4),
      'tempat_lahir' => 'Magelang',
      'created_at' => date('Y-m-d H:i:14')
    ]);

    // tabel pekerjaan
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Pegawai Negeri Sipil',
      'created_at' => date('Y-m-d H:i:01')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Wirasuwasta',
      'created_at' => date('Y-m-d H:i:02')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Dosen',
      'created_at' => date('Y-m-d H:i:03')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Pelajar',
      'created_at' => date('Y-m-d H:i:04')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Mahasiswa',
      'created_at' => date('Y-m-d H:i:05')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Karyawan Swasta',
      'created_at' => date('Y-m-d H:i:06')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Ibu Rumah Tangga',
      'created_at' => date('Y-m-d H:i:07')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Aparatur Sipil Negara',
      'created_at' => date('Y-m-d H:i:08')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Kepolisian Negara Republik Indonesia',
      'created_at' => date('Y-m-d H:i:09')
    ]);
    DB::table('pekerjaan')->insert([
      'id_pekerjaan' => 'pkrjn-' . Str::random(4),
      'pekerjaan' => 'Tentara Nasional Indonesia',
      'created_at' => date('Y-m-d H:i:10')
    ]);
  }
}
