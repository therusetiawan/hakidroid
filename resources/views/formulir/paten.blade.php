@extends('formulir.master')

@section('table')
  <table style="border: 0px; padding: 0px;">
    <tr>
      <td>
        <h4>
          KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA R.I <br>
          DIREKTORAT JENDERAL HAK KEKAYAAN INTELEKTUAL
        </h4>
        <h3><u>Formulir Permohonan Paten</u></h3>
      </td>
      <td style="width: 35%">
        <table class="solid">
          <tr>
            <td colspan="3"><u><b>Diisi oleh petugas</b></u></td>
          </tr>
          <tr>
            <td>Tanggal Pengajuan</td>
            <td>:</td>
            <td>{{$data->tanggal_permohonan_string}}</td>
          </tr>
          <tr>
            <td>Nomor Permohonan</td>
            <td>:</td>
            <td>{{$data->permohonan_paten_nomor}}</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <table cellspacing='0'>
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
      <td>{{$data->biodata->alamat}}</td>
    </tr>
    <tr>
      <td>NPWP</td>
      <td>:</td>
      <td>{{$data->biodata->npwp}}</td>
    </tr>
  </table>
  <table cellspacing='0'>
    <tr>
      <td>Mengajukan permohonan paten/paten sederhana</td>
      <td>{{$data->jenis_paten}}</td>
    </tr>
  </table>
  <table cellspacing='0'>
    <tr>
      <td>Melalui/Tidak melalui *) Konsultan Paten</td>
      @if($data->konsultan != null)
      <td class="solid">Ya</td>
      @else
      <td class="solid">Tidak</td>
      @endif
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
      <td>Nama Konsultan Paten</td>
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
  <table>
    <tr>
      <td>Judul Invensi:</td>
      <td></td>
    </tr>
    <tr>
      <td colspan="3">{{$data->judul_invensi}}</td>
    </tr>
  </table>
  <table>
    <tr>
      <td colspan="3">
        Permohonan Paten ini merupakan pecahan dari permohonan paten nomor:
        @if($data->paten_pecahan_nomor != null)
          {{$data->paten_pecahan_nomor}}
        @endif
      </td>
    </tr>
  </table>
  <table>
    <tr>
      <td colspan="3">Nama dan Kewarganegaraan para Inventor :</td>
    </tr>
    @foreach($data->inventor as $i)
    <tr>
      <td>{{$i->nama}}</td>
      <td>Warga Negara</td>
      <td>{{$i->kewarganegaraan}}</td>
    </tr>
    @endforeach
  </table>
  <table>
    <tr>
      <td colspan="3">Permohonan paten ini diajukan dengan/tidak dengan *) hak prioritas <sup>4</sup></td>
    </tr>
    <tr>
      <td>Negara</td>
      <td>Tanggal Penerimaan</td>
      <td>Nomor Prioritas</td>
    </tr>
    @if($data->hak_prioritas_id != null)
    <tr>
      <td>{{$data->hak_prioritas->nama}}</td>
      <td>{{$data->hak_prioritas->tanggal_penerimaan_permohonan_string}}</td>
      <td>{{$data->hak_prioritas->nomor_prioritas}}</td>
    </tr>
    @else
    <tr>
      <td>...............</td>
      <td>...............</td>
      <td>...............</td>
    </tr>
    @endif
  </table>


  <table>
    <tr >
      <td style="padding-bottom: 20pt" colspan="2">Dengan ini saya lampirkan:</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>surat kuasa</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>surat pengalihan hak atas penemuan</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>bukti pemilikan hak atas penemuan</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>bukti penunjukan negara tujuan (DOIEO)</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>dokumen prioritas dan terjemahannya</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>dokumen permohonan paten Intemasional/PCT</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>sertifikat penyimpanan jasad renik dan terjemahannya</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>dokumen lain (sebutkan)</td>
    </tr>

    <tr>
      <td style="padding-top: 15pt; padding-bottom: 20pt" colspan="3">dan 3 (tiga) rangkap invensi yang terdiri dari</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>uraian ......................... halaman</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>klaim ......................... halaman</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>abstrak</td>
    </tr>
    <tr>
      <td>[ v ]</td>
      <td>gambar ....................... buah</td>
    </tr>
  </table>


  <table>
    <tr>
      <td>Saya/kami usulkan, gambar nomor ........... dapat menyertai abstrak pada saat dilakukan pengumuman atas permohonan paten (UU No. 14 Tahun 2001)</td>
    </tr>
  </table>

  <p style="margin-bottom: 40pt">Demikian pennohonan paten ini saya/kami ajukan untuk dapat diproses lebih lanjut</p>

  <p style="float: right; text-align: center; width: 150pt;">
    Pemohon
    <br>
    <br>
    <br>
    <br>
    <br>
    {{$data->biodata->nama}}
  </p>

  <div class="clear: both">

  </div>
  <hr style="border: 1px #000 solid; clear:both;">

  <h3>Keterangan</h3>
  <p>
    <ol>
      <li>Jika lebih dari satu orang maka cukup satu saja yang dicanturnkan dalam fonnulir ini sedangkan lainnya harap ditulis pada lampiran tambahan.</li>
      <li>Adalah alamat kedinasan/surat-menyurat.</li>
      <li>Jika Konsultan Paten yang ditunjuk bekerja pada Badan Hukum tertentu yang bergerak dibidang konsultan paten maka sebutkan nama Badan Hukum yang bersangkutan.</li>
      <li>Jika lebih dari ruang yang disediakan agar ditulis pada lampiran tambahan.</li>
      <li>Berilah tanda silang padajenis dokumen yang saudara lampirkan.</li>
      <li>Jika permohonan paten diajukan oleh :
          <ul>
            <li>Lebih dari satu orang, maka setiap orang ditunjuk oleh kelompok/group</li>
            <li>Konsultan Paten maka berhak menandatangani adalah konsultan yang terdaftar di</li>
          </ul>
      </li>
    </ol>
  </p>

  <p>
    <b>Form No. OOl/P/HKI/2000</b>
    <br>Tidak boleh diperbanyak dengan foto copy.
  </p>

  <p></p>
@endsection
