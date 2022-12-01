<div class="sidebar" data-color="blue">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            {{ __("SIPD") }}
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
            <li>
                <a data-toggle="collapse" href="#laravelExamples">
                    <i class="fab fa-laravel"></i>
                    <p>
                        {{ __("Data Pasien") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="@if ($activePage == 'kunjungan') active @endif">
                            <a href="{{ route('kunjungan.index') }}">
                                <span class="sidebar-mini-icon">{{ __("K") }}</span>
                                <span class="sidebar-normal"> {{ __("Kunjungan") }} </span>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'rekammedis') active @endif">
                            <a href="{{ route('rekammedis.index') }}">
                                <span class="sidebar-mini-icon">{{ __("RM") }}</span>
                                <span class="sidebar-normal"> {{ __("Rekam Medis") }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                @can('manage-users', App\User::class)
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="now-ui-icons design_image"></i>
                    <p>
                        {{ __("Data Master") }}
                        <b class="caret"></b>
                    </p>
                </a>
                @endcan
                <div class="collapse @if ($activeNav ?? '' == 'pages') show @endif" id="pagesExamples">
                    <ul class="nav">
                        @can('manage-users', App\User::class)
                        <li class="@if ($activePage == 'users') active @endif">
                            <a href="{{ route('user.index') }}">
                                <span class="sidebar-mini-icon">{{ __("DU") }}</span>
                                <span class="sidebar-normal"> {{ __("Data User") }} </span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-users', App\User::class)
                        <li class="@if ($activePage == 'dokter') active @endif">
                            <a href="{{ route('dokter.index') }}">
                                <span class="sidebar-mini-icon">{{ __("DD") }}</span>
                                <span class="sidebar-normal"> {{ __("Data Dokter") }} </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
