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
      'nama' => 'Alfian Yulianto',
      'no_ponsel' => '081217432366',
      'password' => Hash::make('password'),
      'kategori_user' => '1',
    ]);
    DB::table('users')->insert([
      'id' => '2',
      'nama' => 'Budi Doremi',
      'no_ponsel' => '085432657890',
      'password' => Hash::make('password'),
      'kategori_user' => '2',
    ]);

    // profile-kader
    DB::table('kader')->insert([
      'nik' => "3372010107000002",
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-banjarsari',
      'ranting_id_ranting' => 'rntng-mangkubumen',
      'pendidikan_terakhir_id_pendidikan_terakhir' => 'pndk-98',
      'user_id' => '1',
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
      'foto' => 'avatar-3.png'
    ]);
    DB::table('kader')->insert([
      'nik' => "3372010108199898",
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-banjarsari',
      'ranting_id_ranting' => 'rntng-sumber_barat',
      'pendidikan_terakhir_id_pendidikan_terakhir' => 'pndk-98',
      'user_id' => '2',
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
      'email' => 'budi.doremi36@gmail.com',
      'no_ponsel' => '085432657890',
      'foto' => 'avatar-3.png'
    ]);

    // daerah
    DB::table('daerah')->insert([
      'id_daerah' => 'ska-1',
      'nama_daerah' => 'Kota Surakarta',
      'alamat_daerah' => 'Jl. Imam Bonjol No.39, Keprabon, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57131',
      'sk_pimp_daerah' => '-'
    ]);

    // cabang
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-banjarsari',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Banjarsari',
      'alamat_cabang' => 'Jl. Banjarsari',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-jebres',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Jebres',
      'alamat_cabang' => 'Jl. Jebres',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-kota_bengawan',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Kota Bengawan',
      'alamat_cabang' => 'Jl. Kota Bengawan',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-kota_barat',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Kota Barat',
      'alamat_cabang' => 'Jl. Kota Barat',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-laweyan',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Laweyan',
      'alamat_cabang' => 'Jl. Laweyan',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-solo_selatan',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Solo Selatan',
      'alamat_cabang' => 'Jl. Solo Selatan',
      'sk_pimp_cabang' => '-'
    ]);
    DB::table('cabang')->insert([
      'id_cabang' => 'cbng-solo_utara',
      'daerah_id_daerah' => 'ska-1',
      'nama_cabang' => 'Solo Utara',
      'alamat_cabang' => 'Jl. Solo Utara',
      'sk_pimp_cabang' => '-'
    ]);

    // ranting banjarsari
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-mangkubumen',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-banjarsari',
      'nama_ranting' => 'Mangkubumen',
      'alamat_ranting' => 'Jl. Mangkubumen',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-sumber_barat',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-banjarsari',
      'nama_ranting' => 'Sumber Barat',
      'alamat_ranting' => 'Jl. Sumber Barat',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-sumber_timur',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-banjarsari',
      'nama_ranting' => 'Sumber Timur',
      'alamat_ranting' => 'Jl. Sumber Timur',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting jebres
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-timuran',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-jebres',
      'nama_ranting' => 'Timuran',
      'alamat_ranting' => 'Jl. Timuran',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-keprabon',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-jebres',
      'nama_ranting' => 'Keprabon',
      'alamat_ranting' => 'Jl. Keprabon',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kestelan',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-jebres',
      'nama_ranting' => 'Kestelan',
      'alamat_ranting' => 'Jl. Kestelan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting kota bengawan
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-baluwarti',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-kota_bengawan',
      'nama_ranting' => 'Baluwarti',
      'alamat_ranting' => 'Jl. Baluwarti',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-semanggi',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-kota_bengawan',
      'nama_ranting' => 'Semanggi',
      'alamat_ranting' => 'Jl. Semanggi',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kauman',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-kota_bengawan',
      'nama_ranting' => 'Kamuan',
      'alamat_ranting' => 'Jl. Kamuan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting kota barat
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-kadipiro',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-kota_barat',
      'nama_ranting' => 'Kadipiro',
      'alamat_ranting' => 'Jl. Kadipiro',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-banyuanyar',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-kota_barat',
      'nama_ranting' => 'Banyuanyar',
      'alamat_ranting' => 'Jl. Banyuanyar',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-nusukan',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-kota_barat',
      'nama_ranting' => 'Nusukan',
      'alamat_ranting' => 'Jl. Nusukan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting laweyan
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-purwosari',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-laweyan',
      'nama_ranting' => 'Purwosari',
      'alamat_ranting' => 'Jl. Purwosari',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-pajang',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-laweyan',
      'nama_ranting' => 'Pajang',
      'alamat_ranting' => 'Jl. Pajang',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-bumi',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-laweyan',
      'nama_ranting' => 'Bumi',
      'alamat_ranting' => 'Jl. Bumi',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting solo selatan
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-serangan',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-solo_selatan',
      'nama_ranting' => 'Serengan',
      'alamat_ranting' => 'Jl. Serengan',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-tipes',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-solo_selatan',
      'nama_ranting' => 'Tipes',
      'alamat_ranting' => 'Jl. Tipes',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-jayengan',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-solo_selatan',
      'nama_ranting' => 'Jayengan',
      'alamat_ranting' => 'Jl. Jayengan',
      'sk_pimp_ranting' => '-'
    ]);

    // ranting solo utara
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-jagalan',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-solo_utara',
      'nama_ranting' => 'Jagalan',
      'alamat_ranting' => 'Jl. Jagalan',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-mojosongo',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-solo_utara',
      'nama_ranting' => 'Mojosongo',
      'alamat_ranting' => 'Jl. Mojosongo',
      'sk_pimp_ranting' => '-'
    ]);
    DB::table('ranting')->insert([
      'id_ranting' => 'rntng-gandekan',
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => 'cbng-solo_utara',
      'nama_ranting' => 'Gandekan',
      'alamat_ranting' => 'Jl. Gandekan',
      'sk_pimp_ranting' => '-'
    ]);

    // ortom
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-hw',
      'nama_ortom' => 'Hizbul Wathan',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-na',
      'nama_ortom' => 'Nasyiatul Aisyiyah',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-ipm',
      'nama_ortom' => 'Ikatan Pelajar Mahasiswa',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-imm',
      'nama_ortom' => 'Ikatan Mahasiswa Muhammadiyah',
    ]);
    DB::table('ortom')->insert([
      'id_ortom' => 'ortm-tspm',
      'nama_ortom' => 'Tapak Suci Putra Muhammdiyah',
    ]);

    // potensi
    DB::table('potensi_kader')->insert([
      'id_potensi_kader' => 'ptns-pnddkn',
      'potensi' => 'Bidang Pendidikan',
    ]);
    DB::table('potensi_kader')->insert([
      'id_potensi_kader' => 'ptns-kshtn',
      'potensi' => 'Bidang Kesehatan',
    ]);
    DB::table('potensi_kader')->insert([
      'id_potensi_kader' => 'ptns-dkwh',
      'potensi' => 'Bidang Dakwah',
    ]);
    DB::table('potensi_kader')->insert([
      'id_potensi_kader' => 'ptns-eknm',
      'potensi' => 'Bidang Ekonomi',
    ]);

    // pendidikan
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-1' . Str::random(3),
      'pendidikan' => 'Sekolah Dasar'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-2' . Str::random(3),
      'pendidikan' => 'Madrasah Ibtidaiyah'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-3' . Str::random(3),
      'pendidikan' => 'Sekolah Menengah Pertama'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-4' . Str::random(3),
      'pendidikan' => 'Madrasah Tsanawiyah'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-5' . Str::random(3),
      'pendidikan' => 'Sekolah Menengah Atas'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-6' . Str::random(3),
      'pendidikan' => 'Sekolah Menengah Kejuruan'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-7' . Str::random(3),
      'pendidikan' => 'Madrasah Aliyah Negeri'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-8' . Str::random(3),
      'pendidikan' => 'Doploma'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-9' . Str::random(3),
      'pendidikan' => 'Sarjana'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-98' . Str::random(3),
      'pendidikan' => 'Magister'
    ]);
    DB::table('pendidikan_terakhir')->insert([
      'id_pendidikan_terakhir' => 'pndk-99' . Str::random(2),
      'pendidikan' => 'Doktor'
    ]);
  }
}
