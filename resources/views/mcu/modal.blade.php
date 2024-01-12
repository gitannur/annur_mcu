
@foreach ($medicalcheckup as $mcu)
    <div class="modal fade" id="detail_lab{{ $mcu->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 80%; ">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Hasil Laboratorium : ({{$mcu->user->nik}}) {{$mcu->user->name}}</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row">
                    <div class="col">
                        NIK
                    </div>
                    <div class="col">
                        : {{ $mcu->user->nik }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Name
                    </div>
                    <div class="col">
                        : {{ $mcu->user->name }}
                    </div>
                </div> --}}
                    <div class="row">
                        <div class="col">
                            <h5>Hematologi</h5>
                            <table class="small-font">
                                <!-- Hematologi content -->

                                <tr>
                                    <td>
                                        Hemoglobin
                                    </td>
                                    <td>
                                        : {{ $mcu->hemoglobin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Eritrosit
                                    </td>
                                    <td>
                                        : {{ $mcu->eritrosit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Luekosit
                                    </td>
                                    <td>
                                        : {{ $mcu->luekosit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hematokrit
                                    </td>
                                    <td>
                                        : {{ $mcu->hematokrit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Trombosit
                                    </td>
                                    <td>
                                        : {{ $mcu->trombosit }}
                                    </td>
                                </tr>
                               
                                   

                               
                            </table>
                           

                        </div>
                        <div class="col">
                            <h5>Kimia Klinik</h5>
                            <table class="small-font">
                                <!-- Kimia Klinik content -->
                                <tr>
                                    <td>
                                        Glukosa-Sewaktu
                                    </td>
                                    <td>
                                        : {{ $mcu->glukosa_sewaktu }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col">
                            <h5>Urinalisis Makroskopis</h5>
                            <table class="small-font">
                                <!-- Urine content -->
                                <tr>
                                    <td>
                                        Warna
                                    </td>
                                    <td>
                                        : {{ $mcu->warna }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Kejernihan
                                    </td>
                                    <td>
                                        : {{ $mcu->kejernihan }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col">
                            <h5>Kimia Urine</h5>
                            <table class="small-font">
                                <!-- Kimia Urine content -->
                                <tr>
                                    <td>
                                        B.J
                                    </td>
                                    <td>
                                        : {{ $mcu->bj }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ph
                                    </td>
                                    <td>
                                        : {{ $mcu->ph }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Leuko
                                    </td>
                                    <td>
                                        : {{ $mcu->leuko }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nitrit
                                    </td>
                                    <td>
                                        : {{ $mcu->nitrit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Protein
                                    </td>
                                    <td>
                                        : {{ $mcu->protein }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Glukosa
                                    </td>
                                    <td>
                                        : {{ $mcu->glukosa }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Keton
                                    </td>
                                    <td>
                                        : {{ $mcu->keton }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Urobil
                                    </td>
                                    <td>
                                        : {{ $mcu->urobil }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bili
                                    </td>
                                    <td>
                                        : {{ $mcu->bili }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Blood
                                    </td>
                                    <td>
                                        : {{ $mcu->blood }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col">
                            <h5>Mikroskopis</h5>
                            <table class="small-font">
                                <!-- Kimia Urine content -->
                                <tr>
                                    <td>
                                        leuko
                                    </td>
                                    <td>
                                        : {{ $mcu->m_leuko }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        eri
                                    </td>
                                    <td>
                                        : {{ $mcu->eri }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        epitel
                                    </td>
                                    <td>
                                        : {{ $mcu->epitel }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        kristal
                                    </td>
                                    <td>
                                        : {{ $mcu->kristal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        bakteri
                                    </td>
                                    <td>
                                        : {{ $mcu->bakteri }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        jamur
                                    </td>
                                    <td>
                                        : {{ $mcu->jamur }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        silinder
                                    </td>
                                    <td>
                                        : {{ $mcu->silinder }}
                                    </td>
                                </tr>

                                <td>
                                    Blood
                                </td>
                                <td>
                                    : {{ $mcu->blood }}
                                </td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn bg-gradient-primary">Print</button> --}}
                    <a href="{{ route('mcu.print_lab', ['id' => $mcu->user->id, 'year' => \Carbon\Carbon::parse($mcu->tanggal)->year]) }}"
                        class="btn btn-sm btn-primary" target="_blank">
                        Print
                    </a>
                    <a href="{{ route('mcu.edit_lab', ['user' => $mcu->user->id, 'tahun' => \Carbon\Carbon::parse($mcu->tanggal)->year]) }}"
                        class="btn btn-sm btn-primary">
                        Edit
                    </a>
                    {{-- <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button> --}}
                </div>
            </div>
        </div>
    </div>


    <script>
        // Inisialisasi modal untuk halaman rekam medis
        $(document).ready(function() {
            $('#detail_lab_{{ $mcu->user->id }}').modal();
        });

        // Inisialisasi modal untuk halaman mcu
        $(document).ready(function() {
            $('#detail_lab_{{ $mcu->user->id }}').modal();
        });
    </script>

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
@endforeach
