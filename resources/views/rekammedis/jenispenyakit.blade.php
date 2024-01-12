@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3 font-weight-bold mb-0">Summary Jenis Penyakit</h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <form action="" method="GET" class="row gx-3 align-items-end">
                            <div class="col-md-2 mb-2">
                                <label for="tahunFilter" class="form-label">-Tahun-</label>
                                <select id="tahunFilter" name="year" class="form-select">
                                    <option value=""></option>
                                    {{-- @foreach ($years as $year) --}}
                                    {{-- <option value="{{ $year }}">{{ $year }}</option> --}}
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            {{-- <div class="col-md-2 mb-2">
                                <label for="bulanFilter" class="form-label">-Bulan-</label>
                                <select id="bulanFilter" name="month" class="form-select">
                                    <option value=""></option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="hariFilter" class="form-label">-Hari-</label>
                                <select id="hariFilter" name="day" class="form-select">
                                    <option value=""></option>
                                    @foreach ($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="col-md-2 mb-2">
                                <label class="form-label invisible">&nbsp;</label>
                                <button type="submit" class="btn btn-sm btn-primary mb-0">Filter</button>
                            </div>
                        </form>

                        <div>
                            <table class="table table-striped table-hover small-ttb compact table-sm" id="jumberobat"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        {{-- <th class="text-center">Departemen</th> --}}
                                        <th class="text-center">Jenis Penyakit</th>
                                        <th class="text-center">Januari</th>
                                        <th class="text-center">Februari</th>
                                        <th class="text-center">Maret</th>
                                        <th class="text-center">April</th>
                                        <th class="text-center">Mei</th>
                                        <th class="text-center">Juni</th>
                                        <th class="text-center">Juli</th>
                                        <th class="text-center">Agustus</th>
                                        <th class="text-center">September</th>
                                        <th class="text-center">Oktober</th>
                                        <th class="text-center">November</th>
                                        <th class="text-center">Desember</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($data as $penyakitId => $penyakitData)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            {{-- <td class="text-center">{{$penyakitData['dept'][$i]}}</td> --}}
                                            <td class="text-center">{{ $penyakitData['penyakit'] }}</td>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <td class="text-center">
                                                    {{ isset($penyakitData['months'][$i]) ? $penyakitData['months'][$i] : 0 }}
                                                </td>
                                            @endfor
                                            <td class="text-center">{{ array_sum($penyakitData['months'] ?? []) }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    <script>
        $(document).ready(function() {
            var table = $('#jumberobat').DataTable({
                fixedColumns: {
                    leftColumns: 2,
                    // rightColumns: 1
                },
                "scrollX": true,
                "paging": false,
                "ordering": true,
                "info": true,
                "searching": true,
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
@endsection
