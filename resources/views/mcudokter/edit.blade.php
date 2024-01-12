<!-- mcu/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit Hasil Laboratorium</h6>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <form action="{{ route('mcudokter.update', ['user' => $user]) }}" method="post">
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



                            {{-- <h5>Informasi Hasil Laboratorium:</h5> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Hematologi</h6>
                                    <!-- Bagian Kiri -->
                                    <label for="hemoglobin">Hemoglobin</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][hemoglobin]"
                                        value="{{ $medicalcheckup->hemoglobin ?? '' }}"
                                        class="form-control form-control-sm">

                                    <label for="eritrosit">Eritrosit</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][eritrosit]"
                                        value="{{ $medicalcheckup->eritrosit ?? '' }}" class="form-control form-control-sm">
                                    <label for="luekosit">Luekosit</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][luekosit]"
                                        value="{{ $medicalcheckup->luekosit ?? '' }}" class="form-control form-control-sm">
                                    <label for="hematokrit">Hematokrit</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][hematokrit]"
                                        value="{{ $medicalcheckup->hematokrit ?? '' }}"
                                        class="form-control form-control-sm">

                                    <label for="trombosit">Trombosit</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][trombosit]"
                                        value="{{ $medicalcheckup->trombosit ?? '' }}"
                                        class="form-control form-control-sm"><br>

                                    <h6>Kimia Klinik</h6>
                                    <label for="glukosa_sewaktu">Glukosa Sewaktu</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][glukosa_sewaktu]"
                                        value="{{ $medicalcheckup->glukosa_sewaktu ?? '' }}"
                                        class="form-control form-control-sm"><br>

                                    <h6>Urinalisis Makroskopis</h6>

                                    <label for="warna">Warna</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][warna]"
                                        value="{{ $medicalcheckup->warna ?? '' }}" class="form-control form-control-sm">
                                    <label for="kejernihan">Kejernihan:</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][kejernihan]"
                                        value="{{ $medicalcheckup->kejernihan ?? '' }}"
                                        class="form-control form-control-sm"><br>

                                    <h6>Kimia Urine</h6>
                                    <label for="bj">B.J:</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][bj]"
                                        value="{{ $medicalcheckup->bj ?? '' }}" class="form-control form-control-sm">
                                    <label for="ph">ph</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][ph]"
                                        value="{{ $medicalcheckup->ph ?? '' }}" class="form-control form-control-sm">
                                    <label for="leuko">Leuko</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][leuko]"
                                        value="{{ $medicalcheckup->leuko ?? '' }}" class="form-control form-control-sm">
                                    <label for="nitrit">Nitrit</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][nitrit]"
                                        value="{{ $medicalcheckup->nitrit ?? '' }}" class="form-control form-control-sm">



                                </div>
                                <div class="col-lg-6">
                                    <!-- Bagian Kanan -->
                                    <h6>Kimia Urine</h6>



                                    <label for="glukosa">Glukosa</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][glukosa]"
                                        value="{{ $medicalcheckup->glukosa ?? '' }}" class="form-control form-control-sm">
                                    <label for="keton">Keton</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][keton]"
                                        value="{{ $medicalcheckup->keton ?? '' }}" class="form-control form-control-sm">
                                    <label for="urobil">Urobil</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][urobil]"
                                        value="{{ $medicalcheckup->urobil ?? '' }}" class="form-control form-control-sm">
                                    <label for="bili">Bili</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][bili]"
                                        value="{{ $medicalcheckup->bili ?? '' }}" class="form-control form-control-sm">
                                    <label for="blood">Blood</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][blood]"
                                        value="{{ $medicalcheckup->blood ?? '' }}" class="form-control form-control-sm">
                                    <label for="protein">Protein</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][protein]"
                                        value="{{ $medicalcheckup->protein ?? '' }}"
                                        class="form-control form-control-sm"> <br>


                                    <h6>Mikroskopis</h6>
                                    <label for="m_leuko">leuko</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][m_leuko]"
                                        value="{{ $medicalcheckup->m_leuko ?? '' }}"
                                        class="form-control form-control-sm">
                                    <label for="eri">eri</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][eri]"
                                        value="{{ $medicalcheckup->eri ?? '' }}" class="form-control form-control-sm">
                                    <label for="epitel">epitel</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][epitel]"
                                        value="{{ $medicalcheckup->epitel ?? '' }}" class="form-control form-control-sm">
                                    <label for="kristal">kristal</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][kristal]"
                                        value="{{ $medicalcheckup->kristal ?? '' }}"
                                        class="form-control form-control-sm">
                                    <label for="bakteri">bakteri</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][bakteri]"
                                        value="{{ $medicalcheckup->bakteri ?? '' }}"
                                        class="form-control form-control-sm">
                                    <label for="jamur">jamur</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][jamur]"
                                        value="{{ $medicalcheckup->jamur ?? '' }}" class="form-control form-control-sm">
                                    <label for="silinder">silinder</label>
                                    <input type="text" name="medicalcheckup[{{ $user->id }}][silinder]"
                                        value="{{ $medicalcheckup->silinder ?? '' }}"
                                        class="form-control form-control-sm">



                                    {{-- <label for="tahun">Tahun:</label>
                                    <select id="tahun" name="medicalcheckup[{{ $user->id }}][tahun]"
                                        class="form-select form-select-sm">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}"
                                                @if ($tahun == $year) selected @endif>{{ $year }}
                                            </option>
                                        @endforeach
                                    </select><br> --}}
                                </div>
                            </div>




                            <input type="hidden" name="medicalcheckup[{{ $user->id }}][id_user]"
                                value="{{ $user->id }}"> <br>

                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
