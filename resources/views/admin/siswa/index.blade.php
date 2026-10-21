
@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')

{{-- NOTIFIKASI BERHASIL --}}
@if (session('success'))
    <div id="toast-success" class="toast-notification toast-success">
        <div class="toast-icon">
            <i class="fa-solid fa-check"></i>
        </div>

        <div class="toast-content">
            <strong>Berhasil!</strong>
            <span>{{ session('success') }}</span>
        </div>

        <button type="button" class="toast-close" onclick="closeToast()">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
@endif

{{-- NOTIFIKASI ERROR --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- HEADER HALAMAN --}}
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <div>
        <h4 class="fw-bold mb-1">Kelola Siswa</h4>
        <p class="text-muted mb-0" style="font-size: 14px;">
            Kelola data siswa yang telah mendaftar di SIMPRODI
        </p>
    </div>

    <div class="stat-mini">
        <i class="fa-solid fa-users"></i>
        <span>{{ $siswa->total() }} Siswa Terdaftar</span>
    </div>
</div>

{{-- CARD DAFTAR SISWA --}}
<div class="card border-0 shadow-sm" style="border-radius: 16px;">

    <div class="p-4 pb-0">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

            <h6 class="mb-0 fw-bold">Daftar Siswa</h6>

            <div class="d-flex align-items-center gap-2 flex-wrap">

                {{-- PENCARIAN SISWA --}}
                <form method="GET" action="{{ route('admin.siswa.index') }}" class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        name="search"
                        placeholder="Cari nama, email, atau sekolah..."
                        value="{{ request('search') }}"
                    >
                </form>

                {{-- TOMBOL STATISTIK TOP 3 --}}
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    id="btnStatistikTop3"
                    data-url="{{ route('admin.siswa.statistik-top3') }}"
                >
                    <i class="fa-solid fa-chart-column me-1"></i>
                    Statistik Top 3
                </button>

                {{-- DROPDOWN EXPORT --}}
                <div class="dropdown">
                    <button
                        class="btn btn-primary dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="fa-solid fa-download me-1"></i>
                        Export Data
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('admin.siswa.export.excel') }}"
                            >
                                <i class="fa-solid fa-file-excel text-success me-2"></i>
                                Download Excel (.xlsx)
                            </a>
                        </li>

                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('admin.siswa.export.csv') }}"
                            >
                                <i class="fa-solid fa-file-csv text-primary me-2"></i>
                                Download CSV (.csv)
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    {{-- JIKA BELUM ADA SISWA --}}
    @if ($siswa->isEmpty())

        <div class="text-center py-5">
            <div
                class="mx-auto rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-3"
                style="width: 90px; height: 90px;"
            >
                <i class="fa-solid fa-user-slash text-primary" style="font-size: 36px;"></i>
            </div>

            <h6 class="fw-semibold mb-1">Belum Ada Siswa Terdaftar</h6>

            <p class="text-muted mb-0" style="max-width: 340px; margin: 0 auto;">
                Data siswa akan muncul di sini setelah ada yang mendaftar akun.
            </p>
        </div>

    @else

        {{-- TABEL SISWA --}}
        <div class="table-responsive px-2 pb-2">
            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th class="text-muted small">SISWA</th>
                        <th class="text-muted small">KONTAK</th>
                        <th class="text-muted small">SEKOLAH</th>
                        <th class="text-muted small">TIPE</th>
                        <th class="text-muted small">KELAS</th>
                        <th class="text-muted small">PROVINSI</th>
                        <th class="text-muted small text-end">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($siswa as $s)
                        <tr>

                            {{-- NAMA SISWA --}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="student-avatar">
                                        @if ($s->profile_photo)
                                            <img
                                                src="{{ asset('storage/' . $s->profile_photo) }}"
                                                alt="{{ $s->name }}"
                                                style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;"
                                            >
                                        @else
                                            {{ strtoupper(substr($s->name, 0, 1)) }}
                                        @endif
                                    </div>

                                    <span class="fw-semibold">{{ $s->name }}</span>
                                </div>
                            </td>

                            {{-- KONTAK --}}
                            <td>
                                <div style="font-size: 13.5px;">
                                    {{ $s->email }}
                                </div>

                                <div class="text-muted" style="font-size: 12.5px;">
                                    {{ $s->phone }}
                                </div>
                            </td>

                            {{-- SEKOLAH --}}
                            <td style="font-size: 13.5px;">
                                {{ $s->school_name }}
                            </td>

                            {{-- TIPE SEKOLAH --}}
                            <td>
                                <span class="badge-type">{{ $s->school_type }}</span>
                            </td>

                            {{-- KELAS --}}
                            <td>
                                <span class="badge-class">{{ $s->class_level }}</span>
                            </td>

                            {{-- PROVINSI --}}
                            <td style="font-size: 13.5px;">
                                {{ $s->province }}
                            </td>

                            {{-- AKSI --}}
                            <td class="text-end text-nowrap">

                                {{-- DOWNLOAD SERTIFIKAT --}}
                                @if ($s->tes_results_count > 0)
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-success btn-download-sertifikat"
                                        data-url="{{ route('admin.siswa.sertifikat', $s->id) }}"
                                        data-name="{{ $s->name }}"
                                        title="Download Sertifikat"
                                    >
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                @else
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-secondary"
                                        title="Belum mengerjakan tes"
                                        disabled
                                    >
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                @endif

                                {{-- TOP 3 JURUSAN PER SISWA --}}
                                @if ($s->tes_results_count > 0)
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-info btn-top3-jurusan"
                                        data-url="{{ route('admin.siswa.top3', $s->id) }}"
                                        data-name="{{ $s->name }}"
                                        title="Lihat Top 3 Jurusan"
                                    >
                                        <i class="fa-solid fa-chart-column"></i>
                                        <span class="d-none d-xl-inline">Top 3</span>
                                    </button>
                                @else
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-secondary"
                                        title="Siswa belum menyelesaikan tes"
                                        disabled
                                    >
                                        <i class="fa-solid fa-chart-column"></i>
                                        <span class="d-none d-xl-inline">Top 3</span>
                                    </button>
                                @endif

                                {{-- EDIT SISWA --}}
                                <a
                                    href="{{ route('admin.siswa.edit', $s->id) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit siswa"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                {{-- HAPUS SISWA --}}
                                <form
                                    action="{{ route('admin.siswa.destroy', $s->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Hapus siswa"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="px-4 pb-4">
            {{ $siswa->links() }}
        </div>

    @endif

    {{-- ===================================================== --}}
    {{-- MODAL TOP 3 JURUSAN PER SISWA                         --}}
    {{-- ===================================================== --}}
    <div class="modal fade" id="modalTop3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <div
                    class="modal-header text-white"
                    style="background: linear-gradient(135deg, #173b70, #2c5cf5);"
                >
                    <div>
                        <h5 class="modal-title fw-bold">Top 3 Jurusan</h5>
                        <small id="top3NamaSiswa"></small>
                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Tutup"
                    ></button>
                </div>

                <div class="modal-body" id="top3Isi">
                    <div class="text-center py-3">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                        Memuat hasil tes...
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ===================================================== --}}
    {{-- MODAL STATISTIK TOP 3 SELURUH SISWA                   --}}
    {{-- ===================================================== --}}
    <div class="modal fade" id="modalStatistikTop3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow">

                <div
                    class="modal-header text-white"
                    style="background: linear-gradient(135deg, #173b70, #2c5cf5);"
                >
                    <div>
                        <h5 class="modal-title fw-bold">
                            Statistik Popularitas Jurusan
                        </h5>

                        <small>
                            Frekuensi kemunculan jurusan pada Top 3 setiap siswa
                        </small>
                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Tutup"
                    ></button>
                </div>

                <div class="modal-body" id="statistikTop3Isi">
                    <div class="text-center py-4">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                        Memuat statistik...
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

