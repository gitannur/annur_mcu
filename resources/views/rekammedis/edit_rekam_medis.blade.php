<!-- mcu/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit Hasil rekammedis</h6>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <form action="{{ route('rekammedis.update', ['user' => $user]) }}" method="post">
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



                            {{-- <h5>Informasi Hasil rekammedis:</h5> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    {{-- <h6>Hematologi</h6> --}}
                                    <!-- Bagian Kiri -->
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date " name="rekam_medis[{{ $user->id }}][tanggal]"
                                        value="{{ $rekammedis->tanggal ?? '' }}" class="form-control form-control-sm" required>

                                    <label for="anamesis">Anamesis dan Riwayat Penyakit Terdahulu</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][anamesis]"
                                        value="{{ $rekammedis->anamesis ?? '' }}" class="form-control form-control-sm" required>
                                    <label for="tekanan_darah">Tekanan Darah</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][tekanan_darah]"
                                        value="{{ $rekammedis->tekanan_darah ?? '' }}" class="form-control form-control-sm" required>
                                    <label for="nadi">Nadi</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][nadi]"
                                        value="{{ $rekammedis->nadi ?? '' }}" class="form-control form-control-sm" required>

                                    <label for="pernafasan">Pernafasan</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][pernafasan]"
                                        value="{{ $rekammedis->pernafasan ?? '' }}"
                                        class="form-control form-control-sm" required>

                                    <label for="vas">Vas</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][vas]"
                                        value="{{ $rekammedis->vas ?? '' }}" class="form-control form-control-sm" required><br>

                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Bagian Kanan -->
                                        {{-- <h6>Kimia Urine</h6> --}}
                                        
                                        
                                        <label for="pengobatan">Pengobatan</label>
                                        <input type="text" name="rekam_medis[{{ $user->id }}][pengobatan]"
                                            value="{{ $rekammedis->pengobatan ?? '' }}" class="form-control form-control-sm" required>

                                    <label for="saturasi_oksigen">Saturasi Oksigen</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][saturasi_oksigen]"
                                        value="{{ $rekammedis->saturasi_oksigen ?? '' }}"
                                        class="form-control form-control-sm" required>
                                    <label for="diagnosis">Diagnosis</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][diagnosis]"
                                        value="{{ $rekammedis->diagnosis ?? '' }}" class="form-control form-control-sm" required>
                                    <label for="nama_dokter">Nama Dokter</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][nama_dokter]"
                                        value="{{ $rekammedis->nama_dokter ?? '' }}" class="form-control form-control-sm" required>
                                    <label for="head_to_toe">Head To Toe</label>
                                    <input type="text" name="rekam_medis[{{ $user->id }}][head_to_toe]"
                                        value="{{ $rekammedis->head_to_toe ?? '' }}" class="form-control form-control-sm" required>

                                    <label for="id_daftar_penyakit">Pilih Daftar Penyakit</label>
                                     <select name="id_daftar_penyakit" id="id_daftar_penyakit" class="form-control custom-input form-control-sm" >
                                                <option value="">Pilih </option>
                                                @foreach ($daftarPenyakit as $penyakit)
                                                <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }}</option>
                                            @endforeach
                                            </select>
                                   
                                </div>
                            </div>




                            <input type="hidden" name="rekam_medis[{{ $user->id }}][id_user]"
                                value="{{ $user->id }}">

                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
