@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Entri Transaksi Pembayaran</h3>

    <form action="{{ route('admin.pembayaran.store') }}" method="POST" id="formPembayaran">
        @csrf

        <div class="mb-3">
            <label for="id_pemakaian" class="form-label">Pilih Pemakaian</label>
            <select name="id_pemakaian" id="id_pemakaian" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach ($pemakaians as $p)
                    <option 
                        value="{{ $p->id }}"
                        data-total="{{ $p->biaya_beban_pemakai + $p->biaya_pemakaian }}"
                    >
                        {{ $p->no_kontrol }} - {{ $p->bulan }}/{{ $p->tahun }} ({{ $p->jumlah_pakai }} kWh)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar (Rp)</label>
            <input type="text" id="total_bayar" class="form-control" readonly>
            <input type="hidden" name="total_bayar" id="total_bayar_hidden">
        </div>        

        <div class="mb-3">
            <label for="uang_bayar_view" class="form-label">Uang Bayar (Rp)</label>
            <input type="text" id="uang_bayar_view" class="form-control" required>
            <input type="hidden" name="uang_bayar" id="uang_bayar">
        </div>
        
        <div class="mb-3">
            <label for="uang_kembali_view" class="form-label">Uang Kembali (Rp)</label>
            <input type="text" id="uang_kembali_view" class="form-control" readonly>
            <input type="hidden" name="uang_kembali" id="uang_kembali">
        </div>        

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectPemakaian = document.getElementById('id_pemakaian');
        const totalBayar = document.getElementById('total_bayar');
        const uangBayarView = document.getElementById('uang_bayar_view');
        const uangBayar = document.getElementById('uang_bayar');
        const uangKembaliView = document.getElementById('uang_kembali_view');
        const uangKembali = document.getElementById('uang_kembali');
        const totalBayarHidden = document.getElementById('total_bayar_hidden'); // hidden input

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        function parseAngka(rupiah) {
            return parseInt(rupiah.replace(/[Rp\s.]/g, '')) || 0;
        }

        selectPemakaian.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const total = selectedOption.getAttribute('data-total');

            if (total) {
                totalBayar.value = formatRupiah(parseInt(total));
                totalBayarHidden.value = total;
            } else {
                totalBayar.value = '';
                totalBayarHidden.value = '';
            }

            uangBayarView.value = '';
            uangBayar.value = '';
            uangKembaliView.value = '';
            uangKembali.value = '';
        });

        uangBayarView.addEventListener('input', function () {
            let input = parseAngka(this.value);
            uangBayar.value = input; // hidden input
            this.value = formatRupiah(input); // tampilkan format

            let total = parseInt(totalBayarHidden.value) || 0;
            let kembali = input - total;
            uangKembaliView.value = formatRupiah(kembali > 0 ? kembali : 0);
            uangKembali.value = kembali > 0 ? kembali : 0;
        });
    });
</script>
@endsection
