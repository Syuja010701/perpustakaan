<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <h1>Data Peminjaman</h1>
    <table class="table table-bordered" width="50%" style="table-layout:fixed;">
        <tr>
            <th class="text-center fs-7">No</th>
            <th class="text-center fs-7">Buku</th>
            <th class="text-center fs-7">Telat Pengembalian</th>
            <th class="text-center fs-7">Denda</th>
            <th class="text-center fs-7">Status</th>
            <th class="text-center fs-7">Tanggal Kembali</th>
            <th class="text-center fs-7">Dipinjam Pada</th>
            <th class="text-center fs-7">Dikembalikan Pada</th>
        </tr>
        @foreach ($peminjaman as $item)
            <tr>
                <td class="text-center fs-7">{{ $loop->iteration }}</td>

                <td class="text-center fs-7">{{ $item->judul }}</td>
                <td class="text-center fs-7">{{ $item->telat_pengembalian }}</td>
                <td class="text-center fs-7">
                    {{ $item->denda < 0 ? '0' : $item->denda }}</td>
                <td class="text-center fs-7">
                    {{ $item->status === 1 ? 'Dikembalikan' : 'Dipinjam' }}</td>
                <td class="text-center fs-7">{{ $item->tanggal_kembali }}</td>
                <td class="text-center fs-7">{{ $item->created_at }}</td>
                <td class="text-center fs-7">
                    {{ $item->status === 1 ? $item->updated_at : '' }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
