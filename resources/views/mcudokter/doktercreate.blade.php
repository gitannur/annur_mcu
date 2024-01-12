@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3">Laboratorium</h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <form action="{{ route('mcudokter.store') }}" method="POST" class="row">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    {{-- <div class="col mb-3">
                                        <label for="search_user" class="form-label">Cari Nama </label>
                                        <input type="text"
                                            style="max-width: 200px;"class="form-control custom-input form-control-sm "
                                            name="id_user" id="search_user" list="userList" placeholder=""
                                            value="{{ $searchQuery ?? '' }}" required>
                                        <datalist id="userList">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}
                                            @endforeach
                                        </datalist>
                                    </div> --}}
                                    <div class="col-lg-3">
                                        <div class="col mb-3">
                                            <label for="id_user" class="form-label">Pilih User </label>
                                            <select name="id_user" id="id_user" class="form-select custom-input form-select-sm select2"
                                                style="width: 200px; font-size: 10pt;">
                                                <option value="">Pilih User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="col mb-3 ">
                                            <label for="tanggal" class="form-label">Tanggal </label>
                                            <input type="date" class="form-control custom-input form-control-sm"
                                                name="tanggal" style="max-width: 200px;" id="tanggal">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="col mb-3">
                                            <label for="nama_dokter" class="form-label">Nama Dokter </label>
                                            <input type="text" class="form-control custom-input form-control-sm"
                                                name="nama_dokter" style="max-width: 200px;" id="nama_dokter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Bagian Kiri --}}
                                <div class="col-lg-3">
                                    <h5 class="mb-3">Pemeriksaan Hematologi</h5>
                                    
                                    <div class="col mb-3">
                                        <label for="hemoglobin" class="form-label">Hemoglobin</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="hemoglobin" style="max-width: 200px;" id="hemoglobin">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="eritrosit" class="form-label">Eritrosit</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="eritrosit" style="max-width: 200px;" id="eritrosit">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="luekosit" class="form-label">Luekosit</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="luekosit" style="max-width: 200px;" id="luekosit">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="hematokrit" class="form-label">Hematokrit</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="hematokrit" style="max-width: 200px;" id="hematokrit">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="trombosit" class="form-label">Trombosit</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="trombosit" style="max-width: 200px;" id="trombosit">
                                    </div>
                                    <h5 class="mb-3">Kimia Klinik</h5>
                                    <div class="col mb-3">
                                        <label for="glukosa_sewaktu" class="form-label">Glukosa Sewaktu</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="glukosa_sewaktu" style="max-width: 200px;" id="glukosa_sewaktu">
                                    </div>
                                </div>

                                {{-- Bagian Tengah --}}
                                <div class="col-lg-3">
                                    <h5 class="">Urinalisis Makroskopis</h5>
                                   
                                    <div class="col mb-3">
                                        <label for="warna" class="form-label">Warna</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="warna" style="max-width: 200px;" id="warna">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="kejernihan" class="form-label">Kejernihan</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="kejernihan" style="max-width: 200px;" id="kejernihan">
                                    </div>
                                    <h5 class="">Kimia Urine</h5>
                                    <div class="col mb-3">
                                        <label for="bj" class="form-label">B.J</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="bj" style="max-width: 200px;" id="bj">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="ph" class="form-label">pH</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="ph" style="max-width: 200px;" id="ph">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="leuko" class="form-label">Leuko</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="leuko" style="max-width: 200px;" id="leuko">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="nitrit" class="form-label">Nitrit</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="nitrit" style="max-width: 200px;" id="nitrit">
                                    </div>

                                </div>

                                {{-- Bagian Kanan --}}
                                <div class="col-lg-3">
                                    <h5>Kimia Urine</h5>

                                    <div class="col mb-3">
                                        <label for="protein" class="form-label">Protein</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="protein" style="max-width: 200px;" id="protein">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="glukosa" class="form-label">Glukosa</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="glukosa" style="max-width: 200px;" id="glukosa">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="keton" class="form-label">Keton</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="keton" style="max-width: 200px;" id="keton">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="urobil" class="form-label">Urobil</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="urobil" style="max-width: 200px;" id="urobil">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="bili" class="form-label">Bili</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="bili" style="max-width: 200px;" id="bili">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="blood" class="form-label">Blood</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="blood" style="max-width: 200px;" id="blood">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h5 class=""> Mikroskopis</h5>
                                    <div class="col mb-3">
                                        <label for="m_leuko" class="form-label">leuko</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="m_leuko" style="max-width: 200px;" id="m_leuko">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="eri" class="form-label">eri</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="eri" style="max-width: 200px;" id="eri">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="epitel" class="form-label">epitel</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="epitel" style="max-width: 200px;" id="epitel">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="kristal" class="form-label">kristal</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="kristal" style="max-width: 200px;" id="kristal">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="bakteri" class="form-label">bakteri</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="bakteri" style="max-width: 200px;" id="bakteri">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="jamur" class="form-label">jamur</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="jamur" style="max-width: 200px;" id="jamur">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="silinder" class="form-label">silinder</label>
                                        <input type="text" class="form-control custom-input form-control-sm"
                                            name="silinder" style="max-width: 200px;" id="silinder">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
