<?php

namespace App\Http\Controllers;

use App\Models\MedicalCheckUp;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Laboratorium;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

use PDF;


class MedicalCheckUpController extends Controller
{
    public function index()
    {
        // $medicalcheckup = MedicalCheckUp::all();
        $medicalcheckup = MedicalCheckUp::with('user')->get();
        $years = MedicalCheckUp::selectRaw('YEAR(tanggal_pemeriksaan) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $title = 'Medical Check Up';
        return view('mcu.index', compact('medicalcheckup', 'title', 'years'));
    }

    public function sumarymcu()
    {
        // $medicalcheckup = MedicalCheckUp::all();
        $laboratorium = Laboratorium::with('user')->get();
        $medicalcheckup = MedicalCheckUp::with('user')->get();
        $years = MedicalCheckUp::selectRaw('YEAR(tanggal_pemeriksaan) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $title = 'Rekapan';
        return view('mcu.sumarymcu', compact('medicalcheckup', 'title', 'years', 'laboratorium'));
    }

    public function json()
    {
        $medicalcheckup = MedicalCheckUp::with('user')->get();
        return DataTables::of($medicalcheckup)->make(true);
        // return DataTables::of(MedicalCheckUp::all())->make(true);
    }

    public function create_lab()
    {
        $users = User::latest()->get();
        // $users = User::latest()->take(2)->get();
        $title = 'MCU Create Laboratorium';
        return view('mcu.create_lab', compact('users', 'title'));
    }
    public function create_dokter()
    {
        $mcu_lab = MedicalCheckUp::latest()->where('berat_badan',NULL)->get();
        // $mcu_lab = MedicalCheckUp::latest()->where('')->get();
        // $users = User::latest()->take(2)->get();
        $title = 'MCU Create Dokter';
        return view('mcu.create_dokter', compact('mcu_lab', 'title'));
    }


    public function store_lab(Request $request)
    {
        $medicalCheckUps = $request->input('medical_check_up');


        DB::beginTransaction();

        try {
            foreach ($medicalCheckUps as $userId => $data) {

                $user = User::find($userId);

                if ($user) {
                    // Simpan data pemeriksaan medis
                    $medicalCheckUp = new MedicalCheckUp($data);
                    $medicalCheckUp->id_user = $userId;
                    $medicalCheckUp->save();
                }
            }


            DB::commit();

            return redirect()->route('mcu.index')->with('success', 'Rekam Pemeriksaan Medis berhasil ditambahkan');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('mcu.create_lab')->with('error', 'Gagal menambahkan Rekam Pemeriksaan Medis');
        }
    }

    public function store_dokter(Request $request)
    {
        $id = $request->input('id');

        foreach ($id as $key => $dataId) {
            $data = MedicalCheckUp::find($dataId);

            $data->update([
                'berat_badan' => $request->input('berat_badan')[$key],
                'tinggi_badan' => $request->input('tinggi_badan')[$key],
                'anggota_gerak' => $request->input('anggota_gerak')[$key],
                'tekanan_darah' => $request->input('tekanan_darah')[$key],
                'nadi' => $request->input('nadi')[$key],
                'imt' => $request->input('imt')[$key],
                'telinga' => $request->input('telinga')[$key],
                'hidung' => $request->input('hidung')[$key],
                'tenggorokan' => $request->input('tenggorokan')[$key],
                'mata' => $request->input('mata')[$key],
                'cardiovaskuler' => $request->input('cardiovaskuler')[$key],
                'pernafasan' => $request->input('pernafasan')[$key],
                'abdomen' => $request->input('abdomen')[$key],
                'audiometri' => $request->input('audiometri')[$key],
                'spirometri' => $request->input('spirometri')[$key],
                'riwayat_penyakit' => $request->input('riwayat_penyakit')[$key],
                'diagnosa' => $request->input('diagnosa')[$key],
                'saran' => $request->input('saran')[$key],
                'hasil_akhir' => $request->input('hasil_akhir')[$key],
            ]);
        }
        return redirect()->route('mcu.index')->with('success', 'Rekam Pemeriksaan Medis berhasil ditambahkan');
    }

    // jangan di hapus 
    // public function store(Request $request)
    // {
    //     $medicalCheckUps = $request->input('medical_check_up');

    //     foreach ($medicalCheckUps as $userId => $data) {
    //         // Periksa apakah pengguna dengan $userId ada
    //         $user = User::find($userId);

    //         if ($user) {
    //             // Buat instans MedicalCheckUp baru untuk pengguna
    //             $medicalCheckUp = new MedicalCheckUp($data);
    //             $medicalCheckUp->id_user = $userId;
    //             $medicalCheckUp->save();
    //         }
    //     }

    //     return redirect()->route('mcu.index')->with('success', 'Rekam Pemeriksaan Medis berhasil ditambahkan');
    // }
    // MedicalCheckUpController.php

    public function edit($userId, $tahun)
    {
        $user = User::findOrFail($userId);

        $medicalCheckUp = MedicalCheckUp::where('id_user', $userId)
            ->whereYear('tanggal_pemeriksaan', $tahun)
            ->first();

        $title = 'Edit Pemeriksaan Medis';

        // Menggunakan Carbon untuk mendapatkan daftar tahun yang diinginkan
        $years = MedicalCheckUp::distinct()
            ->where('id_user', $userId)
            ->pluck('tanggal_pemeriksaan')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y');
            })
            ->unique();

        return view('mcu.edit', compact('user', 'medicalCheckUp', 'title', 'years', 'tahun'));
    }





