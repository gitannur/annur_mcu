@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3">Rekam Medis Non Karyawan</h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <div class="row">
                            <div class="col-auto pe-0">
                                <a href="{{ route('rekammedis_nonkaryawan.create_nonkaryawan') }}"
                                    class="btn btn-sm btn-primary">Input </a>
                            </div>

                            <div class="col">

                            </div>
                            <div class="mb-2">
                                <div class="row gx-3">

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
                            <table id="rekammedis"
                                class="table table-striped table-hover align-items-center small-ttb compact"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th class="text-center">ID</th> --}}
                                        <th class="text-center">No RM</th>
                                        <th class="text-center">Nama</th>
                                        {{-- <th class="text-center">Status</th>
                                    <th class="text-center">Dept</th> --}}
                                        <th class="text-center text-nowrap">Tgl Pemeriksaan</th>
                                        <th class="text-center">Anamesis</th>
                                        <th class="text-center text-nowrap">Tekanan Darah</th>
                                        <th class="text-center">Nadi</th>
                                        <th class="text-center">Pernafasan</th>
                                        <th class="text-center">Vas</th>
                                        <th class="text-center">Suhu</th>
                                        <th class="text-center text-nowrap">Pengobatan</th>
                                        <th class="text-center text-nowrap">Nama Dokter</th>
                                        <th class="text-center text-nowrap">Diagnosis</th>
                                        <th class="text-center text-nowrap">Jenis Penyakit</th>
                                        <th class="text-center text-nowrap">Head To Toe</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($nonkaryawan as $rm)
                                        <tr class="">
                                            {{-- <td>{{ $rm->user->id }}</td> --}}
                                            <td>{{ $rm->id }}</td>
                                            <td>{{ $rm->nama }}</td>
                                            {{-- <td>{{ $rm->status }}</td>
                                        <td>{{ $rm->dept }}</td> --}}
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($rm->tanggal)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $rm->anamesis }}</td>
                                            <td>{{ $rm->tekanan_darah }}</td>
                                            <td>{{ $rm->nadi }}</td>
                                            <td>{{ $rm->pernafasan }}</td>
                                            <td>{{ $rm->vas }}</td>
                                            <td>{{ $rm->suhu }}</td>
                                            <td>{{ $rm->pengobatan }}</td>
                                            <td>{{ $rm->nama_dokter }}</td>
                                            <td>{{ $rm->diagnosis }}</td>
                                            <td>{{ $rm->daftar_penyakit->nama_penyakit }}</td>
                                            <td>{{ $rm->head_to_toe }}</td>
                                            <td>

                                                <a href="{{ route('rekammedis_nonkaryawan.edit_nonkaryawan', ['id' => $rm->id, 'tahun' => \Carbon\Carbon::parse($rm->tanggal)->year]) }}"
                                                    class="btn btn-info btn-icon-only m-0 p-0 btn-sm">
                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-edit fa-lg"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('rekammedis_nonkaryawan.show_nonkaryawan', ['id' => $rm->id]) }}"
                                                    class="btn btn-primary btn-icon-only m-0 p-0 btn-sm">
                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-eye fa-lg"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('rekammedis_nonkaryawan.destroy_nonkaryawan', ['id' => $rm->id, 'tahun' => \Carbon\Carbon::parse($rm->tanggal)->year]) }}"
                                                    class="btn btn-warning btn-icon-only m-0 p-0 btn-sm delete-record"
                                                    onclick="event.preventDefault();
                                                         if (confirm('Apakah Anda yakin ingin menghapus ini?')) {
                                                             document.getElementById('delete-form-{{ $rm->id }}-{{ \Carbon\Carbon::parse($rm->tanggal)->year }}').submit();
                                                         }">

                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-trash fa-lg"></i>
                                                    </span>
                                                </a>

                                                <form
                                                    id="delete-form-{{ $rm->id }}-{{ \Carbon\Carbon::parse($rm->tanggal)->year }}"
                                                    action="{{ route('rekammedis_nonkaryawan.destroy_nonkaryawan', ['id' => $rm->id, 'tahun' => \Carbon\Carbon::parse($rm->tanggal)->year]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Tidak ada data Rekam Medis</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $(document).ready(function() {
                var table = $('#rekammedis').DataTable({
                    scrollX: true,
                    // scrollY: 350,
                    fixedColumns: {
                        leftColumns: 4,
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
                            if (column.index() === 2) { // Kolom Status
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
                            } else if (column.index() === 3) { // Kolom Departement
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
                            } else if (column.index() === 2) { // Kolom Tanggal Check Up (tahun)

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
                    table.column(2).search(year).draw();
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
