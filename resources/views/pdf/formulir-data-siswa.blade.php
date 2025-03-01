<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            position: relative;
            font-size: 18px;
        }
        .container {
            width: 100%;
            padding: 20px;
            margin: auto;
            position: relative;
            z-index: 1;
        }
        h2 {
            text-align: left;
            border-left: 5px solid red;
            padding-left: 10px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            vertical-align: top;
        }
        .section-title {
            font-weight: bold;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            opacity: 0.1;
            z-index: -1;
        }
        .red-box {
            border: 1px solid red;
            padding: 10px;
            color: red;
            font-weight: bold;
        }
        .red-box td {
            border-right: 1px solid red;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- Watermark -->
    <img src="{{ public_path('images.png') }}" class="watermark">

    <div class="container">
        <h2>Formulir Data Siswa</h2>
        <table>
            <tr>
                <td width="30%">Nama Siswa</td><td>: {{ $data->siswa->name }}</td>
            </tr>
            <tr>
                <td>Alamat</td><td>: {{ $data->siswa->alamat . " No." . $data->siswa->no_alamat . ", " . $data->siswa->desa->nama . ", " . $data->siswa->kecamatan->nama . ", " . $data->siswa->kabupaten->nama }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td><td>: {{ $data->siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Nama Orang Tua/Wali</td><td>: {{ $data->wali->name }}</td>
            </tr>
            <tr>
                <td>No. HP Orang Tua</td><td>: {{ $data->wali->no_telp }}</td>
            </tr>
            <tr>
                <td>Nama Sekolah</td><td>: {{ $data->sekolah->nama }}</td>
            </tr>
            <tr>
                <td>Jurusan</td><td>: {{ $data->jurusan }}</td>
            </tr>
            {{-- <tr>
                <td>NIS</td><td>: {{ $data-> }}</td>
            </tr> --}}
            <tr>
                <td>Alamat Sekolah</td><td>: {{ $data->sekolah->alamat }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td><td>: {{ $data->sekolah->kecamatan->nama }}</td>
            </tr>
            <tr>
                <td>Kabupaten/Kota</td><td>: {{ $data->sekolah->kabupaten->nama }}</td>
            </tr>
        </table>

        <p><strong>Persoalan pendidikan yang dihadapi:</strong></p>
        <table>
            <tr>
                <td><input type="checkbox" {{ $data->persoalan_pendidikan_id == 1 ? 'checked' : '' }}> Pendaftaran Masuk Sekolah</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ $data->persoalan_pendidikan_id == 2 ? 'checked' : '' }}> Pendaftaran Ulang</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ $data->persoalan_pendidikan_id == 3 ? 'checked' : '' }}> SPP</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ $data->persoalan_pendidikan_id == 4 ? 'checked' : '' }}> Fasilitas Penunjang Pendidikan</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ $data->persoalan_pendidikan_id == 5 ? 'checked' : '' }}> Pengambilan Ijazah</td>
            </tr>
        </table>

        <p style="color: red; font-weight: bold;">Relawan Pendamping:</p>
        <table class="red-box">
            <tr>
                <td width="50%">Nama : {{ $data->relawan_pendamping->relawan->name }}</td>
                <td style="text-align: center;">Tanda tangan relawan pendamping:</td>
            </tr>
            <tr>
                <td>No. Anggota : {{ $data->relawan_pendamping->no_anggota }}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">(____________________)</td>
            </tr>
        </table>
    </div>
</body>
</html>
