{{-- @if (Auth()->User()->level == "admin") --}}
    
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('logo/versibiru1.png')}}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{asset('logo/versibiru2.png')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    {{-- <span class="font-weight-medium mb-2">{{Auth()->User()->name}}</span>
                    <span class="font-weight-normal">{{Auth()->User()->level}}</span> --}}
                </div>
                <span class="badge badge-danger text-white ml-3 rounded">3</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Menu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/user">Kelola Data user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/suplier">Kelola Data suplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sepatu">Kelola Data sepatu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/member">Kelola Data member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/transaksi">Kelola Data transaksi</a>
                    </li>
                    
                    </ul>
            </div>
        </li>
       
    
        <li class="nav-item">
            <span class="nav-link" href="#">
                <span class="menu-title">Docs</span>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <div class="mt-4">
                    <div class="border-none">
                        <p class="text-black">Notification</p>
                    </div>
                    <ul class="mt-4 pl-0">
                        <li>Sign Out</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>
    
{{-- @else --}}

{{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('logo/versibiru1.png')}}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{asset('logo/versibiru1.png')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    <span class="font-weight-medium mb-2">{{Auth()->User()->name}}</span>
                    <span class="font-weight-normal">{{Auth()->User()->level}}</span>
                </div>
                <span class="badge badge-danger text-white ml-3 rounded">3</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Menu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/transaksi">Kelola Data transaksi</a>
                    </li>
                    
                    </ul>
            </div>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Forms</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-bar menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-table-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <span class="nav-link" href="#">
                <span class="menu-title">Docs</span>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <div class="mt-4">
                    <div class="border-none">
                        <p class="text-black">Notification</p>
                    </div>
                    <ul class="mt-4 pl-0">
                        <li>Sign Out</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>
@endif --}}