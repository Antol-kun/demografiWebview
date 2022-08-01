<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
use DateTime;
// use Carbon;
use Carbon\Carbon;

class PegawaiImport implements ToModel, WithHeadingRow
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
                'Nip' => $row['niynip'],
                'Nik' => $row['nik'],
                'Nama' => $row['nama_pegawai'],
                'Agama' => $row['agama'],
                'Tempatlahir' => $row['tempat_lahir'],
                'Tanggallahir' => $row['tanggal_lahir'],
                'Jeniskelamin' => $row['jenis_kelamin'],
                'Alamat' => $row['alamat_tinggal'],
                'NoHp' => $row['no_telp_pegawai'],
                'Email' => $row['email_pegawai'],
                'Jabatan' => $row['jabatan'],
                'StatusMenikah' => $row['status_marital'],
                'Tahunmasuk' => $row['tmt'],
                'Jabatansekolah' => $row['jabatan_sekolah']
            );

        $hakakses = DB::table('tblhakakses')->where('nama_akses','Guru')->first();
        $cekguru = DB::table('tabelguru')->where('Nip', $row['niynip'])->count();
        // dd($data, $cekguru);

        if($cekguru == 0){
            if($row['jabatan_sekolah'] == 'Guru, Staff' AND $row['jabatan_sekolah'] == 'Guru' AND $row['jabatan_sekolah'] == 'Staff'){
                // dd($row['jabatan_sekolah']);
                $seq = DB::table('tbuser')->max('id') + 1; 
    
                $datakun = DB::table('tbuser')->insert([
                        'id' => $seq,
                        'username' => $row['niynip'],
                        'password' => password_hash('12345678', PASSWORD_DEFAULT),
                        'nama' => $row['nama_pegawai'],
                        'email' => $row['email_pegawai'],
                        'created_at' => Carbon::now()->toDateTimeString(),
                        'active' => 'TRUE',
                        'id_hakakses' => $hakakses->idhakakses
                ]);

                DB::table('tabelguru')->insert($data);
            }
        }
        // dd($row['jabatan_sekolah']);
        // $hakakses = DB::table('tblhakakses')->first();
        // dd($row['niynip']);
        // return new PegawaiImport([
        //     'Nip' => $row[0],
        //     'Nik' => $row[1], 
        //     'Nama' => $row[2], 
        //     // 'alamat' => $row[3], 
        // ]);
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