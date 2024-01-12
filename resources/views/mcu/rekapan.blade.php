@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-3 font-weight-bold mb-0">Rekapan Medical Checkup untuk :
                                {{ $user->name }}</h5>

                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <div class="table-responsive p-0">
                            <form action="{{ route('rekapan.show') }}" method="get">
                                @csrf
                            </form>
                            @if (isset($medicalCheckups))
                                <table class="table table-striped table-hover align-items-center small-ttb compact "
                                    style="width:100%" id="rekapan">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 20px;">No</th>
                                            <th rowspan="2" class="text-center">Pemeriksaan</th>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <th class="text-center">{{ $mcu->tanggal_pemeriksaan }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <th>Hasil</th>
                                            @endforeach
                                            {{-- <th colspan="2">Hasil</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Berat badan</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->berat_badan }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Tekanan Darah</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->tekanan_darah }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>Nadi</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->nadi }}</td>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>IMT</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->imt }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>Mata</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->mata }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td>Telinga</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->telinga }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td>Hidung</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->hidung }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td>Tenggorokan</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->tenggorokan }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td>Cardiovaskuler</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->cardiovaskuler }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td>Pernafasan</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->pernafasan }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">11</td>
                                            <td>Abdomen</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->abdomen }}</td>
                                            @endforeach
                                        </tr>
                                        {{-- <tr>
                                            <td class="text-center">12</td>
                                            <td>Urine</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->urine }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">13</td>
                                            <td>Hematologi</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->hematologi }}</td>
                                            @endforeach
                                        </tr> --}}
                                        <tr>
                                            <td class="text-center">14</td>
                                            <td>Audiometri</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->audiometri }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">15</td>
                                            <td>Spirometri</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->spirometri }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">16</td>
                                            <td>Riwayat Penyakit</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->riwayat_penyakit }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">17</td>
                                            <td>Diagnosa</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->diagnosa }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">18</td>
                                            <td>Saran</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->saran }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-center">19</td>
                                            <td>Hasil Akhir</td>
                                            @foreach ($medicalCheckups as $index => $mcu)
                                                <td>{{ $mcu->hasil_akhir }}</td>
                                            @endforeach
                                        </tr>
                                        {{-- <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>Tanggal Pemeriksaan</td>
                                                <td>{{ $mcu->berat_badan }}</td>
                                                <td>{{ $mcu->hasil_akhir }}</td>
                                                <td>$</td>
                                                <td>$</td>
                                                <td>$</td>
                                            </tr> --}}
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

                <script>
                    $(document).ready(function() {
                        var table = $('#rekapan').DataTable({
                            "scrollX": true,
                            "scrollY": "400px",
                            "scrollCollapse": true,
                            "paging": false,
                            "ordering": true,
                            "info": true,


                        });

                        new $.fn.dataTable.FixedHeader(table);
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
