<?php

namespace App\Exports;

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\KaderPotensi;
use App\Models\Potensi;
use App\Models\Ranting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DataPotensiKaderExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithColumnWidths,  WithStyles
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $kader_potensi = collect([]);
    $kader = Kader::orderBy('cabang_id_cabang', 'asc')->orderBy('ranting_id_ranting', 'asc')->get();
    foreach ($kader as $key => $value) {
      $cek_kader_potensi = KaderPotensi::where('kader_nik', $value->nik)->first();
      if ($cek_kader_potensi) {
        $data = [
          'no' => $key + 1,
          'nik' => $cek_kader_potensi->kader_nik,
          'no_kta' => Kader::where('nik', $cek_kader_potensi->kader_nik)->first()->no_kta,
          'no_ktm' => Kader::where('nik', $cek_kader_potensi->kader_nik)->first()->no_ktm,
          'daerah' => Daerah::get()->first()->nama_daerah,
          'cabang' => Cabang::where('id_cabang', Kader::where('nik', $cek_kader_potensi->kader_nik)->first()->cabang_id_cabang)->first()->nama_cabang,
          'ranting' => Ranting::where('id_ranting', Kader::where('nik', $cek_kader_potensi->kader_nik)->first()->ranting_id_ranting)->first()->nama_ranting,
          'nama' => Kader::where('nik', $cek_kader_potensi->kader_nik)->first()->nama,
          'potensi' => Potensi::where('id_potensi', $cek_kader_potensi->potensi_id_potensi)->first()->potensi,
          'uraian_potensi' => strip_tags($cek_kader_potensi->potensi_kader_uraian),
        ];
        $kader_potensi->push($data);
      }
    }
    return $kader_potensi;
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
      "Potensi",
      "Uraian Potensi",
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
    ];
  }
  public function styles(Worksheet $sheet)
  {
    $jumlah_data_potensi_kader = KaderPotensi::all()->count();
    $jumlah_data_potensi_kader += 1;
    $sheet->getStyle('1')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('B2:B' . $jumlah_data_potensi_kader)->getAlignment()->setHorizontal('left');
    $sheet->getStyle('A2:A' . $jumlah_data_potensi_kader)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('1')->getAlignment()->setVertical('middle');
    $sheet->getStyle('A1:J' . $jumlah_data_potensi_kader)->getBorders()->getAllBorders()->setBorderStyle('thin');

    return [
      1 => ['font' => ['bold' => true]],
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
    ];
  }
  public function columnWidths(): array
  {
    return [
      'A' => 9,
    ];
  }
}
