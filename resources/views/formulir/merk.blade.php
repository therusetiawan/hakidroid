@extends('formulir.layout2') 

@section('table')

<h2 style="text-align: center"><u>Permintaan Pendaftaran Merek</u></h2>

<table style="width: 100%">
    <tr>
        <td class="solid" style="width: 50%">* Tgl Masuk : {{$data->tanggal_masuk_string}}</td>
        <td class="solid">* Untuk Permohonan Merek : {{$data->untuk_permohonan_merek}}</td>
    </tr>
    <tr>
        <td class="solid">* No. Agenda : {{$data->no_agenda}}</td>
        <td class="solid">* Tgl. Penerimaan Permohonan : {{$data->tanggal_penerimaan_string}}</td>
    </tr>
    <tr>
        <td class="solid" colspan="2">
            <table>
                <tr>
                    <td>Nama, Kewarganegaraan dan Alamat <br>Pemilik Merek</td>
                    <td>:</td>
                    <td>{{$data->biodata->nama}},<br>{{$data->biodata->kewarganegaraan}},<br>{{$data->biodata->alamat}}</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td>Nama dan Alamat Kuasa</td>
                    <td>:</td>
                    <td>{{$data->kuasa_nama}},<br>{{$data->kuasa_alamat}}</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td>:</td>
                    <td>{{$data->kuasa_telpon}}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td>{{$data->kuasa_no_hp}}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td>{{$data->kuasa_email}}</td>
                </tr>
                <tr>
                    <td>Alamat yang dipilih di Indonesia <br> (Diisi untuk pemilik merek yang <br>tidak bertempat tinggal di Indonesia)</td>
                    <td>:</td>
                    <td>{{$data->kuasa_alamat_indonesia}}</td>
                </tr>
                <tr>
                    <td>Nama Negara dan tanggal Permohonan <br>Pendaftaran merek yang pertama kali <br>(Diisi untuk Permohonan pendaftaran <br>yang diajukan dengan hak prioritas)</td>
                    <td>:</td>
                    <td>{{$data->kuasa_nama_negara}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="solid">
            Warna –warna etiket : <br>
            {{$data->warna_warna_etiket}}<br>
        </td>
        <td class="solid" valign=top align=center>Etiket Merek</td>
    </tr>
    <tr>
        <td class="solid">
            Arti bahasa/huruf/angka Asing dalam etiket merek : <br>
            {{$data->arti_etiket_merek}}<br>
        </td>
        <td class="solid">
            <br>
            <img src="{{storage_path().'/app/merek/etiket_merek/'.$data->etiket_merek}}" style="width: 6cm; padding-left: 1cm;">
            <br>
        </td>
    </tr>
    <tr>
        <td class="solid">Kelas Barang/Jasa</td>
        <td class="solid">{{$data->kelas_barang_jasa->nama_kelas_barang_jasa}}</td>
    </tr>
    <tr>
        <td colspan="2" class="solid">
            Jenis Barang/Jasa: 
            {{$data->kelas_barang_jasa->deskripsi}}
            <br>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="2">*) Diisi oleh kantor merek</td>
    </tr>
    <tr>
        <td></td>
        <td align="center">
            Yogyakarta , {{$data->tanggal_sekarang_string}}<br>
            Pemohon/kuasa,
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            {{$data->biodata->nama}}
        </td>
    </tr>
</table>

@endsection