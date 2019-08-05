  <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">DONATE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/panduan">Panduan Donasi</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-primary ds" href="/donatur/donasi">Donasi Sekarang</a>
            </li>
            @if (!session('key'))
            <li class="nav-item">
              <div class="text-right btn-toolbar" >
                 <a class="btn btn-outline-primary lg" href="/login">Masuk</a>
                 <span style="width:0.5em;"> </span>
                 <a class="btn btn-outline-danger lg" href="/daftar">Daftar</a>    
            </li>
            
            
            
             @else
              <li class="nav-item dropdown">
                                <button type="button" class="btn dropdown-toggle btn-outline-primary btn-block" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user())
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    @endif
                                    @if(Auth::guard('admin')->user())
                                    {{Auth::guard('admin')->user()->name}}
                                    @endif
                                    
                                </button>

                                @if(Auth::user())
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $id = Auth::user()->id?>
                                    <a class="dropdown-item" href="{{ route('editProfile','$id') }}" onclick="event.preventDefault();
                                                     document.getElementById('edit-profile').submit();">Edit Profile</a>

                                    <a class="dropdown-item"href="{{ route('riwayatDonasi','$id') }}" onclick="event.preventDefault();
                                                     document.getElementById('riwayat-donasi').submit();">Riwayat Donasi</a>
                                                     
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="edit-profile" action="{{ route('editProfile',[$id]) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="riwayat-donasi" action="{{ route('riwayatDonasi',[$id]) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @else
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endif
                            </li>
            @endif
            </ul>
        </div>
        </div>
    </nav>
    <!-- akhir navbar -->