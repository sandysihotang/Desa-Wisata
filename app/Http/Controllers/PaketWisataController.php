<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PaketWisata;
use App\Models\PemesananPaket;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //PENGUNJUNG
    public function index()
    {
        $slider = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->take(3)->get();
        $slider->toArray();

        $list = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->paginate(9);
        return view('paket-wisata', compact('list', 'slider'));
    }

    public function viewPaket(PaketWisata $paket)
    {
        return view('paket-wisata-detail', compact('paket'));
    }

    public function riwayatPesanan($id)
    {
        $user = Auth::user();
        $listPesanan = PemesananPaket::where('akun_id', $user->id_user)->get();

        return view('riwayat-pemesanan', compact('listPesanan'));
    }

    public function viewDetailPesanan(PemesananPaket $pesanan)
    {
        return view('admin.view-pesanan', compact('pesanan'));
    }

    public function formBooking(PaketWisata $paket)
    {
       return view('booking-paket-wisata', compact('paket'));
    }

    public function saveBooking(Request $request, $paket)
    {
        $booking = new PemesananPaket;
        $booking->no_pesanan = 'KOD';
        $booking->tanggal_pesanan = Carbon::now();;
        $booking->nama_pemesan = $request->nama;
        $booking->email = $request->email;
        $booking->no_hp = $request->no_hp;
        $booking->check_in = $request->tanggal;
        $booking->pkt_wisata_id = $paket;
        $booking->status_pesanan = 1;
        if(Auth::check()){
            $user = Auth::user();
            $booking->akun_id = $user->id_user;
        }
        $booking->save();

        return redirect('/paket-wisata');
    }

    //ADMIN
    public function kelolaPaket()
    {
        $list = PaketWisata::paginate(10);
        return view('admin.paket-index', compact('list'));
    }

    public function viewPaketByAdmin(PaketWisata $paket)
    {
        return view('admin.paket-view', compact('paket'));
    }

    public function getPaketDetail($id)
    {
        $article = PaketWisata::find($id);
        return response()->json($article);
    }

    public function tambahPaket(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);

        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');
            // {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/paket', $name);
                $data = '/image/paket/'. $name;  // your folder path
                // $data = $name;
            // }
        }

        $Upload_model = new PaketWisata;
        $Upload_model->nama_paket = $request->nama;
        $Upload_model->file_foto = $data;
        $Upload_model->harga_paket = $request->harga;
        $Upload_model->jadwal = $request->jadwal;
        $Upload_model->harga_termasuk = $request->harga1;
        $Upload_model->harga_tidak_termasuk = $request->harga2;
        $Upload_model->itinerary = $request->itinerary;
        $Upload_model->keterangan = $request->tambahan;

        $Upload_model->save();

        return redirect('/kelola-paket-wisata')->with('success', 'Galeri berhasil ditambah');
    }

    public function editPaket($id)
    {
        $paket = PaketWisata::find($id);
        // dd($paket->harga_termasuk);
        return view('admin.paket-edit', compact('paket'));
    }

    public function saveEditPaket(Request $request, $id)
    {
        // dd($request);
        $paket = PaketWisata::find($id);
        $paket->nama_paket = $request->nama;
        $paket->harga_paket = $request->harga;

        $paket->jadwal = $request->jadwal;
        $paket->harga_termasuk = $request->harga1;
        $paket->harga_tidak_termasuk = $request->harga2;
        $paket->itinerary = $request->itinerary;
        $paket->keterangan = $request->tambahan;

        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');
            // {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/paket', $name);
                $data = '/image/paket/'. $name;  // your folder path
                // $data = $name;
            // }
            $paket->file_foto = $data;
        }

        $paket->save();

        return redirect('/kelola-paket-wisata');
    }

    public function hapusPaket(PaketWisata $paket)
    {
        PaketWisata::destroy($paket->id_pkt_wisata);
        return redirect('/kelola-paket-wisata');
    }

    //KELOLA PESANAN
    public function kelolaPesanan()
    {
        $list = PemesananPaket::paginate(10);
        return view('admin.pesanan-index', compact('list'));
    }

    public function viewPesananByAdmin(PemesananPaket $pesanan)
    {
        return view('admin.pesanan-view', compact('pesanan'));
    }

    public function tambahPesanan()
    {
        $paket = PaketWisata::all();
        return view('admin.pesanan-tambah', compact('paket'));
    }

    public function saveBookingByAdmin(Request $request)
    {
        $booking = new PemesananPaket;
        $booking->no_pesanan = 'KOD';
        $booking->tanggal_pesanan = Carbon::now();;
        $booking->nama_pemesan = $request->nama;
        $booking->email = $request->email;
        $booking->no_hp = $request->no_hp;
        $booking->check_in = $request->tanggal;
        $booking->pkt_wisata_id = $request->paket;
        $booking->status_pesanan = $request->pesanan;
        if(Auth::check()){
            $user = Auth::user();
            $booking->akun_id = $user->id_user;
        }
        $booking->save();

        return redirect('/kelola-paket-wisata')->with('success', 'Galeri berhasil ditambah');
    }

    public function statusSelesai(Request $request)
    {
        $pesanan = PemesananPaket::find($request->id);
        $pesanan->status_pesanan = 2;
        $pesanan->save();

        return redirect('/detail-pesanan/'.$request->id);
    }

    public function statusBatal(Request $request)
    {
        $pesanan = PemesananPaket::find($request->id);
        $pesanan->status_pesanan = 3;
        $pesanan->save();

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }
}