    public function update(Request $request, User $userModel)
    {
        $medicalCheckUps = $request->input('medical_check_up');

        DB::beginTransaction();

        try {
            foreach ($medicalCheckUps as $userId => $data) {
                $user = User::find($userId);

                if ($user) {
                    // Perbarui data pemeriksaan medis
                    $medicalCheckUp = MedicalCheckUp::where('id_user', $userId)->first();

                    if ($medicalCheckUp) {
                        $medicalCheckUp->update($data);
                    } else {
                        // Jika data pemeriksaan medis tidak ditemukan, buat baru
                        MedicalCheckUp::create(array_merge(['id_user' => $userId], $data));
                    }
                }
            }

            DB::commit();

            return redirect()->route('mcu.index')->with('success', 'Data Pemeriksaan Medis berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('mcu.edit', ['user' => $userModel->id])->with('error', 'Gagal memperbarui Data Pemeriksaan Medis');
        }
    }

    // Hapus data 
    public function destroy($id, $tahun)
    {
        try {
            // Find the medical checkup record to be deleted
            $medicalCheckup = MedicalCheckUp::where('id_user', $id)
                ->whereYear('tanggal_pemeriksaan', $tahun)
                ->first();

            if (!$medicalCheckup) {
                return redirect()->route('mcu.index')->with('error', 'Data tidak ditemukan');
            }

            // Delete the medical checkup record
            $medicalCheckup->delete();

            return redirect()->route('mcu.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('mcu.index')->with('error', 'Gagal menghapus data');
        }
    }

    // edit lab
    public function edit_lab($userId, $tahun)
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

        return view('mcu.edit_lab', compact('user', 'medicalcheckup', 'title', 'years', 'tahun'));
    }

    public function update_lab(Request $request, User $userModel)
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
            return redirect()->route('mcu.edit_lab', ['user' => $userModel->id])->with('error', 'Gagal memperbarui Data');
        }
    }
    // Tampil Rekapan
    public function rekapan()
    {
        $users = User::latest()->get();
        $title = 'Rekap MCU';
        return view('mcu.rekapan', compact('users', 'title'));
    }

    public function showRekapan(Request $request)
    {
        $users = User::latest()->get();
        $title = 'Rekap MCU';
        $user = User::findOrFail($request->user_id);
        $medicalCheckups = MedicalCheckUp::where('id_user', $user->id)
            ->whereYear('tanggal_pemeriksaan', '>', now()->subYears(5)->year)
            ->get();

        return view('mcu.rekapan', compact('users', 'user', 'medicalCheckups', 'title'));
    }
    //  Print MCU
    public function print($id, $tahun)
    {
        $medicalcheckup = MedicalCheckUp::where('id_user', $id)
            ->whereYear('tanggal_pemeriksaan', $tahun)
            ->get();

        $pdf = PDF::loadView('mcu.cetak', compact('medicalcheckup'));
        return $pdf->stream('medicalcheckup.pdf');
    }

    // public function print_lab($id, $tahun)
    // {

    //     $laboratorium = Laboratorium::where('id_user', $id)
    //         ->whereYear('tanggal', $tahun)
    //         ->get();

    //     // dd($laboratorium);

    //     $pdf = PDF::loadView('mcu.cetak_lab', compact('laboratorium'));
    //     return $pdf->stream('laboratorium.pdf');
    // }
    public function print_lab($id, $tahun)
    {
        $medicalcheckup = MedicalCheckUp::where('id_user', $id)
            ->whereYear('tanggal_pemeriksaan', $tahun)
            ->get();

        // $laboratorium = Laboratorium::where('id_user', $id)
        //     ->whereYear('tanggal', $tahun)
        //     ->get();

        $pdf = PDF::loadView('mcu.cetak_lab', compact('medicalcheckup'));
        return $pdf->stream('laboratorium.pdf');
    }
}
