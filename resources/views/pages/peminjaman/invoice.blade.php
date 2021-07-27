<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Cetak Transaksi {{ $item->member->nama_member }}</title>
    <link rel="shortcut icon" href="{{ asset('logo-codale.svg') }}">
    @include('includes.style')
</head>

<body>
    <div class="row justify-content-md-center mt-4">
        <div class="col-12 col-md-11">
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <img src="{{ asset('logo-codale.svg') }}" class="float float-right"
                                        height="70px">
                                    <h2>Pinjam Buku</h2>
                                    <h5>{{ $item->id_transaksi }}</h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <address>
                                            <strong>Nama Lengkap:</strong><br>
                                            {{ $item->member->name }}<br>
                                            {{ $item->member->alamat }}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <address>
                                            <strong>Tanggal Cetak:</strong><br>
                                            <?php echo date('Y-m-d'); ?>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Daftar Buku Pinjaman</div>
                                <p class="section-lead">Ini adalah daftar buku-buku yang dipinjam.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Judul Buku</th>
                                            <th class="text-center">Tanggal Pinjam</th>
                                            <th class="text-center">Tanggal Kembali</th>
                                            <th class="text-right">Status</th>
                                        </tr>
                                        @forelse ($data as $no => $item)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->buku->judul_buku }}</td>
                                                <td class="text-center">{{ $item->tgl_pinjam }}</td>
                                                <td class="text-center">{{ $item->tgl_kembali }}</td>
                                                <td class="text-right">
                                                    @if ($item->status == 'Tersedia')
                                                        Dikembalikan
                                                    @else
                                                        {{ $item->status }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    {{ $item->member->nama_member }} belum
                                                    pinjam buku</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 col-md-4 offset-md-8 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total Pinjam</div>
                                            <div class="invoice-detail-value">{{ $totalPinjam }} Buku</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total Donasi</div>
                                            <div class="invoice-detail-value">Rp{{ $totalDonasi }},00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    @include('includes.script')
</body>

</html>
