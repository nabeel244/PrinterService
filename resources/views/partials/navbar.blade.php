<style>
   .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      /* min-width: 100px; */
      color: #7c5cc4;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 1;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .hoverBlock:hover {
    }
    .badge {
        position: relative;
        top: -20px;
        left: -10px;
        border: 1px solid black;
        border-radius: 50%;
        color: black
    }

</style>
<nav class="navigation-bar d-flex justify-content-between">
    <div class="navigation-bar__left d-lg-flex align-items-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/navbar-logo.svg') }}" alt="logo">
        </a>
    </div>
    <div class="navigation-bar__right d-flex justify-content-center align-items-center">
        @if (auth()->user() &&
            auth()->user()->hasRole('admin'))
        @elseif(auth()->user() &&
            auth()->user()->hasRole('shopOwner'))
            <a href="{{ route('paid.money', $user->id) }}"><button class="btn navigation-bar__wallet-btn"><img
                        src="{{ asset('images/navwallet-button-icon.svg') }}" alt="">
                    <p>Wallet <span>{{ @$user->wallet->total }}</span></p>
                </button></a>
                <a href="{{ route('history') }}" class="navigation-bar__history-btn"><img
                    src="{{ asset('images/history-icon.svg') }}" alt=""></a>
        @else
            <a href="{{ route('wallet') }}"><button class="btn navigation-bar__wallet-btn"><img
                        src="{{ asset('images/navwallet-button-icon.svg') }}" alt="">
                    <p>Wallet <span>{{ @$user->wallet->total }}</span></p>
                </button></a>
                <a href="{{ route('history') }}" class="navigation-bar__history-btn"><img
                    src="{{ asset('images/history-icon.svg') }}" alt=""></a>
        @endif

        {{-- <a href="../user/receivedmoney_detail.html"><button class="btn navigation-bar__wallet-btn"><img src="{{ asset('images/navwallet-button-icon.svg') }}" alt=""><p>Wallet <span>-20</span></p></button></a> --}}

        <a href="{{ route('notification') }}" class="navigation-bar__bell-btn">
            <i class="fas fa-bell fa-2x " style="color: #7c5cc4 !important"></i><span class="badge counter counter-lg"
                style="color: #7c5cc4 !important"
                id="countNotification">{{ auth()->user()->unreadNotifications->count() }}</span>&nbsp;&nbsp;
            {{-- <img
                src="{{ asset('images/bell-icon.svg') }}" alt="">
              --}}
        </a>

        <div class="dropdown">
            <span style="color: #7c5cc4">{{ auth()->user()->name }}</span>
            <div class="dropdown-content">
                @if (auth()->user()->hasRole('user'))
                    <div class="mt-1"> <a href="{{ route('user.createAccount') }}">Account</a></div>

                    {{-- <a href="{{ route('user.createAccount') }}" class="navigation-bar__profile-btn"><img
                        class="rounded-circle" src="{{ asset('images/nav-profile-pic.svg') }}" alt=""></a> --}}
                @elseif(auth()->user()->hasRole('shopOwner'))
                    <a href="{{ route('shopowner.myAccount') }}">Account</a>
                @endif
                <a href="{{ route('logout') }}">Logout</a>

            </div>
        </div>

        {{-- <a href="{{ route('shopowner.myAccount') }}" class="navigation-bar__profile-btn"><img
                    class="rounded-circle" src="{{ asset('images/nav-profile-pic.svg') }}" alt=""></a> --}}


    </div>
</nav>
