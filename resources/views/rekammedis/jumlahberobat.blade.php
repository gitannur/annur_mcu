@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3 font-weight-bold mb-0">Summary Rekap Berobat per Departemen
                            </h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <form action="{{ route('rekammedis.jumlahberobat') }}" method="GET"
                            class="row gx-3 align-items-end">
                            {{-- <div class="col-md-2 mb-2">
                                <label for="bulanFilter" class="form-label">-Bulan-</label>
                                <select id="bulanFilter" name="month" class="form-select">
                                    <option value=""></option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div> --}}
                            <div class="col-md-2 mb-2">
                                <label for="tahunFilter" class="form-label">-Tahun-</label>
                                <select id="tahunFilter" name="year" class="form-select">
                                    <option value=""></option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="form-label invisible">&nbsp;</label>
                                <button type="submit" class="btn btn-primary mb-0">Filter</button>
                            </div>
                        </form>

                        <div class="table-responsive p-3 mt-3 d-flex ">
                            @if (isset($departmentStats))
                            <table class="table table-striped table-hover small-ttb compact table-sm" style="width:100%" id="jumberobat">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Dept</th>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <th class="text-center">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</th>
                                        @endfor
                                        <th class="text-center">Jumlah Berobat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departmentStats as $index => $stat)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $stat->dept }}</td>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <td class="text-center">{{ $stat["month_$i"] }}</td>
                                            @endfor
                                            <td class="text-center">{{ $stat->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
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
                "scrollX": true,
                // "scrollY": "400px",
                "scrollCollapse": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "searching":true,
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>



@endsection
