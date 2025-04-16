<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\pembayaran;
use App\Models\penerbangan;
use App\Models\tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function landing()
    {
        return view('customer.landingPage');
    }
    //
    public function index()
    {
        $data = [
            'title' => 'home',
            'penerbangan' => penerbangan::latest()->get(),
        ];
        return view('customer.index', $data);
    }
    public function search()
    {
        $data = [
            'title' => 'search',
            'penerbangan' => penerbangan::withCount('tiketTersedia')->having('tiket_tersedia_count', '>', 0)->get(),
        ];
        return view('customer.searchTiket', $data);
    }
    public function searchTiket(Request $request)
    {
        // dd($request->all());

        $penerbangan = penerbangan::where('asal', 'LIKE', '%' . $request->asal . '%')
            ->where('tujuan', 'LIKE', '%' . $request->tujuan . '%')
            ->where('tanggalBerangkat', 'LIKE', '%' . $request->date . '%')->withCount('tiketTersedia')->having('tiket_tersedia_count', '>', 0)
            ->get();
        $data = [
            'title' => 'search',
            'penerbangan' => $penerbangan,
        ];
        return view('customer.searchTiket', $data);
    }
    public function booking(Request $request)
    {
        // dd($request);
        $booking = booking::create([
            'idUser' => Auth::user()->id,
            'idPenerbangan' => $request->id,
            'jumlah' => $request->jumlah_tiket,
            'totalHarga' => $request->totalHarga,
            'status' => 'menunggu dibayar'
        ]);
        $ids = tiket::where('status', 'tersedia')->where('idPenerbangan', $request->id)->orderBy('no', 'asc')->limit($request->jumlah_tiket)->pluck('id');
        tiket::whereIn('id', $ids)->update([
            'idUser' => Auth::user()->id,
            'status' => 'dipesan',
            'id_booking' => $booking->id
        ]);
        return redirect()->to('customer/searchTiket')->with('success', 'booking berhasil');
    }
    public function tiket()
    {
        $tiket = tiket::with(['penerbangan', 'user', 'booking'])->join('penerbangans', 'tikets.idPenerbangan', '=', 'penerbangans.id')->where('idUser', Auth::user()->id)->orderBy('penerbangans.tanggalBerangkat', 'desc')->select('tikets.*')->get();
        $data = [
            'title' => 'tiket',
            'tiket' => $tiket
        ];
        return view('customer.tiket', $data);
    }
    public function mybooking()
    {
        $booking = booking::with(['user', 'penerbangan'])->where('idUser', Auth::user()->id)->get();
        $data = [
            'title' => 'booking',
            'booking' => $booking
        ];
        return view('customer.booking', $data);
    }
    public function detailBooking($id)
    {
        $data = [
            'title' => 'booking',
            'booking' => booking::with(['user', 'penerbangan'])->where('idUser', Auth::user()->id)->find($id),
            'tiket' => tiket::with('penerbangan')->where('idUser', Auth::user()->id)->where('id_booking', $id)->get()
        ];
        return view('customer.bookingDetail', $data);
    }

    public function postPembayaran(Request $request)
    {
        $pembayaran = pembayaran::create([
            'idBooking' => $request->idBooking,
            'metodePembayaran' => $request->metodePembayaran
        ]);
        if ($pembayaran) {
            $booking = booking::findOrFail($request->idBooking);
            $ids = tiket::where('idPenerbangan', $request->id)->where('id_booking', $request->idBooking)->pluck('id');
            $booking->update([
                'status' => 'dibayar'
            ]);
            tiket::whereIn('id', $ids)->update([
                'status' => 'dibayar'
            ]);
            return redirect()->to('customer/mybooking');
        }
    }
    public function postBeli(Request $request)
    {
        $booking = booking::create([
            'idUser' => Auth::user()->id,
            'idPenerbangan' => $request->id,
            'jumlah' => $request->jumlah_tiket,
            'totalHarga' => $request->totalHarga,
            'status' => 'dibayar'
        ]);
        $ids = tiket::where('status', 'tersedia')->where('idPenerbangan', $request->id)->orderBy('no', 'asc')->limit($request->jumlah_tiket)->pluck('id');
        tiket::whereIn('id', $ids)->update([
            'idUser' => Auth::user()->id,
            'status' => 'dibayar',
            'id_booking' => $booking->id
        ]);
        $pembayaran = pembayaran::create([
            'idBooking' => $booking->id,
            'metodePembayaran' => $request->metodePembayaran
        ]);
        return redirect()->to('customer/searchTiket')->with('success', 'berhasil membeli tiket');
    }
    public function history()
    {
        $data = [
            'title' => 'history',
            'pembayaran' => pembayaran::with(['booking', 'booking.penerbangan', 'booking.tiket'])->get(),
        ];
        return view('customer.history', $data);
    }
}
