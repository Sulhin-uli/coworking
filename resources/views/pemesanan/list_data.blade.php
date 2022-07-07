<?php $no=1; ?>
@foreach ($pemesanans as $pemesanan)
    <tr>
        <td>
            {{ $no++ }}
        </td>
        <td>
            {{ $pemesanan->kode_tipe }}
        </td>
        <td>
            {{ $pemesanan->nama_tipe }}
        </td>
        <td>
            {{ $pemesanan->harga }}
        </td>
        <td>
            @role('admin')
                <button class="btn btn-danger btn-sm" onclick="hapus({{ $pemesanan->id }})">Hapus</button>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalFormEdit" onclick="edit({{ $pemesanan->id }})">Edit</button>
            @endrole
        </td>
    </tr>
@endforeach

