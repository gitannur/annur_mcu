@extends('layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Data Karyawan</h6>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-2">
                        <div class="table-responsive p-0">
                            <table id="users-table" class="display nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Grade</th>
                                        <th>Departement</th>
                                        <th>Jabatan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Start</th>
                                        <th>Pendidikan</th>
                                        <th>Agama</th>
                                        <th>Domisili</th>
                                        <th>Email</th> 
                                        <th>No KTP</th>
                                        <th>No Telpon</th>
                                        <th>KIS</th>
                                        <th>KPJ</th>
                                        <th>Suku</th>
                                        <th>No Sepatu Safety</th>
                                        <th>Start Work User</th>
                                        <th>End Work User</th>
                                        <th>Loc Kerja</th>
                                        <th>Loc</th>
                                        <th>Sistem Absensi</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Aktual Cuti</th>
                                        <th>Status Pernikahan</th>
                                        <th>Istri/Suami</th>
                                        <th>Anak 1</th>
                                        <th>Anak 2</th>
                                        <th>Anak 3</th> 
                                        <th>Access by</th>
                                        <th>Image url</th>
                                        <th>Role app</th>
                                        <th>Active</th>
                                        <th>Email Verified at</th>
                                        <th>Password</th>
                                        <th>Remember Token at</th>
                                        {{-- <th>Updated at</th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="nowrap">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->grade }}</td>
                                            <td>{{ $user->dept }}</td>
                                            <td>{{ $user->jabatan }}</td>
                                            <td>{{ $user->sex }}</td>
                                            <td class="nowrap">{{ $user->ttl }}</td>
                                            <td>{{ $user->start }}</td>
                                            <td>{{ $user->pendidikan }}</td>
                                            <td>{{ $user->agama }}</td>
                                            <td>{{ $user->domisili }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->no_ktp }}</td>
                                            <td>{{ $user->no_telpon }}</td>
                                            <td>{{ $user->kis }}</td>
                                            <td>{{ $user->kpj }}</td>
                                            <td>{{ $user->suku }}</td>
                                            <td>{{ $user->no_sepatu_safety }}</td>
                                            <td>{{ $user->start_work_user }}</td>
                                            <td>{{ $user->end_work_user }}</td>
                                            
                                            <td>{{ $user->loc_kerja }}</td>
                                            <td>{{ $user->loc }}</td>
                                            <td>{{ $user->sistem_absensi }}</td>
                                            <td>{{ $user->latitude }}</td>
                                            <td>{{ $user->longitude }}</td>
                                            <td>{{ $user->aktual_cuti  }}</td>
                                            <td>{{ $user->status_pernikahan	 }}</td>
                                            <td>{{ $user->istri_suami }}</td>
                                            <td>{{ $user->anak_1 }}</td>
                                            <td>{{ $user->anak_2 }}</td>
                                            <td>{{ $user->anak_3 }}</td>
                                            <td>{{ $user->access_by }}</td>
                                            <td>{{ $user->image_url }}</td>
                                            <td>{{ $user->role_app }}</td>
                                            <td>{{ $user->active }}</td>
                                            <td>{{ $user->email_verified_at }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->remember_token }}</td>
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

    <script>
        $(document).ready(function() {
            // var filters = $('<div class="filters"></div>').insertBefore('#users-table');
            $('#users-table').DataTable({


                scrollX: true,
                scrollY: '400px',

               
            });
        });
    </script>
@endsection
