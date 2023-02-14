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
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KaderExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize,  WithStyles, WithColumnWidths
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $kader = Kader::orderBy('cabang_id_cabang', 'asc')->get();
    $data_kader = collect([]);
    foreach ($kader as $key => $value) {
      $arr = [
        'no' => $key + 1,
        'nik' => $value->nik,
        'no_kta' => $value->no_kta ?? '-',
        'no_ktm' => $value->no_ktm ?? '-',
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
      'A' => NumberFormat::FORMAT_TEXT,
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
    $jumlah_kader = Kader::all()->count();
    $jumlah_kader += 1;
    $sheet->getStyle('1')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('B1:B' . $jumlah_kader)->getAlignment()->setHorizontal('left');
    $sheet->getStyle('A1:A' . $jumlah_kader)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('1')->getAlignment()->setVertical('middle');
    $sheet->getStyle('A1:P' . $jumlah_kader)->getBorders()->getAllBorders()->setBorderStyle('thin');
    return [
      1    => ['font' => ['bold' => true, 'alignment' => 'center']],
      'A' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'B' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'C' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'D' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'E' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'F' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'G' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'H' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'I' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'J' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'K' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'L' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'M' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'N' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'O' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
      'P' => ['font' => ['name' => 'Times New Roman', 'size' => 12]],
    ];
  }
  public function columnWidths(): array
  {
    return [
      'A' => 9,
    ];
  }
}
