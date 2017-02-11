@extends('formulir.layout2') 

@section('table')
<h4>KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA <br> DIREKTORAT JENDERAL HAK KEKAYAAN INTELEKTUAL</h4>
<h3 align="center">FORMULIR PERMOHONAN PENDAFTARAN DESAIN INDUSTRI</h3>
<hr> {{-- Table Pengajuan --}}
<table style="padding-left: 3.75in; margin-bottom: 20px;">
    <tr>
        <td colspan="3">
            <u><b>Diisi oleh petugas</b></u>
        </td>
    </tr>
    <tr>
        <td>Tanggal Permohonan</td>
        <td>:</td>
        <td>{{$data->tanggal_permohonan_string}}</td>
    </tr>
    <tr>
        <td>Tanggal Penerimaan</td>
        <td>:</td>
        <td>{{$data->tanggal_penerimaan_string}}</td>
    </tr>
    <tr>
        <td>Nomor Permohonan</td>
        <td>:</td>
        <td>{{$data->nomor_permohonan}}</td>
    </tr>
</table>
<table cellspacing=0 style="width: 100%">
    <tr>
        <td class="solid">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$data->biodata->nama}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$data->biodata->alamat}}</td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td>:</td>
                    <td>{{$data->biodata->kewarganegaraan}}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td>{{$data->biodata->telepon_fax}}</td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td>:</td>
                    <td>{{$data->biodata->telepon_fax}}</td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td>:</td>
                    <td>{{$data->biodata->no_hp}}</td>
                </tr>
                <tr>
                    <td>NPWP</td>
                    <td>:</td>
                    <td>{{$data->biodata->npwp}}</td>
                </tr>
            </table>
        </td>
        <td style="width: 20%" class="solid">&nbsp;</td>
    </tr>
    <tr>
        <td class="solid">
            Mengajukan permohonan pendaftaran desain industri
        </td>
        <td class="solid">
        </td>
    </tr>
    <tr>
        <td class="solid">
            <table>
                <tr>
                    <td>Melalui/Tidak melalui *) Konsultan HKI</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Badan Hukum <sup>3)</sup></td>
                    <td>:</td>
                    <td>{{$data->konsultan}}</td>
                </tr>
                <tr>
                    <td>Alamat Badan Hukum <sup>2)</sup></td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Konsultan HKI</td>
                    <td>:</td>
                    <td>{{$data->konsultan}}</td>
                </tr>
                <tr>
                    <td>Alamat <sup>2)</sup></td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Telepon / fax</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </td>
        <td class="solid"></td>
    </tr>
    <tr>
        <td class="solid">
            Judul desain industri: <br>
            {{$data->judul_desain_industri}}<br>
        </td>
        <td class="solid"></td>
    </tr>
    <tr>
        <td class="solid">
            <table>
                <tr>
                    <td colspan="3">Nama dan kewarganegaraan pendesain-desainnya :</td>
                </tr>
                @foreach($data->pendesain as $p)
                <tr>
                    <td>{{$p->nama}}</td>
                    <td>Warga Negara</td>
                    <td>{{$p->kewarganegaraan}}</td>
                </tr>
                @endforeach
            </table>
        </td>
        <td class="solid"></td>
    </tr>
    <tr>
        <td class="solid">
            <table>
                <tr>
                    <td colspan="3">Permohonan desain industri ini diajukan dengan/tidak dengan *) hak prioritas <sup>4</sup></td>
                </tr>
                <tr>
                    <td>Negara</td>
                    <td>Tanggal Penerimaan</td>
                    <td>Nomor Prioritas</td>
                </tr>
                @if($data->hak_prioritas_id == 1)
                <tr>
                  <td>{{$data->negara}}</td>
                  <td>{{$data->tanggal_penerimaan_permohonan_pertama_kali_string}}</td>
                  <td>{{$data->nomor_prioritas}}</td>
                </tr>
                @else
                <tr>
                  <td>...............</td>
                  <td>...............</td>
                  <td>...............</td>
                </tr>
                @endif
            </table>
        </td>
        <td class="solid"></td>
    </tr>
    <tr>
        <td class="solid">
            <table>
                <tr>
                    <td>Kelas desain industri (kelas locarno)</td>
                    <td>:</td>
                    <td>{{$data->kelas_desain_industri->nama_kelas_desain_industri}}</td>
                </tr>
            </table>
        </td>
        <td class="solid"></td>
    </tr>
    <tr>
        <td class="solid">
            <table>
                <tr>
                    <td colspan=2>Bersama ini saya/kami lampirkan <sup>5)</sup></td>
                </tr>
                <tr>
                    <td style="width: 30pt">[  V  ]</td>
                    <td>Surat kuasa</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Surat pernyataan pengalihan hak atas desain industri</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Bukti pemilikan hak atas desain industri</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Bukti prioritas dan terjemahannya</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Dokumen (permohonan) desain industri dengan prioritas dan terjemahannya</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Dokumen lain: sebutkan beserta jumlahnya (misal: 3 pemohon = 3 KTP, lihat contoh</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Uraian desain industri atau keterangan gambar</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Contoh fisik</td>
                </tr>
                <tr>
                    <td>[  V  ]</td>
                    <td>Gambar-gambar atau foto-foto desain industri: sebutkan jumlah tampak gambar</td>
                </tr>
            </table>
        </td>
        <td class="solid">
        </td>
    </tr>
    <tr>
        <td colspan=2>Demikian permohonan ini saya/kami ajukan untuk dapat diproses lebih lanjut.</td>
    </tr>
</table>

<table style="padding-left: 9.9cm; margin-bottom: 20px;">
    <tr>
        <td style="text-align: center"> 
            Yang mengajukan permohonan desain industri <sup>6)</sup>
            <br>
            <!-- <b>Nama badan hukum</b> hapus jika perorangan -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <b>{{$data->biodata->nama}}</b><br>
            <!-- <b>Jabatan</b> hapus jika perorangan -->
        </td>
    </tr>
</table>

<section>
    <b>Keterangan:</b>
    <ol>
        <li>Jika lebih dari satu pemohon, cukup satu saja yang dicantumkan pada formulir ini, sedangkan lainnya harap ditulis pada lampiran.</li>
        <li>Alamat surat-menyurat.</li>
        <li>Jika konsultan HKI atau kuasa yang ditunjuk sesuai ketentuan yang berlaku, yang bekerja pada badan hukum tertentu dan bergerak di bidang HKI, maka sebutkan nama badan hukum yang bersangkutan.</li>
        <li>Jika melebihi ruang yang disediakan, harap ditulis pada lampiran.</li>
        <li>Berilah tanda centang (  ) pada jenis dokumen yang dilampirkan.</li>
        <li>
            Jika permohonan desain industri diajukan oleh
            <ul>
                <li>lebih dari satu orang, maka satu orang yang ditunjuk oleh kelompok/grup sebagai pemohon.</li>
                <li>konsultan HKI atau kuasa, maka yang berhak menandatangani adalah konsultan yang terdaftar di kantor HKI, atau kuasa yang ditetapkan sesuai dengan ketentuan yang berlaku.</li>
            </ul>
        </li>
    </ol>
</section>
@endsection