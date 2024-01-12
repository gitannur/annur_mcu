<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedicalCheckUp;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class McuDokterController extends Controller
{
    public function index(Request $request)
    {
        $laboratorium = Laboratorium::with('user')->get();
        $years = Laboratorium::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        $title = 'Laboratorium';

        $newUserId = $request->input('new_user_id');

        // Jika ada ID pengguna baru, ambil data laboratorium untuk pengguna tersebut
        $userLabData = null;
        if ($newUserId) {
            $userLabData = Laboratorium::where('id_user', $newUserId)->get();
        }

        return view('mcudokter.index', compact('laboratorium', 'title', 'years', 'userLabData'));
        // return view('mcudokter.index',compact('laboratorium','title','years'));
    }

    public function create(Request $request)
    {
        $laboratorium = Laboratorium::all();
        $users = User::latest()->with('laboratorium')->get();
        $title = 'Laboratorium';

        // $searchQuery = $request->input('search_user');

        // return view('mcudokter.doktercreate', compact('users', 'title', 'searchQuery'));
        return view('mcudokter.doktercreate', compact('users', 'title'));
    }

    // method store
    public function store(Request $request)
    {
        
         Laboratorium::create($request->all());
        // dd($laboratorium);
        return redirect()->route('mcudokter.index')->with('success', 'Data berhasil disimpan');
    }
    

    // method edit
    public function edit($userId, $tahun)
    {
        $user = User::findOrFail($userId);

        $medicalcheckup = MedicalCheckUp::where('id_user', $userId)
            ->whereYear('tanggal_pemeriksaan', $tahun)
            ->first();

        $title = 'Edit Laboratorium';

        // Menggunakan Carbon untuk mendapatkan daftar tahun yang diinginkan
        $years = MedicalCheckUp::distinct()
            ->where('id_user', $userId)
            ->pluck('tanggal_pemeriksaan')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y');
            })
            ->unique();

        return view('mcudokter.edit', compact('user', 'medicalcheckup', 'title', 'years', 'tahun'));
    }

    public function update(Request $request, User $userModel)
    {
        $medicalcheckup = $request->input('medicalcheckup');

        DB::beginTransaction();

        try {
            foreach ($medicalcheckup as $userId => $data) {
                $user = User::find($userId);

                if ($user) {
                    // Perbarui data pemeriksaan medis
                    $medicalcheckup = MedicalCheckUp::where('id_user', $userId)->first();

                    if ($medicalcheckup) {
                        $medicalcheckup->update($data);
                    } else {
                        // Jika data pemeriksaan medis tidak ditemukan, buat baru
                        MedicalCheckUp::create(array_merge(['id_user' => $userId], $data));
                    }
                }
            }

            DB::commit();

            return redirect()->route('mcu.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('mcudokter.edit', ['user' => $userModel->id])->with('error', 'Gagal memperbarui Data');
        }
    }

    public function print($id, $tahun)
    {
        $laboratorium = Laboratorium::where('id_user', $id)
            ->whereYear('tanggal', $tahun)
            ->get();

        $pdf = PDF::loadView('mcudokter.cetak', compact('laboratorium'));
        return $pdf->stream('laboratorium.pdf');
    }
}
