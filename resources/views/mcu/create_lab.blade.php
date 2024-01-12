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
                            <h5 class="text-white text-capitalize ps-3">Input MCU Oleh Laboratorium</h5>
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
                        <form action="{{ route('mcu.store_lab') }}" method="POST" onsubmit="return confirmSave()">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <table id="example_input"
                                class="table table-striped table-hover align-items-center small-ttb compact"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Status</th>
                                        <th rowspan="2">Dept</th>
                                        {{-- input --}}
                                        <th rowspan="2">Tgl MCU</th>
                                        <th rowspan="2">Nama Dokter</th>
                                        {{-- Hematologi --}}
                                        <th  class="text-center" colspan="5">Hematologi</th>
                                       
                                        {{-- Kimia Klinik --}}
                                        <th class="text-center">Kimia Klinik</th>
                                        {{-- Urinalisis Makroskopis --}}
                                        <th class="text-center" colspan="2">Urinalisis Makroskopis</th>
                                        
                                        {{-- Kimia Urin --}}
                                        <th class="text-center" colspan="10">Kimia Urin</th>
                                        {{-- <th>pH</th>
                                        <th>Leuko</th>
                                        <th>Nitrit</th>
                                        <th>Protein</th>
                                        <th>Glukosa</th>
                                        <th>Keton</th>
                                        <th>Urobil</th>
                                        <th>Bili</th>
                                        <th>Blood</th> --}}
                                        {{-- Mikroskopis --}}
                                        <th class="text-center" colspan="7">Mikroskopis</th>
                                        {{-- <th>Eri</th>
                                        <th>Epitel</th>
                                        <th>Kristal</th>
                                        <th>Bakteri</th>
                                        <th>Jamur</th>
                                        <th>Silinder</th> --}}
                                    </tr>

                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        {{-- <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Dept</th> --}}
                                        {{-- input --}}
                                        {{-- <th>Tgl MCU</th>
                                        <th>Nama Dokter</th> --}}
                                        {{-- Hematologi --}}
                                        <th>Hemoglobin</th>
                                        <th>Eritrosit</th>
                                        <th>Luekosit</th>
                                        <th>Hematokrit</th>
                                        <th>Trombosit</th>
                                        {{-- Kimia Klinik --}}
                                        <th>Glukosa-Sewaktu</th>
                                        {{-- Urinalisis Makroskopis --}}
                                        <th>Warna</th>
                                        <th>Kejernihan</th>
                                        {{-- Kimia Urin --}}
                                        <th>B.j.</th>
                                        <th>pH</th>
                                        <th>Leuko</th>
                                        <th>Nitrit</th>
                                        <th>Protein</th>
                                        <th>Glukosa</th>
                                        <th>Keton</th>
                                        <th>Urobil</th>
                                        <th>Bili</th>
                                        <th>Blood</th>
                                        {{-- Mikroskopis --}}
                                        <th>Leuko</th>
                                        <th>Eri</th>
                                        <th>Epitel</th>
                                        <th>Kristal</th>
                                        <th>Bakteri</th>
                                        <th>Jamur</th>
                                        <th>Silinder</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            {{-- <td>
                                                {{ $user->id }}
                                            </td> --}}
                                            <td>
                                                {{ $user->nik }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->status }}
                                            </td>
                                            <td>
                                                {{ $user->dept }}
                                            </td>
                                            <td>
                                                <input type="date"
                                                    name="medical_check_up[{{ $user->id }}][tanggal_pemeriksaan]"
                                                    placeholder="Tanggal Check Up">
                                            </td>

                                            <td>
                                                <input type="text"
                                                    name="medical_check_up[{{ $user->id }}][nama_dokter]"
                                                    placeholder="Nama Dokter">
                                            </td>
                                            {{-- Hematologi --}}
                                            <td>
                                                <input type="text"
                                                    name="medical_check_up[{{ $user->id }}][hemoglobin]"
                                                    placeholder="Hemoglobin ">
                                            </td>

                                            <td>
                                                <input type="text"
                                                    name="medical_check_up[{{ $user->id }}][eritrosit]"
                                                    placeholder="Eritrosit ">
                                            </td>
                                            <td>
                                                <input type="text" id="luekosit"
                                                    name="medical_check_up[{{ $user->id }}][luekosit]"
                                                    placeholder="Luekosit ">
                                            </td>
                                            <td>
                                                <input type="text" id="hematokrit"
                                                    name="medical_check_up[{{ $user->id }}][hematokrit]"
                                                    placeholder="Hematokrit ">
                                            </td>


                                            <td>
                                                <input type="text" id="trombosit"
                                                    name="medical_check_up[{{ $user->id }}][trombosit]"
                                                    placeholder="Trombosit">
                                            </td>
                                            {{-- Kimia Klinik --}}
                                            <td>
                                                <input type="text" id="	glukosa_sewaktu"
                                                    name="medical_check_up[{{ $user->id }}][glukosa_sewaktu]"
                                                    placeholder="Glukosa Sewaktu ">
                                            </td>
                                            {{-- Urinalisis Makroskopis --}}
                                            <td>
                                                <input type="text" id="warna"
                                                    name="medical_check_up[{{ $user->id }}][warna]"
                                                    placeholder="Warna">
                                            </td>
                                            <td>
                                                <input type="text" id="kejernihan"
                                                    name="medical_check_up[{{ $user->id }}][kejernihan]"
                                                    placeholder="Kejernihan ">
                                            </td>
                                            {{-- Kimia Urin --}}
                                            <td>
                                                <input type="text" id="bj"
                                                    name="medical_check_up[{{ $user->id }}][bj]" placeholder="bj ">
                                            </td>
                                            <td>
                                                <input type="text" id="ph"
                                                    name="medical_check_up[{{ $user->id }}][ph]" placeholder="pH ">
                                            </td>
                                            <td>
                                                <input type="text" id="leuko"
                                                    name="medical_check_up[{{ $user->id }}][leuko]"
                                                    placeholder="leuko ">
                                            </td>
                                            <td>
                                                <input type="text" id="nitrit"
                                                    name="medical_check_up[{{ $user->id }}][nitrit]"
                                                    placeholder="nitrit ">
                                            </td>
                                            <td>
                                                <input type="text" id="protein"
                                                    name="medical_check_up[{{ $user->id }}][protein]"
                                                    placeholder="protein ">
                                            </td>
                                            <td>
                                                <input type="text" id="glukosa"
                                                    name="medical_check_up[{{ $user->id }}][glukosa]"
                                                    placeholder="glukosa ">
                                            </td>
                                            <td>
                                                <input type="text" id="keton"
                                                    name="medical_check_up[{{ $user->id }}][keton]"
                                                    placeholder="keton ">
                                            </td>
                                            <td>
                                                <input type="text" id="urobil"
                                                    name="medical_check_up[{{ $user->id }}][urobil]"
                                                    placeholder="urobil ">
                                            </td>
                                            <td>
                                                <input type="text" id="bili"
                                                    name="medical_check_up[{{ $user->id }}][bili]"
                                                    placeholder="bili ">
                                            </td>
                                            <td>
                                                <input type="text" id="blood"
                                                    name="medical_check_up[{{ $user->id }}][blood]"
                                                    placeholder="blood ">
                                            </td>

                                            {{-- Mikroskopis --}}
                                            <td>
                                                <input type="text" id="m_leuko"
                                                    name="medical_check_up[{{ $user->id }}][m_leuko]"
                                                    placeholder="leuko ">
                                            </td>
                                            <td>
                                                <input type="text" id="eri"
                                                    name="medical_check_up[{{ $user->id }}][eri]" placeholder="eri ">
                                            </td>
                                            <td>
                                                <input type="text" id="epitel"
                                                    name="medical_check_up[{{ $user->id }}][epitel]"
                                                    placeholder="epitel ">
                                            </td>
                                            <td>
                                                <input type="text" id="kristal"
                                                    name="medical_check_up[{{ $user->id }}][kristal]"
                                                    placeholder="kristal ">
                                            </td>
                                            <td>
                                                <input type="text" id="bakteri"
                                                    name="medical_check_up[{{ $user->id }}][bakteri]"
                                                    placeholder="bakteri ">
                                            </td>
                                            <td>
                                                <input type="text" id="jamur"
                                                    name="medical_check_up[{{ $user->id }}][jamur]"
                                                    placeholder="jamur ">
                                            </td>
                                            <td>
                                                <input type="text" id="silinder"
                                                    name="medical_check_up[{{ $user->id }}][silinder]"
                                                    placeholder="silinder ">
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
