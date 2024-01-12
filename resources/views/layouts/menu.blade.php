@php
    $currentRoute = Route::currentRouteName();
@endphp
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src="{{ asset('assets/img/bridgestone_outline.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Medical Check Up</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($currentRoute, 'dashboard.index') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('/') }}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">dashboard</i>
                    </div>

                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($currentRoute, 'user.index') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('/user') }}">


                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">supervised_user_circle</i>
                    </div>

                    <span class="nav-link-text ms-1"> Karyawan</span>
                </a>
            </li>

            <li class="nav-item">
                <div class="nav-link text-white {{ Str::startsWith($currentRoute, 'mcu.index') ? 'active bg-gradient-primary' : '' }}"
                    data-bs-toggle="collapse" href="#mcuDropdown" role="button" aria-expanded="false">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">medical_information</i>
                    </div>
                    <span class="nav-link-text ms-1">Medical Check Up</span>
                </div>
                <div class="collapse" id="mcuDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/mcu') }}">
                                MCU - Laboratorium
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/mcu') }}">
                                MCU - Dokter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('mcu/sumarymcu') }}">
                               MCU - Summary 
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($currentRoute, 'mcudokter.index') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('/mcudokter') }}">


                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">person_outline</i>
                    </div>

                    <span class="nav-link-text ms-1">Laboratorium</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <div class="nav-link text-white {{ Str::startsWith($currentRoute, 'rekammedis.rekammedis') ? 'active bg-gradient-primary' : '' }}"
                    data-bs-toggle="collapse" href="#rekamMedisDropdown">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">medical_information</i>
                    </div>
                    <span class="nav-link-text ms-1">Rekam Medis</span>
                </div>
                <div class="collapse" id="rekamMedisDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/rekammedis') }}">
                                Karyawan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('rekammedis_nonkaryawan/index_nonkaryawan') }}">
                                Non Karyawan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('rekammedis/jenispenyakit') }}">
                                Summary Jenis Penyakit
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('rekammedis/nonkaryawan') }}">
                                Summary Jumlah Pasien
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('rekammedis/jumlahberobat') }}">

                                Summary Karyawan Berobat
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-danger" href="{{ url('/login') }}">

                    <div class="text-danger text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>

                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>


</aside>
