<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Kuasa Pendampingan Pasien</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 16px; padding: 20px }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 5px; }
    </style>
</head>
<body>
    <h2 style="text-align: center;"><u>SURAT KUASA PENDAMPINGAN PASIEN</u></h2>

    <p>Yang bertanda tangan di bawah ini, saya:</p>
    <table>
        <tr><td width="110px">Nama</td><td>: {{ $surat_kuasa->pasien->name }}</td></tr>
        <tr><td>NIK</td><td>: {{ $surat_kuasa->pasien->nik }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $surat_kuasa->pasien->alamat . " No." . $surat_kuasa->pasien->no_alamat . ", " . $surat_kuasa->pasien->desa->nama . ", " . $surat_kuasa->pasien->kecamatan->nama . ", " . $surat_kuasa->pasien->kabupaten->nama }}</td></tr>
        <tr><td>Telepon/HP</td><td>: {{ $surat_kuasa->pasien->no_telp }}</td></tr>
    </table>

    <p>Selaku keluarga dari pasien:</p>
    <table>
        <tr><td width="110px">Nama</td><td>: {{ $surat_kuasa->pemberi_kuasa->name }}</td></tr>
        <tr><td>Penyakit</td><td>: {{ $surat_kuasa->penyakit }}</td></tr>
    </table>

    <p>Dengan ini memberikan kuasa kepada Relawan Pendamping sebagai berikut:</p>
    {{-- @foreach($pasien->relawan as $relawan) --}}
    <table>
        <tr><td width="30px">1.</td><td width="80px">Nama</td><td>: {{ $surat_kuasa->penerima_kuasa_1->relawan->name }}</td></tr>
        <tr><td></td><td>Jabatan</td><td>: {{ $surat_kuasa->penerima_kuasa_1->jabatan }}</td></tr>
        <tr><td></td><td>NIK</td><td>: {{ $surat_kuasa->penerima_kuasa_1->nik_relawan }}</td></tr>
        <tr><td></td><td>Telepon/HP</td><td>: {{ $surat_kuasa->penerima_kuasa_1->relawan->no_telp }}</td></tr>
    </table>
    {{-- @endforeach --}}
    @if($surat_kuasa->nik_penerima_kuasa_2)
    <table>
        <tr><td width="30px">2.</td><td width="80px">Nama</td><td>: {{ $surat_kuasa->penerima_kuasa_2->relawan->name }}</td></tr>
        <tr><td></td><td>Jabatan</td><td>: {{ $surat_kuasa->penerima_kuasa_2->jabatan }}</td></tr>
        <tr><td></td><td>NIK</td><td>: {{ $surat_kuasa->penerima_kuasa_2->nik_relawan }}</td></tr>
        <tr><td></td><td>Telepon/HP</td><td>: {{ $surat_kuasa->penerima_kuasa_2->relawan->no_telp }}</td></tr>
    </table>
    @endif

    <p>Baik secara sendiri-sendiri atau bersama-sama, untuk mengurus dan mendampingi pasien, dalam mendapat hak layanan kesehatan sebagaimana peraturan hukum dan UU Kesehatan yang berlaku.</p>

    <p>Demikian surat ini kami buat agar dapat dipergunakan sebagaimana mestinya.</p>
    <br><br>

    <p style="text-align: right;">_____________, ___/___/20___</p>

    <table>
        <tr>
            <td style="text-align: center;">Yang memberi kuasa</td>
            <td style="text-align: center;">Yang diberi kuasa</td>
            <td style="text-align: center;">Yang diberi kuasa</td>
        </tr>
        <tr>
            <td style="text-align: center; font-size:10px; color: rgba(22, 20, 20, 0.3)">Materai Rp.10000</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <br><br><br><br>
        <tr>
            <td style="text-align: center;">(_____________________)</td>
            <td style="text-align: center;">(_____________________)</td>
            <td style="text-align: center;">(_____________________)</td>
        </tr>
    </table>
</body>
</html>
