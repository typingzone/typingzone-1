<!-- Header -->
<div class="header">
  <!-- Logo -->
  <div class="header-left active">
    <a href="{{ url('dashboard') }}" class="logo logo-normal">
      <img src="{{ $company && $company->company_logo ? asset($company->company_logo) : asset('/build/img/logo.png') }}" alt="Company Logo">
    </a>
    <a href="{{ url('dashboard') }}" class="logo logo-white">
      <img src="{{ $company && $company->company_logo ? asset($company->company_logo) : asset('/build/img/logo.png') }}" alt="Company Logo White">
    </a>
    <a href="{{ url('dashboard') }}" class="logo-small">
      <img src="{{ $company && $company->company_icon ? asset($company->company_icon) : asset('/build/img/logo-small.jpeg') }}" alt="Company Icon">
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
      <i data-feather="chevrons-left" class="feather-16"></i>
    </a>
  </div>
  <!-- /Logo -->
  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>
  <!-- Header Menu -->
  <ul class="nav user-menu">
    <!-- Search -->
    <li class="nav-item nav-searchinputs">
      <div class="top-nav-search">
        <a href="javascript:void(0);" class="responsive-search">
          <i class="fa fa-search"></i>
        </a>
        <form action="#" class="dropdown">
          <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown" data-bs-auto-close="false">
            <input type="text" placeholder="Search">
            <div class="search-addon">
              <span>
                <i data-feather="x-circle" class="feather-14"></i>
              </span>
            </div>
          </div>
          <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuClickable">
            <div class="search-info">
              <h6>
                <span>
                  <i data-feather="search" class="feather-16"></i>
                </span>Recent Searches
              </h6>
              <ul class="search-tags">
                <li>
                  <a href="{{ route('orders') }}">Orders</a>
                </li>
                <li>
                  <a href="{{ route('transactions') }}">Transactions</a>
                </li>
                <li>
                  <a href="{{ route('documents') }}">Documents</a>
                </li>
              </ul>
            </div>
           
            <div class="search-info">
              <h6>
                <span>
                  <i data-feather="user" class="feather-16"></i>
                </span>Customers
              </h6>
              <ul class="customers">

                <li>
                  <a href="javascript:void(0);">Aron Varu <img src="{{ URL::asset('/build/img/profiles/avator1.jpg') }}" alt="" class="img-fluid">
                  </a>
                </li>
               
              </ul>
            </div>
          </div>
        </form>
      </div>
    </li>
    <!-- /Search -->
    <!-- Select Store -->
    <li class="nav-item dropdown has-arrow main-drop select-store-dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle nav-link select-store" data-bs-toggle="dropdown">
        <span class="user-info">
          <span class="user-letter">
            <img src="{{ $company && $company->company_icon ? asset($company->company_icon) :asset('/build/img/store/store-01.png') }}" alt="Store Logo" class="img-fluid">
          </span>
          <span class="user-detail">
            <span class="user-name">{{ ($company && $company->company_name) ? $company->company_name : 'Company Name' }}</span>
          </span>
        </span>
      </a>
      <!-- <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{ URL::asset('/build/img/store/store-01.png') }}" alt="Store Logo" class="img-fluid"> Grocery Alpha </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{ URL::asset('/build/img/store/store-02.png') }}" alt="Store Logo" class="img-fluid"> Grocery Apex </a>
       
      </div> -->
    </li>
    <!-- /Select Store -->
    <!-- Flag -->
    <!-- <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
        <img src="{{ URL::asset('/build/img/flags/us.png') }}" alt="Language" class="img-fluid">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);" class="dropdown-item active">
          <img src="{{ URL::asset('/build/img/flags/us.png') }}" alt="" height="16"> English </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{ URL::asset('/build/img/flags/fr.png') }}" alt="" height="16"> Arabic </a>
      </div>
    </li> -->
    <!-- /Flag -->
    <li class="nav-item nav-item-box">
      <a href="javascript:void(0);" id="btnFullscreen">
        <i data-feather="maximize"></i>
      </a>
    </li>
    <li class="nav-item nav-item-box">
      <a href="{{ url('help') }}">
        <i data-feather="help-circle"></i>
      </a>
    </li>
    <!-- <li class="nav-item nav-item-box">
      <a href="{{ url('email') }}">
        <i data-feather="mail"></i>
        <span class="badge rounded-pill">1</span>
      </a>
    </li> -->
    <!-- Notifications -->
   
            
            @include('layout.partials.notifications')

   
    <!-- /Notifications -->
    <li class="nav-item nav-item-box">
      <a href="{{ url('general-settings') }}">
        <i data-feather="settings"></i>
      </a>
    </li>
    <li class="nav-item dropdown has-arrow main-drop">
      <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-info">
          <span class="user-letter">
            <img src="{{ asset(Auth::user()->profile_photo) ?? asset('/build/img/profiles/avator1.jpg') }}" alt="" class="img-fluid">
          </span>
          <span class="user-detail">
            <span class="user-name">{{ Auth::user()->name }}</span>
            <span class="user-role">{{ Auth::user()->getRoleNames()->first() }}</span>
            </span>
        </span>
      </a>
      <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
          <div class="profileset">
            <span class="user-img">
            <img src="{{ asset(Auth::user()->profile_photo) ?? asset('/build/img/profiles/avator1.jpg') }}" alt="">
              <span class="status online"></span>
            </span>
            <div class="profilesets">
                <h6>{{ Auth::user()->name }}</h6>
                <span class="user-role">{{ Auth::user()->getRoleNames()->first() }}</span>
              </div>
          </div>
          <hr class="m-0">
          <a class="dropdown-item" href="{{ url('general-settings') }}">
            <i class="me-2" data-feather="settings"></i>Settings </a>
          <hr class="m-0">
          <a class="dropdown-item logout pb-0" href="{{ url('logout') }}">
            <img src="{{ URL::asset('/build/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout </a>
        </div>
      </div>
    </li>
  </ul>
  <!-- /Header Menu -->
  <!-- Mobile Menu -->
  <div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="{{ url('general-settings') }}">Settings</a>
      <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
    </div>
  </div>
  <!-- /Mobile Menu -->
</div>
<!-- /Header -->