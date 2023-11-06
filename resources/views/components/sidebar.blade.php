            <div class="user-profile">
                <div class="display-avatar animated-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                </div>
                <div class="info-wrapper">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <h6 class="display-income">{{ Auth::user()->role }}</h6>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
                <ul class="navigation-menu">
                    <li class="nav-category-divider">MAIN</li>
                    <li>
                        <a href="/dashboard">
                            <span class="link-title">Dashboard</span>
                            <i class="mdi mdi-gauge link-icon"></i>
                        </a>
                    </li>

                    <li>
                        <a href="/dokumen-plotting">
                            <span class="link-title">Dokumen Plotting</span>
                            <i class="mdi mdi-clipboard-outline link-icon"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
                            <span class="link-title">Transaksi</span>
                            <i class="mdi mdi-flask link-icon"></i>
                        </a>
                        <ul class="collapse navigation-submenu" id="sample-pages">

                            <li>
                                <a href="{{ route('peminjaman') }}">Riwayat Peminjaman/Pengembalian</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="/buku-tanah">
                            <span class="link-title">Buku Tanah</span>
                            <i class="mdi mdi-clipboard-outline link-icon"></i>
                        </a>
                    </li>


                    <li>
                        <a href="/arsip-ploting">
                            <span class="link-title">Arsip Dokumen Plotting</span>
                            <i class="mdi mdi-bullseye link-icon"></i>
                        </a>
                    </li>
                </ul>
            @endif

            @if (Auth::user()->role == 'petugas')
                <ul class="navigation-menu">
                    <li class="nav-category-divider">MAIN</li>
                    <li>
                        <a href="/dashboard">
                            <span class="link-title">Dashboard</span>
                            <i class="mdi mdi-gauge link-icon"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
                            <span class="link-title">Transaksi</span>
                            <i class="mdi mdi-flask link-icon"></i>
                        </a>
                        <ul class="collapse navigation-submenu" id="sample-pages">

                            <li>
                                <a href="{{ route('riwayat') }}">Peminjaman/Pengembalian</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="/buku-tanah">
                            <span class="link-title">Buku Tanah</span>
                            <i class="mdi mdi-clipboard-outline link-icon"></i>
                        </a>
                    </li>

                </ul>
            @endif
