@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 shadow-sm border-0" style="border-radius: 12px;">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Daftar Siswa Terdaftar</h5>
        <form method="GET" class="d-flex" style="width: 300px;">
            <input type="text" name="search" class="form-control form-control-sm me-2"
                   placeholder="Cari nama/email/sekolah..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-sm btn-outline-secondary">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>

    @if ($siswa->isEmpty())
        <p class="text-muted mb-0">Belum ada siswa yang terdaftar.</p>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Sekolah</th>
                        <th>Tipe</th>
                        <th>Kelas</th>
                        <th>Provinsi</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->phone }}</td>
                            <td>{{ $s->school_name }}</td>
                            <td>{{ $s->school_type }}</td>
                            <td>{{ $s->class_level }}</td>
                            <td>{{ $s->province }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.siswa.edit', $s->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $siswa->links() }}
        </div>
    @endif

</div>

@endsection