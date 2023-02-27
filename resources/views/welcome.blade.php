<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('assets/img/logog.png')}}">
  <title>
    Citizen Complaints Web
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{url('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{url('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
  @include('sweetalert::alert')
</head>

<body class="g-sidenav-show   bg-gray-100">

  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="{{url('assets/img/logog.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/complaint">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-satisfied text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Complaint Data</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/categories">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tag text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Categories Data</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/logs">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">History</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="route('profile.edit')">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1"> {{ __('Profile') }}</span>
          </a>
        </li> -->
        <li class="nav-item">
          <x-dropdown-link class="nav-link" :href="route('profile.edit')">

            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span>
              {{ __('Profile') }}
            </span>
          </x-dropdown-link>
        </li>
        @if (Auth::user())
        <li class="btn d-flex align-items-center">
          <form method="POST" class="nav-link text-white font-weight-bold px-0" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link class="d-sm-inline d-none" :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>
        </li>
        @endif
        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link " href="/login">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>

            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        @endif
        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link " href="/register">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
        @endif
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ request()->path(); }}</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">{{ request()->path(); }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>

          @if (Auth::guest())


          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/login" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            @endif

            @if (Auth::user())


            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="/profile" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Hello {{ Auth::user()->name }} !</span>
                </a>
              </li>

              @endif


              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="/profile" class="nav-link text-white p-0">
                  <i class="fa fa-single fixed-plugin-button-nav cursor-pointer"></i>
                </a>
              </li>
              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-bell cursor-pointer"></i>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New message</span> from Laur
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/small-logos/logo-spotify.svg"
                            class="avatar avatar-sm bg-gradient-dark  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New album</span> by Travis Scott
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background"
                                      d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                      opacity="0.593633743"></path>
                                    <path class="color-background"
                                      d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                    </path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Payment successfully completed
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    @if (Auth::guest())
    <div class="container-fluid py-4">
      <div class="card" style="width: 28rem">
        <img src="{{url('assets/img/landing.jpg')}}" class="card-img"
          style="width: 100%; height: 100%; object-fit: cover;" alt="...">
      </div>
    </div>
    @endif

    @if (Auth::user())
    <div class="d-flex container-fluid py-4 justify-content-around">
      <div class="card" style="width: 18rem;">
        <img src="{{url('assets/img/curved-images/curved6-small.jpg')}}" class="card-img" alt="...">
      </div>
      <div class="card bg-gradient-info shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-white text-muted mb-2">In Progress Complaints</h6>
              <span class="h2 font-weight-bold mb-0">{{ App\Models\Complaint::where('status', 'in progress')->count()
                }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-white text-info rounded-circle shadow">
                <img src="{{url('assets/img/logog.jpg')}}" class=" rounded-circle"
                  style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-nowrap text-light">Let's hope it get resolved quickly</span>
          </p>
        </div>
      </div>
      <div class="card bg-gradient-warning shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted mb-2">Pending Complaints</h6>
              <span class="h2 font-weight-bold mb-0">{{ App\Models\Complaint::where('status', 'pending')->count()
                }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-white text-info rounded-circle shadow">
                <img src="{{url('assets/img/logog.jpg')}}" class=" rounded-circle"
                  style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">

            <span class="text-nowrap text-light">We will deal with it as soon as posible</span>
          </p>
        </div>
      </div>

    </div>
    @endif

    @if (Auth::user())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @yield('content')
      </div>
    </div>
    @endif

    @if (Auth::guest())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="card text-center shadow-lg m-4">
        <div class="card-body">
          <h1 class="card-title mb-4">Welcome to Citizen Complaints</h1>
          <p class="card-text mb-4">This website provides a platform for citizens to voice their concerns and complaints
            about
            issues in their community. Whether it's a pothole, noisy neighbor, or safety hazard, we want to hear from
            you!
          </p>
          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">Sign Up</a>
            <a class="btn btn-lg btn-outline-primary" href="{{ route('login') }}" role="button">Log In</a>
          </div>
        </div>
      </div>
    </div>
    @endif

  </main>

  <!--   Core JS Files   -->
  <script src="{{url('assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{url('assets/js/plugins/chartjs.min.js')}}"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

</body>

</html>