@extends('formulir.layout2') 

@section('table')

    {{-- Header --}}
    <table style="padding-left: 11cm">
        <tr>
            <td style="font-weight: bold">
                Lampiran I. <br>
                Peraturan Menteri Kehakiman R.I. <br>
                <u>Nomor: M.01-HC.03.01 Tahun 1987</u>
            </td>
        </tr>
        <tr>
            <td>
                Kepada Yth. : <br>
                Direktur Jenderal HKI <br>
                melalui Direktur Hak Cipta, <br>
                Desain Industri, Desain Tata Letak, <br>
                Sirkuit Terpadu dan Rahasia Dagang <br>
                di  <br>
                Jakarta
            </td>
        </tr>
    </table>

    <h2 style="text-align: center"><u>PERMOHONAN PENDAFTARAN CIPTAAN</u></h2>
    {{-- form --}}
    <table class="margin">
        <tr>
            <td style="width: 1cm">I.</td>
            <td colspan=4>Pencipta</td>
        </tr>
        <tr>
            <td></td>
            <td>1.</td>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->pencipta_nama}}</td>
            
        </tr>
        <tr>
            <td></td>
            <td style="width: 1cm">2.</td>
            <td style="width: 5cm">Kewarganegaraan</td>
            <td style="width: 0.2cm">:</td>
            <td>{{$data->pencipta_kewarganegaraan}}</td>
            
        </tr>
        <tr>
            <td></td>
            <td>3.</td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$data->pencipta_alamat}}</td>
        </tr>
        <tr>
            <td>II.</td>
            <td colspan=4>Pemegang Hak Cipta</td>
            
        </tr>
        <tr>
            <td></td>
            <td>1.</td>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->pemegang_hak_cipta_nama}}</td>
        </tr>
        <tr>
            <td></td>
            <td>2.</td>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>{{$data->pemegang_hak_cipta_kewarganegaraan}}</td>
            
        </tr>
        <tr>
            <td></td>
            <td>3.</td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$data->pemegang_hak_cipta_alamat}}</td>
        </tr>
        <tr>
            <td>III.</td>
            <td colspan=4>Kuasa</td>
        </tr>
        <tr>
            <td></td>
            <td>1.</td>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->kuasa_nama}}</td>
            
        </tr>
        <tr>
            <td></td>
            <td>2.</td>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>{{$data->kuasa_kewarganegaraan}}</td>
            
        </tr>
        <tr>
            <td></td>
            <td>3.</td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$data->kuasa_alamat}}</td>
        </tr>
        <tr>
            <td>IV.</td>
            <td colspan=2>Jenis dan Judul yang dimohonkan</td>
            <td>:</td>
            <td>{{$data->nama_ciptaan}}</td>
        </tr>
        <tr>
            <td>V.</td>
            <td colspan=2>Tanggal dan tempat diumumkan untuk pertama
kali di wilayah Indonesia
atau di luar wilayah Indonesia</td>
            <td>:</td>
            <td>{{$data->tempat_diumumkan}}, {{$data->tanggal_diumumkan_string}}</td>
        </tr>
        <tr>
            <td>VI.</td>
            <td colspan=2>Uraian ciptaan</td>
            <td>:</td>
            <td>{{$data->uraian_ciptaan}}</td>
        </tr>
    </table>
    
    {{-- table ttd --}}
    <table style="padding-left: 12cm; margin-top: 2cm; text-align: center">
        <tr>
            <td> Yogyakarta, {{$data->tanggal_sekarang_string}}</td>
            
        </tr>
        <tr>
            <td style="height: 2.5cm"></td>
        </tr>
        <tr>
            <td>{{$data->biodata->nama}}</td>
        </tr>
    </table>
@endsection