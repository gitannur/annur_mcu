
@foreach ($laboratorium as $lab)
    <div class="modal fade" id="detail_lab{{ $lab->user->id.date("Y", strtotime($lab->tanggal))}}" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 80%; ">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Hasil Laboratorium</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row">
                    <div class="col">
                        NIK
                    </div>
                    <div class="col">
                        : {{ $lab->user->nik }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Name
                    </div>
                    <div class="col">
                        : {{ $lab->user->name }}
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
                                        : {{ $lab->hemoglobin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Eritrosit
                                    </td>
                                    <td>
                                        : {{ $lab->eritrosit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Luekosit
                                    </td>
                                    <td>
                                        : {{ $lab->luekosit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hematokrit
                                    </td>
                                    <td>
                                        : {{ $lab->hematokrit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Trombosit
                                    </td>
                                    <td>
                                        : {{ $lab->trombosit }}
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
                                        : {{ $lab->glukosa_sewaktu }}
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
                                        : {{ $lab->warna }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Kejernihan
                                    </td>
                                    <td>
                                        : {{ $lab->kejernihan }}
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
                                        : {{ $lab->bj }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ph
                                    </td>
                                    <td>
                                        : {{ $lab->ph }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Leuko
                                    </td>
                                    <td>
                                        : {{ $lab->leuko }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nitrit
                                    </td>
                                    <td>
                                        : {{ $lab->nitrit }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Protein
                                    </td>
                                    <td>
                                        : {{ $lab->protein }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Glukosa
                                    </td>
                                    <td>
                                        : {{ $lab->glukosa }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Keton
                                    </td>
                                    <td>
                                        : {{ $lab->keton }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Urobil
                                    </td>
                                    <td>
                                        : {{ $lab->urobil }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bili
                                    </td>
                                    <td>
                                        : {{ $lab->bili }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Blood
                                    </td>
                                    <td>
                                        : {{ $lab->blood }}
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
                                        : {{ $lab->m_leuko }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        eri
                                    </td>
                                    <td>
                                        : {{ $lab->eri }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        epitel
                                    </td>
                                    <td>
                                        : {{ $lab->epitel }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        kristal
                                    </td>
                                    <td>
                                        : {{ $lab->kristal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        bakteri
                                    </td>
                                    <td>
                                        : {{ $lab->bakteri }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        jamur
                                    </td>
                                    <td>
                                        : {{ $lab->jamur }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        silinder
                                    </td>
                                    <td>
                                        : {{ $lab->silinder }}
                                    </td>
                                </tr>

                                <td>
                                    Blood
                                </td>
                                <td>
                                    : {{ $lab->blood }}
                                </td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn bg-gradient-primary">Print</button> --}}
                    <a href="{{ route('mcudokter.print', ['id' => $lab->user->id, 'year' => \Carbon\Carbon::parse($lab->tanggal)->year]) }}"
                        class="btn btn-sm btn-primary" target="_blank">
                        Print
                    </a>
                    <a href="{{ route('mcudokter.edit', ['user' => $lab->user->id, 'tahun' => \Carbon\Carbon::parse($lab->tanggal)->year]) }}"
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
            $('#detail_lab_{{ $lab->user->id }}').modal();
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
