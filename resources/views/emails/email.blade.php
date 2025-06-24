<!DOCTYPE html>
<html>
<head>
    <title>Nomor Tiket Pengaduan</title>
</head>
<body>
    <p>Halo {{ $report->user->name }},</p>

    <p>Berikut adalah nomor tiket pengaduan Anda:</p>

    <h2>{{ $report->ticket_number }}</h2>

    <p>Silakan simpan nomor ini untuk keperluan tindak lanjut.</p>

    <br>
    <p>Terima kasih telah mengirimkan laporan.</p>
</body>
</html>
