@extends('layouts.main')

@section('content')

    <head>
        <script>
            function confirmSave() {
                return confirm("Simpan Data ?");
            }
        </script>

    </head>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3">Input MCU Oleh Dokter</h5>
                        </div>
                    </div>

                    <div class="card-body p-3 pb-2">
                        <div class="mb-2">
                            {{-- <h5 class="mb-3">Filter</h5> --}}
                            <div class="row gx-3">
                                <div class="col-md-2 mb-2 ">
                                    <label for="statusFilter" class="form-label">-Status-</label>
                                    <select id="statusFilter" class="form-select">
                                        <option value=""></option>
                                        <option value="Assistant trainee">Assistant trainee</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Staff">Staff</option>

                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="deptFilter" class="form-label">-Departement-</label>
                                    <select id="deptFilter" class="form-select">
                                        <option value=""></option>
                                        {{-- <option value="" disabled selected hidden>Departemen</option> --}}
                                        <option value="Acc & Fin">Acc & Fin</option>
                                        <option value="BSKP">BSKP</option>
                                        <option value="Factory">Factory</option>
                                        <option value="Field">Field</option>
                                        <option value="FSD">FSD</option>
                                        <option value="HR & Legal">HR & Legal</option>
                                        <option value="HR Legal">HR Legal</option>
                                        <option value="HSE & DP">HSE & DP</option>
                                        <option value="I/A">I/A</option>
                                        <option value="I/B">I/B</option>
                                        <option value="I/C">I/C</option>
                                        <option value="II/D">II/D</option>
                                        <option value="II/E">II/E</option>
                                        <option value="II/F">II/F</option>
                                        <option value="IT">IT</option>
                                        <option value="QA">QA</option>
                                        <option value="QM">QM</option>
                                        <option value="Security">Security</option>
                                        <option value="Workshop">Workshop</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('mcu.store_dokter') }}" method="POST" onsubmit="return confirmSave()">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <table id="example_input"
                                class="table table-striped table-hover align-items-center small-ttb compact"
                                style="width:100%">
                                <thead>
                                    {{-- <th>ID</th> --}}
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Dept</th>
                                    {{-- input --}}
                                    <th>Tgl MCU</th>
                                    <th>Berat Badan</th>
                                    <th>Tinggi Badan</th>
                                    <th>Anggota Gerak</th>
                                    <th>Tekanan Darah</th>
                                    <th>Nadi</th>
                                    <th>IMT</th>
                                    <th>Telinga</th>
                                    <th>Hidung</th>
                                    <th>Tenggorokan</th>
                                    <th>Mata</th>
                                    <th>Cardiovaskuler</th>
                                    <th>Pernafasan</th>
                                    <th>Abdomen</th>
                                    {{-- <th>Urine</th>
                                    <th>Hematologi</th> --}}
                                    <th>Audiometri</th>
                                    <th>Spirometri</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>Diagnosa</th>
                                    <th>Saran</th>
                                    <th>Hasil Akhir</th>
                                </thead>
                                <tbody>
                                    @foreach ($mcu_lab as $mcu)
                                        <tr>
                                            {{-- <td>
                                                {{ $mcu->id }}
                                            </td> --}}
                                            <td>
                                                {{ $mcu->user->nik }}
                                            </td>
                                            <td>
                                                {{ $mcu->user->name }}
                                            </td>
                                            <td>
                                                {{ $mcu->user->status }}
                                            </td>
                                            <td>
                                                {{ $mcu->user->dept }}
                                            </td>
                                            <td>
                                                {{ $mcu->tanggal_pemeriksaan }}
                                            </td>
                                            <input type="hidden" required name="id[]" value="{{ $mcu->id }}">
                                            {{-- <input type="hidden" required name="id[]" value=""> --}}
                                            <td>
                                                <input type="text" required name="berat_badan[]"
                                                    placeholder="Berat Badan">
                                            </td>
                                            <td>
                                                <input type="text" required name="tinggi_badan[]"
                                                    placeholder="Tinggi Badan ">
                                            </td>
                                            <td>
                                                <select required name="anggota_gerak[]" placeholder="Anggota Gerak">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" required name="tekanan_darah[]"
                                                    placeholder="Tekanan Darah ">
                                            </td>
                                            <td>
                                                <input type="text" id="nadi" required name="nadi[]"
                                                    placeholder="Nadi ">
                                            </td>
                                            <td>
                                                <input type="text" id="imt" required name="imt[]"
                                                    placeholder="IMT ">
                                            </td>
                                            <td>
                                                <select id="telinga" required name="telinga[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="hidung" required name="hidung[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="tenggorokan" required name="tenggorokan[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="mata" required name="mata[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="cardiovaskuler" required name="cardiovaskuler[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="pernafasan" required name="pernafasan[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="abdomen" required name="abdomen[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            {{-- <td>
                                                <select id="urine"
                                                    required name="urine[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="hematologi"
                                                    required name="hematologi[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td> --}}
                                            <td>
                                                <select id="audiometri" required name="audiometri[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>
                                                    <option value="normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="spirometri" required name="spirometri[]">
                                                    <option value=""></option>
                                                    <option value="normal">Normal</option>

                                                    <option value="dalam_batas_normal">Dalam Batas Normal</option>
                                                    <option value="tidak_normal">Tidak Normal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" id="riwayat_penyakit" required
                                                    name="riwayat_penyakit[]" placeholder="Riwayat Penyakit">
                                            </td>
                                            <td>
                                                <input type="text" id="diagnosa" required name="diagnosa[]"
                                                    placeholder="Diagnosa">
                                            </td>
                                            <td>
                                                <input type="text" id="saran" required name="saran[]"
                                                    placeholder="Saran ">
                                            </td>
                                            <td>
                                                <input type="text" id="hasil_akhir" required name="hasil_akhir[]"
                                                    placeholder="Hasil Akhir ">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
