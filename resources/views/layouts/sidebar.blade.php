        <div id="left-sidebar" class="sidebar">
            <button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
                <span class="sr-only">Toggle Fullwidth</span>
                <i class="fa fa-angle-left"></i>
            </button>
            <div class="sidebar-scroll">
                <div class="user-account">
                    <img src="{{ asset('upload/foto/'.auth()->user()->image) }}" class="img-responsive img-circle center-block" alt="User Profile Picture">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>{{ auth()->user()->name }} </strong> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right account">
                            <li><a href="{{ route('setting.edit', 1) }}">Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();getElementById('form-logout').submit();">Logout</a></li>
                            {!! Form::open(['route'=>'logout', 'method'=>'post', 'id'=>'form-logout']) !!}
                            {!! Form::close() !!}
                        </ul>
                    </div>
                </div>
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="{{ $linkdashboard or '' }}"><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        @role('admin')
                        <li class="{{ $linkusermanagement or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-cog"></i> <span>User Management</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkrole or '' }}"><a href="{{ route('roles.index') }}">Role</a></li>
                                <li class="{{ $linkpermission or '' }}"><a href="{{ route('permissions.index') }}">Permission</a></li>
                                <li class="{{ $linkuser or '' }}"><a href="{{ route('users.index') }}">User</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkdokter or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-user"></i> <span>Dokter</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkdokterindex or '' }}"><a href="{{ route('dokter.index') }}">Daftar Dokter</a></li>
                                <li class="{{ $linkdoktercreate or '' }}"><a href="{{ route('dokter.create') }}">Tambah Dokter</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkbidan or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-users"></i> <span>Bidan</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkbidanindex or '' }}"><a href="{{ route('bidan.index') }}">Daftar Bidan</a></li>
                                <li class="{{ $linkbidancreate or '' }}"><a href="{{ route('bidan.create') }}">Tambah Bidan</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkkamar or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fa fa-bed"></i> <span>Kamar</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkkamarindex or '' }}"><a href="{{ route('kamar.index') }}">Daftar Kamar</a></li>
                                <li class="{{ $linkkamarcreate or '' }}"><a href="{{ route('kamar.create') }}">Tambah Kamar</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkkamar or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fa fa-book"></i> <span>Laporan</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkkamarindex or '' }}"><a href="{{ route('laporanTransaksi') }}">Laporan Transaksi</a></li>
                                <li class="{{ $linkkamarcreate or '' }}"><a href="{{ route('laporanObat') }}">Laporan Obat</a></li>
                            </ul>
                        </li>
                        
                        @endrole


{{--                         <li class="{{ $linkalkes or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-briefcase"></i> <span>Inventory Alkes</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkalkesindex or '' }}"><a href="{{ route('alkes.index') }}">Daftar Alkes</a></li>
                                <li class="{{ $linkalkescreate or '' }}"><a href="{{ route('alkes.create') }}">Tambah Jenis Alkes</a></li>
                                <li class="{{ $linkaddstockalkes or '' }}"><a href="{{ route('addstockalkes') }}">Tambah Stock Alkes</a></li>
                            </ul>
                        </li> --}}
                        @role('dokter')
                        <li class="{{ $linkdiagnosa or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-heart-pulse"></i> <span>Diagnosis</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkdiagnosaindex or '' }}"><a href="{{ route('diagnosa.index') }}">Daftar Diagnosis</a></li>
                                <li class="{{ $linkdiagnosacreate or '' }}"><a href="{{ route('diagnosa.create') }}">Tambah Diagnosis</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linktindakan or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-heart"></i> <span>Tindakan</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linktindakanindex or '' }}"><a href="{{ route('tindakan.index') }}">Daftar Tindakan</a></li>
                                <li class="{{ $linktindakancreate or '' }}"><a href="{{ route('tindakan.create') }}">Tambah Tindakan</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkpasien or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-user"></i> <span>Pasien</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkpasienindex or '' }}"><a href="{{ route('pasien.index') }}">Daftar Pasien</a></li>
                                <li class="{{ $linkpasiencreate or '' }}"><a href="{{ route('pasien.create') }}">Tambah Pasien</a></li>
                            </ul>
                        </li>
                        @endrole
                        @role('pemilik')
                        <li class="{{ $linkkamar or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fa fa-book"></i> <span>Laporan</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkkamarindex or '' }}"><a href="{{ route('laporanTransaksi') }}">Laporan Transaksi</a></li>
                                <li class="{{ $linkkamarcreate or '' }}"><a href="{{ route('laporanObat') }}">Laporan Obat</a></li>
                            </ul>
                        </li>
                        @endrole
                        @role('bidan')
                        <li class="{{ $linkobat or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fa fa-flask"></i> <span>Inventory Obat</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkobatindex or '' }}"><a href="{{ route('obat.index') }}">Daftar Obat</a></li>
                                <li class="{{ $linkobatcreate or '' }}"><a href="{{ route('obat.create') }}">Tambah Jenis Obat</a></li>
                                <li class="{{ $linkaddstockobat or '' }}"><a href="{{ route('addstockobat') }}">Tambah Stock Obat</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkpasien or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-user"></i> <span>Pasien</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkpasienindex or '' }}"><a href="{{ route('pasien.index') }}">Daftar Pasien</a></li>
                                <li class="{{ $linkpasiencreate or '' }}"><a href="{{ route('pasien.create') }}">Tambah Pasien</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkrujukan or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-envelope"></i> <span>Rujukan</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkrujukancreate or '' }}"><a href="{{ route('rujukan.create') }}">Buat Rujukan</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linkpendaftaran or '' }}">
                            <a href="{{ route('pendaftaran.index') }}"><i class="lnr lnr-alarm"></i> <span>Pendaftaran Pasien</span> <span class="badge bg-danger">{{ \App\Pendaftaran::count()}}</span></a>
                        </li>
                        <li class="{{ $linkdiagnosa or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-heart-pulse"></i> <span>Diagnosis</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linkdiagnosaindex or '' }}"><a href="{{ route('diagnosa.index') }}">Daftar Diagnosis</a></li>
                                <li class="{{ $linkdiagnosacreate or '' }}"><a href="{{ route('diagnosa.create') }}">Tambah Diagnosis</a></li>
                            </ul>
                        </li>
                        <li class="{{ $linktindakan or '' }}">
                            <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-heart"></i> <span>Tindakan</span></a>
                            <ul aria-expanded="true">
                                <li class="{{ $linktindakanindex or '' }}"><a href="{{ route('tindakan.index') }}">Daftar Tindakan</a></li>
                                <li class="{{ $linktindakancreate or '' }}"><a href="{{ route('tindakan.create') }}">Tambah Tindakan</a></li>
                            </ul>
                        </li>
                        @endrole
                    </ul>
                </nav>
            </div>
        </div>