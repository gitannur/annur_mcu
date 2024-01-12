<!-- mcu/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3">Edit Pemeriksaan</h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <form action="{{ route('mcu.update', ['user' => $user]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <!-- Menampilkan informasi pengguna -->
                            <div class="mb-3 row">
                                <div class="col-lg-4">
                                    <strong>Nama:</strong> {{ $user->name }}
                                </div>
                                <div class="col-lg-4">
                                    <strong>Status:</strong> {{ $user->status }}
                                </div>
                                <div class="col-lg-4">
                                    <strong>Departemen:</strong> {{ $user->dept }}
                                </div>
                            </div>


                            <!-- Menampilkan formulir pemeriksaan medis dengan data yang sudah ada -->
                            <h5>Informasi Pemeriksaan Medis:</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Bagian Kiri -->
                                    <label for="berat_badan">Berat Badan:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][berat_badan]"
                                        value="{{ $medicalCheckUp->berat_badan ?? '' }}"
                                        class="form-control form-control-sm">

                                    <label for="tinggi_badan">Tinggi Badan:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][tinggi_badan]"
                                        value="{{ $medicalCheckUp->tinggi_badan ?? '' }}"
                                        class="form-control form-control-sm">
                                    <label for="tekanan_darah">Tekanan Darah:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][tekanan_darah]"
                                        value="{{ $medicalCheckUp->tekanan_darah ?? '' }}"
                                        class="form-control form-control-sm">
                                    <label for="nadi">Nadi:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][nadi]"
                                        value="{{ $medicalCheckUp->nadi ?? '' }}" class="form-control form-control-sm">

                                    <label for="imt">IMT:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][imt]"
                                        value="{{ $medicalCheckUp->imt ?? '' }}" class="form-control form-control-sm">
                                    <label for="audiometri">Audiometri:</label>
                                    <select name="medical_check_up[{{ $user->id }}][audiometri]"
                                        class="form-select form-select-sm ">
                                        <option value="" selected disabled>Audiometri</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->audiometri == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->audiometri == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->audiometri == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="spirometri">Spirometri:</label>
                                    <select name="medical_check_up[{{ $user->id }}][spirometri]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Spirometri</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->spirometri == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->spirometri == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->spirometri == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="riwayat_penyakit">Riwayat Penyakit:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][riwayat_penyakit]"
                                        value="{{ $medicalCheckUp->riwayat_penyakit ?? '' }}"
                                        class="form-control form-control-sm">
                                    <label for="diagnosa">Diagnosa:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][diagnosa]"
                                        value="{{ $medicalCheckUp->diagnosa ?? '' }}" class="form-control form-control-sm">
                                    <label for="saran">Saran:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][saran]"
                                        value="{{ $medicalCheckUp->saran ?? '' }}" class="form-control form-control-sm">


                                </div>
                                <div class="col-lg-6">
                                    <!-- Bagian Kanan -->
                                    <label for="anggota_gerak">Anggota Gerak:</label>
                                    <select name="medical_check_up[{{ $user->id }}][anggota_gerak]"
                                        class="form-select form-select-sm">
                                        <option value="" selected>Anggota Gerak</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->anggota_gerak == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->anggota_gerak == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->anggota_gerak == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="telinga">Telinga:</label>
                                    <select name="medical_check_up[{{ $user->id }}][telinga]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Telinga</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->telinga == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->telinga == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->telinga == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="hidung">Hidung:</label>
                                    <select name="medical_check_up[{{ $user->id }}][hidung]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Hidung</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->hidung == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->hidung == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->hidung == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="tenggorokan">Tenggorokan:</label>
                                    <select name="medical_check_up[{{ $user->id }}][tenggorokan]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Tenggorokan</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->tenggorokan == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->tenggorokan == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->tenggorokan == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="mata">Mata:</label>
                                    <select name="medical_check_up[{{ $user->id }}][mata]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Mata</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->mata == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->mata == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->mata == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="cardiovaskuler">Cardiovaskuler:</label>
                                    <select name="medical_check_up[{{ $user->id }}][cardiovaskuler]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Cardiovaskuler</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->cardiovaskuler == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->cardiovaskuler == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->cardiovaskuler == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="pernafasan">Pernafasan:</label>
                                    <select name="medical_check_up[{{ $user->id }}][pernafasan]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Pernafasan</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->pernafasan == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->pernafasan == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->pernafasan == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="abdomen">Abdomen:</label>
                                    <select name="medical_check_up[{{ $user->id }}][abdomen]"
                                        class="form-select form-select-sm">
                                        <option value="" selected disabled>Abdomen</option>
                                        <option value="Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->abdomen == 'Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Dalam Kondisi Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->abdomen == 'Dalam Kondisi Normal' ? 'selected' : '' }}>
                                            Dalam Kondisi Normal</option>
                                        <option value="Tidak Normal"
                                            {{ $medicalCheckUp && $medicalCheckUp->abdomen == 'Tidak Normal' ? 'selected' : '' }}>
                                            Tidak Normal</option>
                                    </select>
                                    <label for="hasil_akhir">Hasil Akhir:</label>
                                    <input type="text" name="medical_check_up[{{ $user->id }}][hasil_akhir]"
                                        value="{{ $medicalCheckUp->hasil_akhir ?? '' }}"
                                        class="form-control form-control-sm">
                                    {{-- <label for="tahun">Tahun:</label>
                                    <select id="tahun" name="medical_check_up[{{ $user->id }}][tahun]"
                                        class="form-select form-select-sm">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}"
                                                @if ($tahun == $year) selected @endif>{{ $year }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <br>
                                </div>
                            </div>
                            <input type="hidden" name="medical_check_up[{{ $user->id }}][id_user]"
                                value="{{ $user->id }}"> <br>

                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
