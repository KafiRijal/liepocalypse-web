@extends('template/main')

@section('content')
    <section class="section-one position-relative mb-5" id="home">
        <img class="blue-gardient8sa" src="{{ asset('assets/images/home-page/blue-gardient8.png') }}" alt="blue-gardient8">
        <img class="blue-gardient9sa" src="{{ asset('assets/images/home-page/blue-gardient9.png') }}" alt="blue-gardient9">

        <div class="container">
            <h1 class="bestAI text-center text-white">Riwayat Berita</h1>
            <p class="olut text-center text-light">
                Liepocalypse menggunakan AI untuk mendeteksi hoaks dan memverifikasi informasi dari berbagai sumber.
            </p>

            <div class="row mt-4 justify-content-center">
                <div class="col-12">
                    {{-- Box besar gabungan --}}
                    <div class="p-0 rounded-4 overflow-hidden" style="background-color: #1b2430;">
                        <div class="d-flex flex-column flex-md-row">

                            {{-- Sidebar kiri --}}
                            <div class="p-4 w-100 w-md-40"
                                style="max-width: 380px; background-color: #1b2430; border-right: 1px solid #2c3440;">
                                <form method="GET" action="{{ route('riwayat') }}" class="d-flex flex-column gap-2 mb-3">
                                    <input type="text" name="q" id="searchInput" value="{{ request('q') }}"
                                        class="form-control bg-secondary border-0 text-white"
                                        placeholder="Cari berita..." />
                                    <button type="submit" class="btn btn-primary w-100"
                                        style="background-color: #5c33ff; border: none;">
                                        Cari
                                    </button>
                                </form>

                                <ul class="list-unstyled d-flex flex-column gap-2 overflow-auto" style="max-height: 400px;">
                                    @forelse ($riwayats as $riwayat)
                                        <li onclick="showDetail({{ $riwayat->id }})"
                                            class="p-3 bg-secondary text-white rounded-3"
                                            style="cursor: pointer; word-wrap: break-word;">
                                            {{ Str::limit($riwayat->input_text, 80) }}
                                        </li>
                                    @empty
                                        <li class="text-muted">Tidak ada riwayat ditemukan.</li>
                                    @endforelse
                                </ul>

                                <div class="mt-3 d-flex justify-content-center">
                                    {{ $riwayats->withQueryString()->onEachSide(1)->links('vendor.pagination.custom') }}
                                </div>
                            </div>

                            {{-- Panel kanan --}}
                            <div id="riwayatDetail" class="p-4 flex-fill text-white" style="background-color: #1b2430;">
                                <p>Pilih riwayat di sebelah kiri untuk melihat detail.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('template_scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showDetail(id) {
            fetch(`/riwayat/${id}/detail`)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengambil data');
                    return response.json();
                })
                .then(data => {
                    let related = '';
                    try {
                        const links = Array.isArray(data.related_articles) ?
                            data.related_articles :
                            JSON.parse(data.related_articles);
                        related = links.map(link =>
                            `<p><a href="${link}" class="article-link" target="_blank">${link}</a></p>`
                        ).join('');
                    } catch (e) {
                        related = '<p class="text-danger">Gagal membaca artikel terkait</p>';
                    }

                    document.getElementById('riwayatDetail').innerHTML = `
                    <div class="result-hoax-box">
                        <h2 class="result-title">Hasil Deteksi Hoaks</h2>
                        <p class="result-item">
                            <span class="label">📝 <strong>Ringkasan:</strong></span><br>
                            ${data.summary}
                        </p>
                        <p class="result-item">
                            <span class="label">📌 <strong>Hasil Deteksi:</strong></span><br>
                            <span class="badge-result">${data.verdict}</span>
                        </p>
                        <div class="result-item">
                            <span class="label">🔗 <strong>Artikel Terkait:</strong></span><br>
                            ${related}
                        </div>
                        <div class="result-item" style="margin-top: 20px;">
                            <a href="/riwayat/${data.id}/pdf" class="btn btn-sm btn-outline-light" target="_blank">🖨 Unduh PDF</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(${data.id})">🗑 Hapus</button>
                        </div>
                    </div>
                `;
                })
                .catch(error => {
                    console.error('Gagal mengambil detail:', error);
                    document.getElementById('riwayatDetail').innerHTML =
                        `<p class="text-danger">Terjadi kesalahan saat mengambil detail riwayat.</p>`;
                });
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data riwayat ini akan dihapus permanen!",
                icon: 'warning',
                iconColor: '#FACC15',

                showCancelButton: true,
                confirmButtonText: '🗑 Ya, hapus!',
                cancelButtonText: 'Batal',

                confirmButtonColor: '#7F56D9',
                cancelButtonColor: '#64748B',
                background: '#1E1E2D',
                color: '#F9FAFB',
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/riwayat/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Terhapus!', 'Riwayat telah dihapus.', 'success');

                                const listItems = document.querySelectorAll('#historyList li');
                                listItems.forEach(item => {
                                    if (item.getAttribute('onclick') === `showDetail(${id})`) {
                                        item.remove();
                                    }
                                });

                                document.getElementById('riwayatDetail').innerHTML =
                                    `<p>Pilih riwayat di sebelah kiri untuk melihat detail.</p>`;
                            } else {
                                Swal.fire('Gagal!', data.message || 'Tidak bisa menghapus.', 'error');
                            }
                        })
                        .catch(err => {
                            Swal.fire('Gagal!', 'Terjadi kesalahan koneksi.', 'error');
                            console.error(err);
                        });
                }
            });
        }
    </script>
@endsection