{{-- ========================================================= --}}
{{-- CSS HALAMAN                                               --}}
{{-- ========================================================= --}}
<style>
    .stat-mini {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #eaf0ff;
        color: #173b70;
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 13.5px;
        font-weight: 600;
    }

    .search-box {
        position: relative;
        width: 280px;
    }

    .search-box i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 13px;
    }

    .search-box input {
        width: 100%;
        padding: 9px 14px 9px 38px;
        border: 1.5px solid #e2e6ee;
        border-radius: 30px;
        font-size: 13.5px;
        background: #f9fafc;
        transition: 0.2s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #2c5cf5;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(44, 92, 245, 0.1);
    }

    .student-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #173b70, #2c5cf5);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        flex-shrink: 0;
        overflow: hidden;
    }

    .badge-type {
        background: #fff4e5;
        color: #b8720a;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .badge-class {
        background: #eaf0ff;
        color: #173b70;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .table > :not(caption) > * > * {
        border-bottom-color: #f0f2f5;
    }

    .toast-notification.toast-error .toast-icon {
        background: #dc3545;
        color: #fff;
    }

    #diagramTop3 .progress {
        background-color: #e9eef7;
        border-radius: 20px;
        overflow: hidden;
    }

    #diagramTop3 .progress-bar {
        background: linear-gradient(90deg, #173b70, #2c5cf5);
        border-radius: 20px;
        transition: width 0.5s ease;
    }

    #modalStatistikTop3 .statistik-card {
        border: 1px solid #edf0f5;
        border-radius: 12px;
    }

    @media (max-width: 768px) {
        .search-box {
            width: 100%;
        }

        .search-box input {
            box-sizing: border-box;
        }
    }
