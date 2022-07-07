<?php $no=1; ?>
@foreach ($users as $user)
    <tr>
        <td>
            {{ $no++ }}
        </td>
        <td>
            {{ $user->name }}
        </td>
        <td>
            {{ $user->email }}
        </td>
        <td>
            {{ $user->password }}
        </td>
        <td>
            {{ $user->getRoleNames()->first() }}
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="hapus({{ $user->id }})">Hapus</button>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalFormEdit" onclick="edit({{ $user->id }})">Edit</button>
        </td>
    </tr>
@endforeach

