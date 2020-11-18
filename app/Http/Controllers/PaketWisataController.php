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
        $list = PaketWisata::paginate(9);
        return view('paket-wisata', compact('list'));
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
        // $user = Auth::user();
        // dd($user->id_user);
        // $listPesanan = PemesananPaket::where('akun_id', $user->id_user)->get();
        // dd($listPesanan);

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
        // $booking->alamat = $request->nama;
        $booking->no_hp = $request->no_hp;
        // $booking->jumlah_paket = $request->nama;
        $booking->check_in = $request->tanggal;
        $booking->pkt_wisata_id = $paket;
        $booking->status_pesanan = 1;
        // $booking->check_out = $request->nama;
        // $kategori->file_foto_sampul = $data;
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
        $Upload_model = new PaketWisata;
        $Upload_model->nama_paket = $request->judul;
        $Upload_model->harga_paket = $request->harga_paket;
        $Upload_model->jadwal = $request->jadwal;
        $Upload_model->harga_termasuk = $request->harga1;
        $Upload_model->harga_tidak_termasuk = $request->harga2;
        $Upload_model->itinerary = $request->itinerary;
        $Upload_model->keterangan = $request->tambahan;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = public_path() . '/image/paket/' . $filename;
            file_put_contents($path, $decode);
            $Upload_model->file_foto = '/image/paket/' . $filename;
        }

        $Upload_model->save();

        return redirect('/kelola-paket')->with('success', 'Galeri berhasil ditambah');
    }

    public function editPaket(PaketWisata $paket)
    {
        return view('admin.paket-edit', compact('paket'));
    }

    public function saveEditPaket(Request $request, $id)
    {
        $paket = PaketWisata::find($id);
        $paket->nama_paket = $request->title;
        $paket->harga_paket = $request->harga;

        $paket->jadwal = $request->jadwal;
        $paket->harga_termasuk = $request->harga1;
        $paket->harga_tidak_termasuk = $request->harga2;
        $paket->itinerary = $request->itinerary;
        $paket->keterangan = $request->tambahan;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = public_path() . '/image/paket/' . $filename;
            file_put_contents($path, $decode);
            $paket->file_foto = '/image/paket/' . $filename;
        }

        $paket->save();

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
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
}
