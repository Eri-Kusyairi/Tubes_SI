<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Daftar;
use App\Models\diklat;
use App\Models\TbKelas;
use App\Models\TbMapel;
use App\Models\TbNilai;
use App\Models\TbPegawai;
use App\Models\TbPengajar;
use App\Models\TbPengguna;
use App\Models\Rute;
use App\Models\Outlet;
use App\Models\Pengiriman;
use App\Models\KategoriBarang;
use App\Models\JadwalPengiriman;
use App\Models\StokBarang;
use App\Models\Supir;
use PDF;

class ExportController extends Controller
{
    public function absensiPDF()
    {
        $absensi = Absensi::all();

        $pdf = PDF::loadView('pdf.absensi', compact('absensi'));
        return $pdf->download('laporan-absensi.pdf');
    }

    public function DaftarPDF()
    {
        $Daftar = Daftar::all();

        $pdf = PDF::loadView('pdf.Daftar', compact('Daftar'));
        return $pdf->download('laporan-Daftar.pdf');
    }

    public function TbKelasPDF()
    {
        $TbKelas = TbKelas::all();

        $pdf = PDF::loadView('pdf.TbKelas', compact('TbKelas'));
        return $pdf->download('laporan-TbKelas.pdf');
    }

    public function pengajarPDF()
    {
        $pengajar = Tbpengajar::all();

        $pdf = PDF::loadView('pdf.pengajar', compact('pengajar'));
        return $pdf->download('laporan-pengajar.pdf');
    }

    public function pegawaiPDF()
    {
        $pegawais = TbPegawai::all();

        $pdf = PDF::loadView('pdf.pegawais', compact('pegawais'));
        return $pdf->download('laporan-pegawais.pdf');
    }

    public function jenisdiklatPDF()
    {
        $jenisdiklat = diklat::all();

        $pdf = PDF::loadView('pdf.jenisdiklat', compact('jenisdiklat'));
        return $pdf->download('laporan-jenisdiklat.pdf');
    }

    public function mapelPDF()
    {
        $mapel = TbMapel::all();

        $pdf = PDF::loadView('pdf.mapel', compact('mapel'));
        return $pdf->download('laporan-mapel.pdf');
    }

    public function nilaiPDF()
    {
        $nilai = TbNilai::all();
        $pdf = PDF::loadView('pdf.nilai', compact('nilai'));
        return $pdf->download('laporan-nilai.pdf');
    }
}