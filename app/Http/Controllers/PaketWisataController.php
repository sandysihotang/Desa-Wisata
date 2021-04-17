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
        visits('App\Models\Home')->increment();
        // visits('App\Models\PaketWisata')->increment();
        // $count = visits('App\Models\PaketWisata')->count();

        $slider = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->take(3)->get();
        $slider->toArray();

        $list = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->paginate(9);
        return view('paket-wisata', compact('list', 'slider'));
    }

    public function viewPaket(PaketWisata $paket)
    {
        visits('App\Models\Home')->increment();
        // visits($paket)->increment();
        // $count = visits($paket)->count();

        return view('paket-wisata-detail', compact('paket'));
    }

    public function riwayatPesanan()
    {
        $user = Auth::user();
        $listPesanan = PemesananPaket::where('akun_id', $user->id_user)->orderBy('status_pesanan', 'ASC')->orderBy('tanggal_pesanan', 'DESC')->paginate(10);

        return view('pemesanan-riwayat', compact('listPesanan'));
    }

    public function viewPesanan($id)
    {
        $pesanan = PemesananPaket::find($id);
        return view('pemesanan-view', compact('pesanan'));
    }

    public function editPesanan($id)
    {
        $pesanan = PemesananPaket::find($id);
        return view('pemesanan-edit', compact('pesanan'));
    }

    public function saveBooking(Request $request, $paket)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'tanggal' => 'required',
            'peserta' => 'required|numeric',
        ]);

        $booking = new PemesananPaket;
        $booking->tanggal_pesanan = Carbon::now();
        $booking->nama_pemesan = $request->nama;
        $booking->email = $request->email;
        $booking->no_hp = $request->no_hp;
        $booking->check_in = $request->tanggal;
        $booking->pkt_wisata_id = $paket;
        $booking->jumlah_paket = $request->peserta;
        $booking->pesan = $request->pesan;
        $booking->status_pesanan = 1;
        if (Auth::check()) {
            $user = Auth::user();
            $booking->akun_id = $user->id_user;
        }

        //nomor pesanan
        $date = Carbon::now();
        $y = Carbon::now()->format('y');

        $getPaket = PaketWisata::find($paket);
        $nama_paket = $getPaket->nama_paket;
        $split = explode(" ", $nama_paket);
        $tampung = "";
        foreach ($split as $data) {
            $firstCharacter = substr($data, 0, 1);
            $tampung .= $firstCharacter;
        }
        $tampung .= '-' . $date->day . $date->month . $y . '-';

        $cek = PemesananPaket::where('no_pesanan', 'like', $tampung . '%')->get();

        $no = 1;
        if (isset($cek))
            $no = count($cek) + 1;

        $tampung .= $no;
        $booking->no_pesanan = $tampung;

        $booking->save();

        session()->flash('notif', '');
        return redirect()->back();
    }

    public function saveEditPesanan(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'tanggal' => 'required',
            'peserta' => 'required|numeric',
        ]);
        // dd($request);
        $pesanan = PemesananPaket::find($id);
        $pesanan->nama_pemesan = $request->nama;
        $pesanan->email = $request->email;

        $pesanan->no_hp = $request->no_hp;
        $pesanan->check_in = $request->tanggal;
        $pesanan->jumlah_paket = $request->peserta;
        $pesanan->pesan = $request->pesan;

        $pesanan->save();

        $user = Auth::user();

        session()->flash('notif', '');
        return redirect('/riwayat-pemesanan/lihat/' . $id);
    }

    public function formBooking(PaketWisata $paket)
    {
        return view('pemesanan-tambah', compact('paket'));
    }

    //ADMIN
    public function kelolaPaket()
    {
        $list = PaketWisata::sortable()->paginate(10);
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
            // 'nama' => 'required',
            // 'email' => 'required|email',
            // 'no_hp' => 'required',
            // 'tanggal' => 'required',
            // 'peserta' => 'required|numeric',
            'harga' => 'required|numeric',
            // 'harga1' => 'required',
        ]);
        $Upload_model = new PaketWisata();
        $Upload_model->nama_paket = $request->nama;
        $Upload_model->paket = $request->paket;
        $Upload_model->harga_paket = $request->harga;
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
            $path = './image/paket/' . $filename;
            file_put_contents($path, $decode);
            $Upload_model->file_foto = '/image/paket/' . $filename;
        }

        $Upload_model->save();

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
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
        $paket->paket = $request->paket;
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
            $path = './image/paket/' . $filename;
            file_put_contents($path, $decode);
            $paket->file_foto = '/image/paket/' . $filename;
        }

        $paket->save();

        return redirect('/kelola-paket-wisata');
    }

    public function hapusPaket(PaketWisata $paket)
    {
        $booking = PemesananPaket::where('pkt_wisata_id',  $paket->id_pkt_wisata)->get();
        if(isset($booking)){
            session()->flash('notif', '');
            return redirect()->back();
        }
        else{
            PaketWisata::destroy($paket->id_pkt_wisata);
            return redirect('/kelola-paket-wisata');
        }
        
    }

    //KELOLA PESANAN
    public function kelolaPesanan()
    {
        $list = PemesananPaket::sortable(['status_pesanan' => 'ASC'])->sortable(['tanggal_pesanan' => 'ASC'])->sortable()->paginate(10);
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
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'tanggal' => 'required',
            'peserta' => 'required|numeric',
        ]);
        
        $booking = new PemesananPaket;
        $booking->tanggal_pesanan = $request->tanggal_pesanan;
        $booking->nama_pemesan = $request->nama;
        $booking->email = $request->email;
        $booking->no_hp = $request->no_hp;
        $booking->check_in = $request->tanggal;
        $booking->pkt_wisata_id = $request->paket;
        $booking->status_pesanan = $request->pesanan;
        $booking->jumlah_paket = $request->peserta;
        $booking->pesan = $request->pesan;
        if (Auth::check()) {
            $user = Auth::user();
            $booking->akun_id = $user->id_user;
        }

        //nomor pesanan
        $date = Carbon::now();
        $y = Carbon::now()->format('y');

        $getPaket = PaketWisata::find($request->paket);
        $paket = $getPaket->nama_paket;
        $split = explode(" ", $paket);
        $tampung = "";
        foreach ($split as $data) {
            $firstCharacter = substr($data, 0, 1);
            $tampung .= $firstCharacter;
        }
        $tampung .= '-' . $date->day . $date->month . $y . '-';

        $cek = PemesananPaket::where('no_pesanan', 'like', $tampung . '%')->get();

        $no = 1;
        if (isset($cek))
            $no = count($cek) + 1;

        $tampung .= $no;
        $booking->no_pesanan = $tampung;

        $booking->save();

        return redirect('/detail-pesanan/' . $booking->id_pemesanan);
    }

    public function editPesananAdmin($id)
    {
        $pesanan = PemesananPaket::find($id);
        return view('admin.pesanan-edit', compact('pesanan'));
    }

    public function saveEditPesananAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'tanggal' => 'required',
            'peserta' => 'required|numeric',
        ]);
        // dd($request);
        $pesanan = PemesananPaket::find($id);
        $pesanan->nama_pemesan = $request->nama;
        $pesanan->email = $request->email;

        $pesanan->no_hp = $request->no_hp;
        $pesanan->check_in = $request->tanggal;
        $pesanan->jumlah_paket = $request->peserta;
        $pesanan->pesan = $request->pesan;

        $pesanan->save();

        $user = Auth::user();

        session()->flash('notif', '');
        return redirect('/detail-pesanan/' . $id);
    }

    public function statusSelesai(Request $request)
    {
        $pesanan = PemesananPaket::find($request->id);
        $pesanan->status_pesanan = 2;
        $pesanan->save();

        return redirect('/detail-pesanan/' . $request->id);
    }

    public function statusBatal(Request $request)
    {
        $pesanan = PemesananPaket::find($request->id);
        $pesanan->status_pesanan = 3;
        $pesanan->save();

        return redirect('/detail-pesanan/' . $request->id);
    }

    public function statusBatalPengunjung(Request $request)
    {
        $pesanan = PemesananPaket::find($request->id);
        $pesanan->status_pesanan = 3;
        $pesanan->save();

        $user = Auth::user();

        return redirect('/riwayat-pemesanan/' . $user->id_user);
    }
}
