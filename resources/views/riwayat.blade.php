@extends('template/main')

@section('content')
    <section class="section-one position-relative mb-5" id="home">
        <div class="container">
            <h1 class="bestAI">Riwayat Berita</h1>
            <p class="olut">
                Liepocalypse menggunakan AI untuk mendeteksi hoaks dan memverifikasi informasi dari berbagai sumber.
            </p>
            <div class="riwayat-layout mt-5">
                <aside class="sidebar">
                    {{-- Form Pencarian --}}
                    <form method="GET" action="{{ route('riwayat') }}" class="search-form"
                        style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 16px;">

                        <input type="text" name="q" id="searchInput" value="{{ request('q') }}"
                            placeholder="Cari berita..." />

                        <button type="submit"
                            style="width: 100%; padding: 10px; background: #6e00ff; border: none;
               border-radius: 8px; color: white; font-weight: bold; font-size: 14px;">
                            Cari
                        </button>
                    </form>

                    {{-- List Riwayat --}}
                    <ul id="historyList">
                        @forelse ($riwayats as $riwayat)
                            <li onclick="showDetail({{ $riwayat->id }})"
                                style="color: white; padding: 10px; border-radius: 8px;
                                       cursor: pointer; word-wrap: break-word; overflow-wrap: break-word; font-size: 14px;">
                                {{ Str::limit($riwayat->input_text, 80) }}
                            </li>
                        @empty
                            <li style="color: #ccc;">Tidak ada riwayat ditemukan.</li>
                        @endforelse
                    </ul>

                    {{-- Pagination --}}
                    <div class="pagination-container">
                        {{ $riwayats->withQueryString()->onEachSide(1)->links('vendor.pagination.custom') }}
                    </div>
                </aside>
                <main class="detail-panel">
                    <div id="riwayatDetail">
                        <p>Pilih riwayat di sebelah kiri untuk melihat detail.</p>
                    </div>
                </main>
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
