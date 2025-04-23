<div class="py-2">

    <div class="font-bold text-slate-700">Transaksi</div>
    <x-sidebar.link route="input-pemasukan" wire:navigate />
    <x-sidebar.link route="input-pembayaran-siswa" wire:navigate />
    <x-sidebar.link route="input-pengeluaran" wire:navigate />

    <div class="mt-3 font-bold text-slate-700">Kas</div>
    <x-sidebar.link route="kas-bulanan" wire:navigate />
    <x-sidebar.link route="kas-tahunan" wire:navigate />

    <div class="mt-3 font-bold text-slate-700">Pengaturan</div>
    <x-sidebar.link route="atur-kategori-pemasukan" wire:navigate />
    <x-sidebar.link route="atur-kategori-pengeluaran" wire:navigate />
    <x-sidebar.link route="atur-tagihan-siswa" wire:navigate />
    <x-sidebar.link route="atur-status-tagihan-siswa" wire:navigate />
    
    <div class="mt-3 font-bold text-slate-700">Penggajian</div>
    <x-sidebar.link route="data-pengguna" wire:navigate />
    <x-sidebar.link route="upload-gaji" wire:navigate />

    <div class="mt-3 font-bold text-slate-700">Rekap Pemasukan</div>
    <x-sidebar.link route="data-pemasukan" wire:navigate />
    <x-sidebar.link route="data-pembayaran-siswa" wire:navigate />
    <x-sidebar.link route="rekap-harian-pemasukan" wire:navigate />
    <x-sidebar.link route="rekap-tahunan-pemasukan" wire:navigate />

    <div class="mt-3 font-bold text-slate-700">Rekap Pengeluaran</div>
    <x-sidebar.link route="data-pengeluaran" wire:navigate />
    <x-sidebar.link route="rekap-harian-pengeluaran" wire:navigate />
    <x-sidebar.link route="rekap-tahunan-pengeluaran" wire:navigate />

    <div class="mt-3 font-bold text-slate-700">Siswa</div>
    <x-sidebar.link route="print-pembayaran-pondok" wire:navigate />
    <x-sidebar.link route="rekap-pembayaran-per-adm" wire:navigate />
    <x-sidebar.link route="rekap-pembayaran-siswa" wire:navigate />
    <x-sidebar.link route="tagihan-per-bulan" wire:navigate />
    <x-sidebar.link route="tagihan-per-kelas" wire:navigate />

    <div class="mt-3 font-bold text-slate-700">Data Terhapus</div>
    <x-sidebar.link route="data-pemasukan-terhapus" wire:navigate />
    <x-sidebar.link route="data-pembayaran-siswa-terhapus" wire:navigate />
    <x-sidebar.link route="data-pengeluaran-terhapus" wire:navigate />


</div>
