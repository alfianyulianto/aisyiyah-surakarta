<?php

namespace App\Exports;

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\PendidikanTerakhir;
use App\Models\Ranting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KaderExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize,  WithStyles
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $kader = Kader::all();
    $data_kader = collect([]);
    foreach ($kader as $key => $value) {
      $arr = [
        'no' => $key + 1,
        'nik' => $value->nik,
        'no_kta' => $value->no_kta,
        'no_ktm' => $value->no_ktm,
        'daerah' => Daerah::where('id_daerah', $value->daerah_id_daerah)->first()->nama_daerah ?? '-',
        'cabang' => Cabang::where('id_cabang', $value->cabang_id_cabang)->first()->nama_cabang ?? '-',
        'ranting' => Ranting::where('id_ranting', $value->ranting_id_ranting)->first()->nama_ranting ?? '-',
        'nama' => $value->nama,
        'email' => $value->email,
        'tempat_tanggal_lahir' => $value->tempat_lahir . ', ' . $value->tanggal_lahir,
        'alamat_asal_ktp' => $value->alamat_asal_ktp,
        'alamat_rumah_tinggal' => $value->alamat_rumah_tinggal,
        'status_pernikahan' => $value->status_pernikahan,
        'pekerjaan' => $value->pekerjaan,
        'pendidikan_terakhir' => PendidikanTerakhir::where('id_pendidikan_terakhir', $value->pendidikan_terakhir_id_pendidikan_terakhir)->first()->pendidikan,
        'no_ponsel' => $value->no_ponsel,
      ];
      $data_kader->push($arr);
    }
    return $data_kader;
  }

  public function headings(): array
  {
    return [
      "Nomer",
      "NIK",
      "No KTA 'Aisyiyah",
      "No KTA Muhammadiyah",
      "Daerah",
      "Cabang",
      "Ranting",
      "Nama",
      "Email",
      "Tempat Tanggal Lahir",
      "Alamat Asal KTP",
      "Alamat Domisili",
      "Status Pernikahan",
      "Pekerjaan",
      "Pendidikan",
      "Nomer Ponsel",
    ];
  }
  public function columnFormats(): array
  {
    return [
      'A' => NumberFormat::FORMAT_NUMBER,
      'B' => NumberFormat::FORMAT_NUMBER,
      'C' => NumberFormat::FORMAT_TEXT,
      'D' => NumberFormat::FORMAT_TEXT,
      'E' => NumberFormat::FORMAT_TEXT,
      'F' => NumberFormat::FORMAT_TEXT,
      'G' => NumberFormat::FORMAT_TEXT,
      'H' => NumberFormat::FORMAT_TEXT,
      'I' => NumberFormat::FORMAT_TEXT,
      'J' => NumberFormat::FORMAT_TEXT,
      'K' => NumberFormat::FORMAT_TEXT,
      'L' => NumberFormat::FORMAT_TEXT,
      'M' => NumberFormat::FORMAT_TEXT,
      'N' => NumberFormat::FORMAT_TEXT,
      'O' => NumberFormat::FORMAT_TEXT,
      'P' => NumberFormat::FORMAT_NUMBER,
    ];
  }
  public function styles(Worksheet $sheet)
  {
    // // $sheet->setAllBorders('thin');
    // $sheet->getStyle()->setFont(['family' => 'Times New Roman', 'size' => 12]);
    return [
      1    => ['font' => ['bold' => true, 'alignment' => 'center']],
      'A' => ['font' => ['family' => 'Times New Roman', 'size' => 12]]
    ];
  }
}
