@extends('formulir.layout2') 

@section('table')

<h2 style="text-align: center"><u>Permintaan Pendaftaran Merk</u></h2>

<table style="width: 100%">
    <tr>
        <td class="solid" style="width: 50%">* Tgl Masuk : </td>
        <td class="solid">* Untuk Permohonan Merek :</td>
    </tr>
    <tr>
        <td class="solid">* No. Agenda :</td>
        <td class="solid">* Tgl. Penerimaan Permohonan :</td>
    </tr>
    <tr>
        <td class="solid" colspan="2">
            <table>
                <tr>
                    <td>Nama, Kewarganegaraan dan Alamat <br>Pemilik Merk</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td>Nama dan Alamat Kuasa</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alamat yang dipilih di Indonesia <br> (Diisi untuk pemilik merek yang <br>tidak bertempat tinggal di Indonesia)</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Negara dan tanggal Permohonan <br>Pendaftaran merek yang pertama kali <br>(Diisi untuk Permohonan pendaftaran <br>yang diajukan dengan hak prioritas)</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="solid">Warna –warna etiket : <br><br></td>
        <td class="solid" rowspan="3" valign=top align=center>Etiket Merk</td>
    </tr>
    <tr>
        <td class="solid">Arti bahasa/huruf/angka Asing dalam etiket merek : <br><br></td>
    </tr>
    <tr>
        <td class="solid">Kelas Barang/Jasa</td>
    </tr>
    <tr>
        <td colspan="2" class="solid">
            Jenis Barang/Jasa: 
            <br>
            <br>
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
            ................., ......................... 20.... <br>
            Pemohon/kuasa,
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            Tanda tangan <br>
            Nama lengkap 
        </td>
    </tr>
</table>

@endsection