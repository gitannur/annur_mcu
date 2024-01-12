@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            
                                <h6 class="text-white text-capitalize ps-3 font-weight-bold mb-0">
                                    Rekapan Rekam Medis Non Karyawan
                                </h6>
                        

                            {{-- <h6 class="text-white text-capitalize ps-3 font-weight-bold mb-0">Rekap Pemeriksaan Tahunan</h6> --}}
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <div class="table-responsive p-0">
                            <form action="{{ route('rekammedis_nonkaryawan.show_nonkaryawan') }}" method="get">
                                @csrf


                            </form>
                            @if (isset($nonkaryawan))
                                <table class="table table-striped table-hover align-items-center small-ttb compact "
                                    style="width:100%" id="rekapan">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 20px;">No</th>
                                            <th rowspan="2" class="text-center">Pemeriksaan</th>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <th class="text-center">{{ $rm->tanggal }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <th>Hasil</th>
                                            @endforeach
                                            {{-- <th colspan="2">Hasil</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Anamesis</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->anamesis }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Tekanan Darah</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->tekanan_darah }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>Nadi</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->nadi }}</td>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>Pernafasan</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->pernafasan }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>Vas</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->vas }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td>Saturasi Oksigen</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->saturasi_oksigen }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td>Suhu</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->suhu }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td>Pengobatan</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->pengobatan }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td>Head To Toe</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->head_to_toe }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td>Diagnosis</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->diagnosis }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">11</td>
                                            <td>Nama Dokter</td>
                                            @foreach ($nonkaryawan as $index => $rm)
                                                <td>{{ $rm->nama_dokter }}</td>
                                            @endforeach
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>

                <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
                <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
                <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
                <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
                <!-- Jquery JS-->
                <script src="{{ asset('assets/libs/jquery/jquery-3.7.0.min.js') }}"></script>

                <!-- Datatable JS-->
                <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
                <script src="{{ asset('assets/libs/datatables/fixheader/dataTables.fixedHeader.min.js') }}"></script>
                {{-- <script>
                    $(document).ready(function() {
                        $('.table').DataTable();
                       
                          
                    });
                </script> --}}
                <script>
                    $(document).ready(function() {
                        var table = $('#rekapan').DataTable({
                            "scrollX": true,
                            "scrollY": "400px",
                            "scrollCollapse": true,
                            "paging": false,
                            "ordering": true,
                            "info": false,
                            fixedColumns: {
                                leftColumns: 2,

                            },


                        });

                        new $.fn.dataTable.FixedHeader(table);
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
