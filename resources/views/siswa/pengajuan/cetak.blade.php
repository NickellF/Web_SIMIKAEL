<!DOCTYPE html>
<html>
<head>
    <title>Surat Pengajuan PKL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .content {
            margin-top: 20px;
        }
        .detail {
            margin-top: 20px;
        }
        .detail table {
            width: 100%;
            border-collapse: collapse;
        }
        .detail th, .detail td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SURAT PENGAJUAN PRAKTIK KERJA LAPANGAN (PKL)</h1>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $ajuanPkl->siswa->nama_siswa }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>: {{ $ajuanPkl->siswa->nis }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: {{ $ajuanPkl->siswa->kelas }}</td>
            </tr>
        </table>
    </div>

    <div class="detail">
        <h3>Detail Pengajuan PKL</h3>
        <table>
            <tr>
                <th>Industri</th>
                <th>Alamat</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
            </tr>
            <tr>
                <td>{{ $ajuanPkl->industri->nama_industri }}</td>
                <td>{{ $ajuanPkl->industri->alamat }}</td>
                <td>{{ \Carbon\Carbon::parse($ajuanPkl->tanggal_mulai)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($ajuanPkl->tanggal_selesai)->format('d M Y') }}</td>
            </tr>
        </table>
    </div>

    <div class="content" style="margin-top: 50px;">
        <p>Demikian surat pengajuan ini dibuat untuk dapat diproses lebih lanjut.</p>
        
        <div style="text-align: right; margin-top: 50px;">
            <p>
                {{ \Carbon\Carbon::now()->format('d M Y') }}<br>
                Pemohon,<br><br><br>
                {{ $ajuanPkl->siswa->nama_siswa }}
            </p>
        </div>
    </div>
</body>
</html>