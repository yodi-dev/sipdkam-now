<div class="sidebar" data-color="blue">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            {{ __("SIM") }}
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __("K. Al Mubarok") }}
        </a>
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-simple btn-icon btn-round">
                <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
                <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img style="max-height:100%; max-width:none; width:auto;"
                    src="{{ auth()->user()->profilePicture() }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ auth()->user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __("MP") }}</span>
                                <span class="sidebar-normal">{{ __("My Profile") }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini-icon">{{ __("LG") }}</span>
                                <span class="sidebar-normal">{{ __("Logout") }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a href="{{ route('home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            @can('manage-dokter', App\User::class)
            <li>
                <a data-toggle="collapse" href="#dataPasien">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>
                        {{ __("Pasien") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($activeNav == 'datapasien') show @endif" id="dataPasien">
                    <ul class="nav">
                        <li class="@if ($activePage == 'kunjungan') active @endif">
                            <a href="{{ route('kunjungan.index') }}">
                                <span class="sidebar-mini-icon">{{ __("K") }}</span>
                                <span class="sidebar-normal"> {{ __("Kunjungan") }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
            @can('manage-items', App\User::class)
            <li>
                <a data-toggle="collapse" href="#dataPasien">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>
                        {{ __("Pasien") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($activeNav == 'datapasien') show @endif" id="dataPasien">
                    <ul class="nav">
                        <li class="@if ($activePage == 'kunjungan') active @endif">
                            <a href="{{ route('kunjungan.index') }}">
                                <span class="sidebar-mini-icon">{{ __("K") }}</span>
                                <span class="sidebar-normal"> {{ __("Kunjungan") }} </span>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'rekammedis') active @endif">
                            <a href="{{ route('rekam.index') }}">
                                <span class="sidebar-mini-icon">{{ __("RM") }}</span>
                                <span class="sidebar-normal"> {{ __("Rekam Medis") }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
            <li>
                <a data-toggle="collapse" href="#klinik">
                    <i class="now-ui-icons health_ambulance"></i>
                    <p>
                        {{ __("Klinik") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($activeNav == 'klinik') show @endif" id="klinik">
                    <ul class="nav">
                        @can('manage-items', App\User::class)
                        <li class="@if ($activePage == 'datainventori') active @endif">
                            <a href="{{ route('inventori.index') }}">
                                <span class="sidebar-mini-icon">{{ __("I") }}</span>
                                <span class="sidebar-normal"> {{ __("Inventaris") }} </span>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'jadwal') active @endif">
                            <a href="{{ route('jadwal.index') }}">
                                <span class="sidebar-mini-icon">{{ __("J") }}</span>
                                <span class="sidebar-normal"> {{ __("Jadwal") }} </span>
                            </a>
                        </li>
                        {{-- <li class="@if ($activePage == 'datapegawai') active @endif">
                            <a href="{{ route('pegawai.index') }}">
                                <span class="sidebar-mini-icon">{{ __("P") }}</span>
                                <span class="sidebar-normal"> {{ __("Pegawai") }} </span>
                            </a>
                        </li> --}}
                        @endcan
                        {{-- <li class="@if ($activePage == 'utang') active @endif">
                            <a href="{{ route('utang.index') }}">
                                <span class="sidebar-mini-icon">{{ __("U") }}</span>
                                <span class="sidebar-normal"> {{ __("Utang") }} </span>
                            </a>
                        </li> --}}
                        <li class="@if ($activePage == 'statistikKunjungan') active @endif">
                            <a href="{{ route('statistik.kunjungan') }}">
                                <span class="sidebar-mini-icon">{{ __("SK") }}</span>
                                <span class="sidebar-normal"> {{ __("Statistik Kunjungan") }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @can('admin-petugas', App\User::class)
            <li>
                <a data-toggle="collapse" href="#laporan">
                    <i class="now-ui-icons business_briefcase-24"></i>
                    <p>
                        {{ __("Laporan") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($activeNav == 'laporan') show @endif" id="laporan">
                    <ul class="nav">
                        <li class="@if ($activePage == 'laporanKunjungan') active @endif">
                            <a href="{{ route('laporan.kunjungan') }}">
                                <span class="sidebar-mini-icon">{{ __("LK") }}</span>
                                <span class="sidebar-normal"> {{ __("Laporan Kunjungan") }} </span>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'laporanKeuangan') active @endif">
                            <a href="{{ route('laporanKeuangan.kunjungan') }}">
                                <span class="sidebar-mini-icon">{{ __("LKU") }}</span>
                                <span class="sidebar-normal"> {{ __("Laporan Keuangan") }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
            <li>
                @can('manage-users', App\User::class)
                <a data-toggle="collapse" href="#dataMaster">
                    <i class="now-ui-icons files_box"></i>
                    <p>
                        {{ __("Data Master") }}
                        <b class="caret"></b>
                    </p>
                </a>
                @endcan
                <div class="collapse @if ($activeNav ?? '' == 'pages') show @endif" id="dataMaster">
                    <ul class="nav">
                        @can('manage-users', App\User::class)
                        <li class="@if ($activePage == 'users') active @endif">
                            <a href="{{ route('user.index') }}">
                                <span class="sidebar-mini-icon">{{ __("DU") }}</span>
                                <span class="sidebar-normal"> {{ __("Data User") }} </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
