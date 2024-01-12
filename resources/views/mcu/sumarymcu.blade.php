@extends('layouts.main')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3">Summary</h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <div>
                            {{-- <a href="{{ route('mcu.create') }}" class="btn btn-sm btn-primary">Input </a> --}}


                        </div>
                        <div class="">
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


                                    <div class="col-md-2 mb-2">
                                        <label for="tahunFilter" class="form-label">-Tahun-</label>
                                        <select id="tahunFilter" class="form-select">
                                            <option value=""></option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <table id="example_mcu" class="table table-striped table-hover align-items-center small-ttb compact"
                            style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center">ID</th> --}}
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Dept</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Tgl MCU</th>
                                    {{-- <th class="text-center">Berat Badan</th>
                                    <th class="text-center">Tinggi Badan</th>
                                    <th class="text-center">Anggota Gerak</th>
                                    <th class="text-center">Tekanan Darah</th>
                                    <th class="text-center">Nadi</th>
                                    <th class="text-center">IMT</th>
                                    <th class="text-center">Telinga</th>
                                    <th class="text-center">Hidung</th>
                                    <th class="text-center">Tenggorokan</th>
                                    <th class="text-center">Mata</th>
                                    <th class="text-center">Cardiovaskuler</th>
                                    <th class="text-center">Pernafasan</th>
                                    <th class="text-center">Abdomen</th> --}}
                                    {{-- <th class="text-center">Urine</th>
                                    <th class="text-center">Hematologi</th> --}}
                                    {{-- <th class="text-center">Audiometri</th>
                                    <th class="text-center">Spirometri</th>
                                    <th class="text-center">Riwayat Penyakit</th>
                                    <th class="text-center">Diagnosa</th>
                                    <th class="text-center">Saran</th>
                                    <th class="text-center">Hasil Akhir</th> --}}
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($medicalcheckup) && count($medicalcheckup) > 0)
                                    @foreach ($medicalcheckup as $mcu)
                                        <tr class="text-center">

                                            {{-- <td>{{ $mcu->user->id }}</td> --}}
                                            <td>{{ $mcu->user->nik }}</td>
                                            {{-- <td>{{ $mcu->user->id_user }}</td> --}}
                                            <td>{{ $mcu->user->name }}</td>
                                            <td>{{ $mcu->user->status }}</td>
                                            <td>{{ $mcu->user->dept }}</td>
                                            <td>{{ $mcu->user->jabatan }}</td>
                                            <td>{{ \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->format('d-m-Y') }}
                                            </td>
                                            {{-- <td>{{ $mcu->tanggal_pemeriksaan }}</td> --}}
                                            {{-- <td>{{ $mcu->berat_badan }}</td>
                                            <td>{{ $mcu->tinggi_badan }}</td>
                                            <td>{{ $mcu->anggota_gerak }}</td>
                                            <td>{{ $mcu->tekanan_darah }}</td>
                                            <td>{{ $mcu->nadi }}</td>
                                            <td>{{ $mcu->imt }}</td>
                                            <td>{{ $mcu->telinga }}</td>
                                            <td>{{ $mcu->hidung }}</td>
                                            <td>{{ $mcu->tenggorokan }}</td>
                                            <td>{{ $mcu->mata }}</td>
                                            <td>{{ $mcu->cardiovaskuler }}</td>
                                            <td>{{ $mcu->pernafasan }}</td>
                                            <td>{{ $mcu->abdomen }}</td> --}}
                                            {{-- <td>{{ $mcu->urine }}</td>
                                            <td>{{ $mcu->hematologi }}</td> --}}
                                            {{-- <td>{{ $mcu->audiometri }}</td>
                                            <td>{{ $mcu->spirometri }}</td>
                                            <td>{{ $mcu->riwayat_penyakit }}</td>
                                            <td>{{ $mcu->diagnosa }}</td>
                                            <td>{{ $mcu->saran }}</td>
                                            <td>{{ $mcu->hasil_akhir }}</td> --}}
                                            <td>

                                                {{-- <a href="{{ route('mcu.print', ['id' => $mcu->user->id, 'tahun' => \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year]) }}"
                                                   
                                                    class="btn btn-primary btn-icon-only m-0 p-0 btn-sm" target="_blank">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-print fa-lg"></i>
                                                    </span>
                                                </a>

                                                <a href="{{ route('mcu.edit', ['user' => $mcu->user->id, 'tahun' => \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year]) }}"
                                                    class="btn btn-info btn-icon-only m-0 p-0 btn-sm">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-edit fa-lg"></i>

                                                    </span>
                                                </a> --}}





                                                <a href="{{ route('rekapan.show', ['user_id' => $mcu->user->id]) }}"
                                                    class="btn btn-primary btn-icon-only m-0 p-0 btn-sm">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-eye fa-lg"></i>

                                                    </span>
                                                </a>
                                                {{-- <a href="#detail_lab{{ $mcu->user->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#detail_lab{{ $mcu->user->id }}"
                                                    class="btn btn-primary btn-icon-only m-0 p-0 btn-sm">
                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-eye fa-lg"></i>
                                                    </span>
                                                </a> --}}

                                                {{-- <a href=""
                                                    class="btn btn-warning btn-icon-only m-0 p-0 btn-sm">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-trash fa-lg"></i>

                                                    </span>
                                                </a> --}}
                                                {{-- <a href="{{ route('mcu.destroy', ['id' => $mcu->id_user, 'tahun' => \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year]) }}"
                                                    class="btn btn-warning btn-icon-only m-0 p-0 btn-sm delete-record"
                                                    onclick="event.preventDefault();
                                                             if (confirm('Apakah Anda yakin ingin menghapus ini?')) {
                                                                 document.getElementById('delete-form-{{ $mcu->id_user }}-{{ \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year }}').submit();
                                                             }">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-trash fa-lg"></i>
                                                    </span>
                                                </a>

                                                <form
                                                    id="delete-form-{{ $mcu->id_user }}-{{ \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year }}"
                                                    action="{{ route('mcu.destroy', ['id' => $mcu->id_user, 'tahun' => \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> --}}
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="28" class="text-center">Tidak ada data Medical Check Up</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('mcudokter.modal')

    <script>
        // Untuk Notif
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 6000,
            });
        @endif
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            var table = $('#example_mcu').DataTable({
                scrollX: true,
                // scrollY: 350,
                fixedColumns: {
                    leftColumns: 5,
                    rightColumns: 1
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"]
                ],
                columnDefs: [{
                    // jumlah kolom yg dapat di edit
                    // targets: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
                    //     25, 26, 27, 28,
                    // ],
                    className: 'editable'
                }],
                initComplete: function() {
                    // Inisialisasi filer
                    this.api().columns().every(function() {
                        var column = this;
                        if (column.index() === 3) { // Kolom Status
                            var select = $('#statusFilter')
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this)
                                        .val());
                                    column.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d + '">' + d +
                                    '</option>');
                            });
                        } else if (column.index() === 4) { // Kolom Departement
                            var select = $('#deptFilter')
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this)
                                        .val());
                                    column.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d + '">' + d +
                                    '</option>');
                            });
                        } else if (column.index() === 6) {}
                    });

                    // Menangani peristiwa editing
                    $('#example_mcu tbody').on('dblclick', 'td.editable', function() {
                        var cell = table.cell(this);
                        var originalValue = cell.data();
                        var columnIndex = cell.index().column;

                        // Menggunakan prompt untuk pengeditan sederhana, Anda dapat menggantinya dengan modal atau formulir sesuai kebutuhan Anda
                        var newValue = prompt('Edit Pemeriksaan:', originalValue);

                        // Jika pengguna memasukkan nilai baru, update data dan menggambar ulang tabel
                        if (newValue !== null) {
                            cell.data(newValue).draw();
                        }
                    });
                }
            });

            // Add the year filter change event
            $('#tahunFilter').change(function() {
                var year = $(this).val();
                table.column(5).search(year).draw(); // Assuming 'tgl_mcu' is the 7th column
            });
        });

        $('#example_mcu tbody').on('dblclick', 'td.editable', function() {
            var cell = table.cell(this);
            var originalValue = cell.data();
            var columnIndex = cell.index().column;

            // Menggunakan prompt untuk pengeditan sederhana, Anda dapat menggantinya dengan modal atau formulir sesuai kebutuhan Anda
            var newValue = prompt('Edit Pemeriksaan:', originalValue);

            // Jika pengguna memasukkan nilai baru, kirim data ke backend menggunakan Ajax
            if (newValue !== null) {
                var row = table.row(this.closest('tr'));
                var data = row.data();
                data[columnIndex] = newValue;

                // Menggunakan Ajax untuk menyimpan data ke database
                $.ajax({
                    // ini masing bingung  
                    url: '/mcu/saveInlineEdit/' + data[0], // Ganti URL sesuai dengan endpoint
                    method: 'PUT',
                    data: {
                        columnIndex: columnIndex,
                        newValue: newValue
                    },
                    success: function(response) {
                        // Tambahkan penanganan sukses jika diperlukan
                        console.log(response);
                        // Atau refresh halaman setelah penyimpanan berhasil
                        window.location.reload();
                    },
                    error: function(error) {
                        // Tambahkan penanganan kesalahan jika diperlukan
                        console.error(error);
                    }
                });
            }
        });
    </script>

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 6000,
            });
        @endif
    </script>
@endsection
@endsection