</style>

{{-- ========================================================= --}}
{{-- JAVASCRIPT HALAMAN                                        --}}
{{-- ========================================================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    console.log('Script Kelola Siswa aktif');

    // =====================================================
    // FUNGSI NOTIFIKASI
    // =====================================================
    function showToast(type, title, message) {
        const toast = document.createElement('div');
        toast.className = 'toast-notification toast-' + type;

        toast.innerHTML = `
            <div class="toast-icon">
                <i class="fa-solid ${type === 'success' ? 'fa-check' : 'fa-xmark'}"></i>
            </div>
            <div class="toast-content">
                <strong></strong>
                <span></span>
            </div>
            <button type="button" class="toast-close" aria-label="Tutup">
                <i class="fa-solid fa-xmark"></i>
            </button>
        `;

        toast.querySelector('strong').textContent = title;
        toast.querySelector('span').textContent = message;

        toast.querySelector('.toast-close').addEventListener('click', function () {
            toast.remove();
        });

        document.body.appendChild(toast);

        setTimeout(function () {
            toast.remove();
        }, 4000);
    }

    // =====================================================
    // TOP 3 JURUSAN PER SISWA
    // =====================================================
    document.querySelectorAll('.btn-top3-jurusan').forEach(function (btn) {

        btn.addEventListener('click', async function () {

            const url = btn.dataset.url;
            const nama = btn.dataset.name;
            const isi = document.getElementById('top3Isi');
            const namaSiswa = document.getElementById('top3NamaSiswa');
            const modalElement = document.getElementById('modalTop3');

            if (!isi || !namaSiswa || !modalElement) {
                console.error('Elemen modal Top 3 tidak ditemukan.');
                return;
            }

            namaSiswa.textContent = nama;
            isi.innerHTML = `
                <div class="text-center py-3">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    Memuat hasil tes...
                </div>
            `;

            bootstrap.Modal.getOrCreateInstance(modalElement).show();

            try {
                const response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Gagal mengambil hasil tes.');
                }

                if (!Array.isArray(data.top3) || data.top3.length === 0) {
                    isi.innerHTML = `
                        <p class="text-muted text-center mb-0">
                            Belum ada hasil tes.
                        </p>
                    `;
                    return;
                }

                // Bangun elemen dengan textContent agar nama jurusan
                // tidak ditafsirkan sebagai HTML.
                isi.replaceChildren();

                data.top3.forEach(function (item, index) {
                    const baris = document.createElement('div');
                    baris.className =
                        'd-flex justify-content-between align-items-center border rounded-3 p-3 mb-2';

                    const bagianNama = document.createElement('div');
                    bagianNama.className = 'me-3';

                    const namaJurusan = document.createElement('div');
                    namaJurusan.className = 'fw-bold';
                    namaJurusan.textContent =
                        (index + 1) + '. ' + (item.nama_jurusan || 'Jurusan tidak diketahui');

                    const persentase = document.createElement('span');
                    persentase.className = 'badge bg-primary rounded-pill';

                    const nilai = Number(item.persentase);
                    persentase.textContent =
                        (Number.isFinite(nilai) ? nilai : 0).toFixed(2) + '%';

                    bagianNama.appendChild(namaJurusan);
                    baris.append(bagianNama, persentase);
                    isi.appendChild(baris);
                });

            } catch (error) {
                console.error('Gagal memuat Top 3:', error);

                isi.innerHTML = `
                    <div class="alert alert-danger mb-0">
                        Gagal memuat Top 3 jurusan. Silakan coba lagi.
                    </div>
                `;
            }
        });
    });

    // =====================================================
    // STATISTIK TOP 3 SELURUH SISWA
    // =====================================================
    const btnStatistik = document.getElementById('btnStatistikTop3');

    if (btnStatistik) {

        btnStatistik.addEventListener('click', async function () {

            const isi = document.getElementById('statistikTop3Isi');
            const modalElement = document.getElementById('modalStatistikTop3');

            if (!isi || !modalElement) {
                console.error('Elemen modal Statistik Top 3 tidak ditemukan.');
                return;
            }

            isi.innerHTML = `
                <div class="text-center py-4">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    Memuat statistik...
                </div>
            `;

            bootstrap.Modal.getOrCreateInstance(modalElement).show();

            try {
                const response = await fetch(btnStatistik.dataset.url, {
                    headers: {
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Gagal mengambil statistik.');
                }

                if (!Array.isArray(data.jurusan) || data.jurusan.length === 0) {
                    isi.innerHTML = `
                        <div class="text-center py-4">
                            <i class="fa-solid fa-chart-column text-muted mb-3"
                               style="font-size: 36px;"></i>
                            <p class="text-muted mb-0">
                                Belum ada data hasil tes untuk ditampilkan.
                            </p>
                        </div>
                    `;
                    return;
                }

                // Pastikan nilai yang dipakai untuk statistik berupa angka.
                const jumlahSiswaTes = Number(data.jumlah_siswa_tes) || 0;
                const jumlahKemunculan = Number(data.jumlah_kemunculan) || 0;
                const jumlahJurusan = Number(data.jumlah_jurusan) || 0;

                const maksimum = Math.max(
                    ...data.jurusan.map(function (item) {
                        return Number(item.jumlah) || 0;
                    })
                );

                isi.innerHTML = `
                    <div class="row g-3 mb-4">

                        <div class="col-md-4">
                            <div class="statistik-card p-3 bg-light h-100">
                                <small class="text-muted">Siswa Ikut Tes</small>
                                <h3 class="fw-bold mb-0">${jumlahSiswaTes}</h3>
                                <small class="text-muted">Siswa dengan hasil tes</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="statistik-card p-3 bg-light h-100">
                                <small class="text-muted">Kemunculan Top 3</small>
                                <h3 class="fw-bold mb-0">${jumlahKemunculan}</h3>
                                <small class="text-muted">Total jurusan yang dihitung</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="statistik-card p-3 bg-light h-100">
                                <small class="text-muted">Jurusan Unik</small>
                                <h3 class="fw-bold mb-0">${jumlahJurusan}</h3>
                                <small class="text-muted">Jurusan berbeda</small>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">Jurusan Paling Sering Muncul</h6>
                        <p class="text-muted small mb-0">
                            Setiap kemunculan dalam Top 3 bernilai satu poin.
                        </p>
                    </div>

                    <div id="diagramTop3"></div>
                `;

                const diagram = document.getElementById('diagramTop3');

                data.jurusan.forEach(function (item, index) {

                    const jumlahNilai = Number(item.jumlah) || 0;
                    const lebar = maksimum > 0
                        ? (jumlahNilai / maksimum) * 100
                        : 0;

                    const baris = document.createElement('div');
                    baris.className = 'mb-3';

                    const kepala = document.createElement('div');
                    kepala.className =
                        'd-flex justify-content-between align-items-center gap-2 mb-1';

                    const nama = document.createElement('span');
                    nama.className = 'fw-semibold';
                    nama.textContent =
                        (index + 1) + '. ' + (item.nama_jurusan || 'Jurusan tidak diketahui');

                    const jumlah = document.createElement('span');
                    jumlah.className = 'badge bg-primary rounded-pill flex-shrink-0';
                    jumlah.textContent = jumlahNilai + ' kali';

                    kepala.append(nama, jumlah);

                    const track = document.createElement('div');
                    track.className = 'progress';
                    track.style.height = '12px';

                    const bar = document.createElement('div');
                    bar.className = 'progress-bar';
                    bar.style.width = lebar + '%';
                    bar.setAttribute('role', 'progressbar');
                    bar.setAttribute('aria-valuenow', String(jumlahNilai));
                    bar.setAttribute('aria-valuemin', '0');
                    bar.setAttribute('aria-valuemax', String(maksimum));
                    bar.setAttribute(
                        'aria-label',
                        (item.nama_jurusan || 'Jurusan') + ': ' + jumlahNilai + ' kemunculan'
                    );

                    track.appendChild(bar);
                    baris.append(kepala, track);
                    diagram.appendChild(baris);
                });

            } catch (error) {
                console.error('Gagal memuat statistik Top 3:', error);

                isi.innerHTML = `
                    <div class="alert alert-danger mb-0">
                        Gagal memuat statistik. Periksa koneksi dan route,
                        lalu coba lagi.
                    </div>
                `;
            }
        });
    }

    // =====================================================
    // DOWNLOAD SERTIFIKAT
    // =====================================================
    document.querySelectorAll('.btn-download-sertifikat').forEach(function (btn) {

        btn.addEventListener('click', function () {
            const url = btn.dataset.url;

            if (url) {
                window.location.href = url;
            }
        });
    });

});
</script>

@endsection
