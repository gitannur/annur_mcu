<?php

namespace App\Http\Controllers;


use App\Models\DaftarPenyakit;
use App\Models\RM_Non_Karyawan;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\RekamMedis;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekammedisController extends Controller

{
    public function index()
    {
        $rekammedis = RekamMedis::with('user')->get();
        $years = RekamMedis::selectRaw('YEAR(tanggal)as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        $title = 'Rekam Medis';
        return view('rekammedis.rekammedis', compact('rekammedis', 'title', 'years'));
    }

    public function create(Request $request)
    {

        $users = User::all();
        $title = 'Rekam Medis';

        // $searchQuery = $request->input('search_user');
        $daftarPenyakit = DaftarPenyakit::all();
        return view('rekammedis.create', compact('users', 'title', 'daftarPenyakit'));
    }


    public function store(Request $request)
    {


        // Simpan data rekam medis baru
        RekamMedis::create($request->all());


        return redirect()->route('rekammedis.rekammedis')->with('success', 'Rekam Medis berhasil disimpan');
    }

    public function jumlahberobat(Request $request)
    {
        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');

        $query = User::select('dept');

        for ($i = 1; $i <= 12; $i++) {
            $query->selectRaw("SUM(CASE WHEN MONTH(rekam_medis.tanggal) = $i THEN 1 ELSE 0 END) as month_$i");
        }

        $query->selectRaw('COUNT(*) as total')
            ->join('rekam_medis', 'users.id', '=', 'rekam_medis.id_user')
            ->groupBy('dept');

        if ($selectedMonth) {
            $query->whereMonth('rekam_medis.tanggal', $selectedMonth);
        }

        if ($selectedYear) {
            $query->whereYear('rekam_medis.tanggal', $selectedYear);
        }

        $departmentStats = $query->get();

        $years = RekamMedis::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $title = 'Rekam Medis';
        return view('rekammedis.jumlahberobat', compact('departmentStats', 'title', 'years'));
    }
    // method edit 
    public function edit($userId, $tahun)
    {
        $user = User::findOrFail($userId);

        $rekammedis = RekamMedis::where('id_user', $userId)
            ->whereYear('tanggal', $tahun)
            ->first();

        $title = 'Edit Rekam Medis Karyawan';
        $daftarPenyakit = DaftarPenyakit::all();

        // Menggunakan Carbon untuk mendapatkan daftar tahun yang diinginkan
        $years = RekamMedis::distinct()
            ->where('id_user', $userId)
            ->pluck('tanggal')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y');
            })
            ->unique();

        return view('rekammedis.edit_rekam_medis', compact('user', 'rekammedis', 'title', 'years', 'tahun', 'daftarPenyakit'));
    }

    // method update
    public function update(Request $request, User $userModel)
    {
        $rekammedis = $request->input('rekam_medis');

        DB::beginTransaction();

        try {
            foreach ($rekammedis as $userId => $data) {
                $user = User::find($userId);

                if ($user) {
                    // Perbarui data pemeriksaan medis
                    $rekammedis = RekamMedis::where('id_user', $userId)->first();

                    if ($rekammedis) {
                        $rekammedis->update($data);
                    } else {
                        // Jika data pemeriksaan medis tidak ditemukan, buat baru
                        RekamMedis::create(array_merge(['id_user' => $userId], $data));
                    }
                }
            }

            DB::commit();

            return redirect()->route('rekammedis.rekammedis')->with('success', 'Data Pemeriksaan Medis berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('rekammedis.edit_rekam_medis', ['user' => $userModel->id])->with('error', 'Gagal memperbarui Data Pemeriksaan Medis');
        }
    }

    // Method Hapus
    public function destroy($id, $tahun)
    {
        try {
            // Find the medical checkup record to be deleted
            $rekammedis = RekamMedis::where('id_user', $id)
                ->whereYear('tanggal', $tahun)
                ->first();

            if (!$rekammedis) {
                return redirect()->route('rekammedis.rekammedis')->with('error', 'Data tidak ditemukan');
            }

            // Delete the medical checkup record
            $rekammedis->delete();

            return redirect()->route('rekammedis.rekammedis')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('rekammedis.rekammedis')->with('error', 'Gagal menghapus data');
        }
    }


    // Tampil Rekapan
    public function rekapan()
    {
        $users = User::latest()->get();
        $title = 'Rekap Rekam Medis';
        return view('rekammedis.rm_rekapan', compact('users', 'title'));
    }

    public function showRekapan(Request $request)
    {
        $users = User::latest()->get();
        $title = 'Rekap Rekam Medis';
        $user = User::findOrFail($request->user_id);
        $rekammedis = RekamMedis::where('id_user', $user->id)
            ->whereYear('tanggal', '>', now()->subYears(5)->year)
            ->get();

        return view('rekammedis.rm_rekapan', compact('users', 'user', 'rekammedis', 'title'));
    }


    public function jenispenyakit()
    {
        $title = 'Rekam Medis ';
        $user = User::all();
        $daftarPenyakit = DaftarPenyakit::all();
        $data = [];

        foreach ($daftarPenyakit as $penyakit) {
            $monthlyCases = RekamMedis::where('id_daftar_penyakit', $penyakit->id)
                ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('COUNT(*) as cases'))
                ->groupBy(DB::raw('MONTH(tanggal)'))
                ->get();

            $data[$penyakit->id]['penyakit'] = $penyakit->nama_penyakit;
            foreach ($monthlyCases as $monthlyCase) {
                $data[$penyakit->id]['months'][$monthlyCase->month] = $monthlyCase->cases;
            }
        }

        return view('rekammedis.jenispenyakit', compact('title', 'data'));
    }

    public function tampilnonkaryawan()
    {
        $nonkaryawan = RM_Non_Karyawan::all();
        $years = RM_Non_Karyawan::selectRaw('YEAR(tanggal)as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        $title = 'Rekam Medis Non Karyawan';


        return view('rekammedis_nonkaryawan.index_nonkaryawan', compact('title', 'nonkaryawan', 'years'));
    }
    public function create_nonkaryawan(Request $request)
    {

        // $users = User::all();
        $title = 'Rekam Medis';

        // $searchQuery = $request->input('search_user');
        $daftarPenyakit = DaftarPenyakit::all();
        return view('rekammedis_nonkaryawan.create_nonkaryawan', compact('title', 'daftarPenyakit'));
    }


    public function store_nonkaryawan(Request $request)
    {


        // Simpan data rekam medis baru
        RM_Non_Karyawan::create($request->all());


        return redirect()->route('rekammedis_nonkaryawan.index_nonkaryawan')->with('success', 'Rekam Medis berhasil disimpan');
    }
    // method edit 

    public function edit_nonkaryawan($id)
    {
        // Ambil data rekam medis berdasarkan ID
        $nonkaryawan = RM_Non_Karyawan::all();
        $nonkaryawan = RM_Non_Karyawan::findOrFail($id);

        // Cek ID pengguna
        // dd($nonkaryawan->id_user);

        // Ambil informasi pengguna (jika ada)
        $user = RM_Non_Karyawan::find($nonkaryawan->id);
        $title = 'Edit Rekam Medis Karyawan';

        // Ambil data lain yang diperlukan (jika perlu)
        $daftarPenyakit = DaftarPenyakit::all();

        // Tampilkan halaman edit dengan data rekam medis yang akan diubah
        return view('rekammedis_nonkaryawan.edit_nonkaryawan', compact('nonkaryawan', 'daftarPenyakit', 'user', 'title'));
    }


    // method update


    // public function update_nonkaryawan(Request $request, $id)
    public function update_nonkaryawan(Request $request, User $userModel)
    {
        $nonkaryawan = $request->input('rekam_medis_non_karyawan');

        DB::beginTransaction();

        try {
            foreach ($nonkaryawan as $userId => $data) {
                $user = RM_Non_Karyawan::find($userId);

                if ($user) {
                    // Perbarui data pemeriksaan medis
                    $nonkaryawan = RM_Non_Karyawan::where('id', $userId)->first();

                    if ($nonkaryawan) {
                        $nonkaryawan->update($data);
                    } else {
                        // Jika data pemeriksaan medis tidak ditemukan, buat baru
                        RM_Non_Karyawan::create(array_merge(['id' => $userId], $data));
                    }
                }
            }

            DB::commit();

            return redirect()->route('rekammedis_nonkaryawan.index_nonkaryawan')->with('success', 'Data Pemeriksaan Medis berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('rekammedis_nonkaryawan.edit_nonkaryawan', ['user' => $userModel->id])->with('error', 'Gagal memperbarui Data Pemeriksaan Medis');
        }
    }

      // Tampil Rekapan non karyawan
      public function rekapan_nonkaryawan()
      {
          $nonkaryawan = RM_Non_Karyawan::latest()->get();
          $title = 'Rekap Rekam Medis';
          return view('rekammedis_nonkaryawan.rekapan_nonkaryawan', compact('nonkaryawan', 'title'));
      }
  
      public function showRekapan_nonkaryawan(Request $request)
      {
          $user = RM_Non_Karyawan::findOrFail($request->id);
          $title = 'Rekap Rekam Medis';
          $nonkaryawan = RM_Non_Karyawan::where('id', $user->id)
              ->whereYear('tanggal', '>', now()->subYears(5)->year)
              ->get();
      
          return view('rekammedis_nonkaryawan.rekapan_nonkaryawan', compact('user', 'nonkaryawan', 'title'));
      }

    //   method hapus
    public function destroy_nonkaryawan($id, $tahun)
    {
        try {
            // Find the medical checkup record to be deleted
            $nonkaryawan = RM_Non_Karyawan::where('id', $id)
                ->whereYear('tanggal', $tahun)
                ->first();

            if (!$nonkaryawan) {
                return redirect()->route('rekammedis_nonkaryawan.index_nonkaryawan')->with('error', 'Data tidak ditemukan');
            }

            // Delete the medical checkup record
            $nonkaryawan->delete();

            return redirect()->route('rekammedis_nonkaryawan.index_nonkaryawan')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('rekammedis_nonkaryawan.index_nonkaryawan')->with('error', 'Gagal menghapus data');
        }
    }
      
  
  
}
