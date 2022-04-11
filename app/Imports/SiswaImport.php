<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
use DateTime;
// use Carbon;
use Carbon\Carbon;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Carbon\Carbon::setLocale('id');
        
        $data = array(
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'kk' => $row['kartu_keluarga'],
            'nama_siswa' => $row['nama_siswa'],
            'jenkel' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'alamat' => $row['alamat_tinggal'],
            'ijazah_tahun' => $row['tahun_ijazah'],
            'ijazah_no' => $row['nomor_ijazah'],
            'asal_sekolah' => $row['asal_sekolah'],
            'no_telp' => $row['telepon_siswa'],
            'email_wali' => $row['email_wali'],
            'email_siswa' => $row['email_siswa'],
            'no_telp_wali' => $row['telepon_wali'],
            'tahunmasuk' => $row['tahun_masuk'],
            'tingkatkelas' => $row['tingkat_kelas'],
            'statussiswa' => $row['status_siswa'],
            'nik' => $row['nik'],
        );

        $hakakses = DB::table('tblhakakses')->where('nama_akses','Siswa')->first();

        $seq = DB::table('tbuser')->max('id') + 1; 

        $datakun = DB::table('tbuser')->insert([
                    'id' => $seq,
                    'username' => $row['nisn'],
                    'password' => password_hash('12345678', PASSWORD_DEFAULT),
                    'nama' => $row['nama_siswa'],
                    'email' => $row['email_siswa'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'active' => 'TRUE',
                    'id_hakakses' => $hakakses->idhakakses
        ]);

        $siswa = DB::table('tblsiswa')->insert($data);
        // dd($data);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value)->toDateTimeString();
        }
    }
}