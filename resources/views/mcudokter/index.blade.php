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
                        <a href="{{ route('mcudokter.create') }}" class="btn btn-sm btn-primary">Input</a>

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
                        <table id="dokter" class="table table-striped table-hover align-items-center small-ttb compact"
                            style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center">ID</th> --}}
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Dept</th>
                                    <th class="text-center">Jabatan</th>

                                    <th class="text-center">Tanggal</th>

                                    {{-- <th class="text-center">Urine</th> --}}
                                    {{-- <th class="text-center">Hematologi</th> --}}

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($laboratorium) && count($laboratorium) > 0)
                                    @foreach ($laboratorium as $mcu)
                                        <tr class="text-center">

                                            {{-- <td>{{ $mcu->user->id }}</td> --}}
                                            <td>{{ $mcu->user->nik }}</td>

                                            <td>{{ $mcu->user->name }}</td>
                                            <td>{{ $mcu->user->status }}</td>
                                            <td>{{ $mcu->user->dept }}</td>
                                            <td>{{ $mcu->user->jabatan }}</td>
                                            <td>{{ \Carbon\Carbon::parse($mcu->tanggal)->format('d-m-Y') }}</td>

                                            {{-- <td>{{ $mcu->urine }}</td>
                                            <td>{{ $mcu->hematologi }}</td> --}}

                                            <td>

                                                {{-- <a href="{{ route('mcu.print', ['id' => $mcu->user->id, 'tahun' => \Carbon\Carbon::parse($mcu->tanggal_pemeriksaan)->year]) }}" --}}
                                                {{-- class="btn btn-lg m-0 bg-transparent"> --}}
                                                {{-- class="btn btn-warning btn-icon-only m-0 p-0 btn-sm"> --}}

                                                {{-- <span class="btn-inner--icon">
                                                        <i class="fas fa-print fa-lg"></i>
                                                    </span>
                                                </a> --}}

                                                <a href="#detail_lab{{ $mcu->user->id.date("Y", strtotime($mcu->tanggal)) }}" data-bs-toggle="modal"
                                                    class="btn btn-primary btn-icon-only m-0 p-0 btn-sm">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-eye fa-lg"></i>

                                                    </span>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="28" class="text-center">Tidak ada data </td>
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

    {{-- modal --}}
    @include('mcudokter.modal')
   



    {{-- SCRIPT --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    {{-- modal --}}
    <script>
        $(document).ready(function() {
            // Saat modal ditampilkan
            $('.modal').on('shown.bs.modal', function() {
                // Hitung tinggi konten modal
                var modalBodyHeight = $(this).find('.modal-body').height();

                // Hitung dan atur tinggi modal
                var modalHeight = modalBodyHeight + 200; // Sesuaikan angka 200 sesuai kebutuhan
                $(this).find('.modal-content').css('height', modalHeight + 'px');
            });
        });
    </script>
    {{-- datatables --}}
    <script>
        $(document).ready(function() {
            var table = $('#dokter').DataTable({
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
                        } else if (column.index() === 6) { // Kolom Tanggal Check Up (tahun)

                        }
                    });

                    // ini tidak berfungsi 
                    $('#example_mcu tbody').on('dblclick', 'td.editable', function() {
                        var cell = table.cell(this);
                        var originalValue = cell.data();
                        var columnIndex = cell.index().column;

                       
                        var newValue = prompt('Edit Pemeriksaan:', originalValue);

                        // Jika pengguna memasukkan nilai baru, update data dan menggambar ulang tabel
                        if (newValue !== null) {
                            cell.data(newValue).draw();
                        }
                    });
                }
            });

            
            $('#tahunFilter').change(function() {
                var year = $(this).val();
                table.column(5).search(year).draw();
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
@endsection
