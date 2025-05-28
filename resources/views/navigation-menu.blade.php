<div> {{-- ROOT ELEMENT LIVEWIRE --}}

    <nav class="custom-navbar">
        <div class="container">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('/uploads/logo_sija.png') }}" alt="Logo SIJA" class="logo-img" />
                </a>
            </div>

            <ul class="nav-links">
                <li class="nav-item {{ request()->routeIs('input.index') ? 'active' : '' }}">
                    <a href="{{ route('input.index') }}">DATA SISWA PKL</a>
                </li>
                <li class="nav-item {{ request()->routeIs('industri.index') ? 'active' : '' }}">
                    <a href="{{ route('industri.index') }}">DAFTAR INDUSTRI</a>
                </li>
            </ul>

            <div class="user-menu">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="dropdown-toggle">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4 ml-1 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="login-link">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <style>
    [x-cloak] {
        display: none !important;
    }

    .custom-navbar {
        background-color: #1a1a1a;
        border-radius: 25px;
        max-width: 850px;
        margin: 20px auto;
        box-shadow: 0 0 15px rgba(255,255,255,0.08);
        padding: 0.6rem 1.5rem;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo-img {
        height: 40px;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 1.5rem;
        margin: 0;
        padding: 0;
    }

    .nav-item a {
        color: #bbb;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        padding: 0.5rem 0;
        display: block;
        transition: color 0.3s ease;
    }

    .nav-item.active a {
        color: white;
        border-bottom: 2px solid white;
        font-weight: 700;
    }

    .nav-item a:hover {
        color: white;
    }

    .user-menu {
        color: white;
        font-size: 0.9rem;
        position: relative;
    }

    .dropdown-toggle {
        background: none;
        border: none;
        color: white;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .dropdown-content {
        background: #222 !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        padding: 0.5rem 0;
        min-width: 140px;
    }

    .dropdown-content a {
        color: #eee !important;
        padding: 0.5rem 1rem;
        display: block;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .dropdown-content a:hover {
        background-color: #444;
    }

    .login-link {
        color: #bbb;
        text-decoration: none;
        font-weight: 500;
        padding: 0.3rem 0.6rem;
        border: 1px solid #bbb;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .login-link:hover {
        color: white;
        border-color: white;
    }
    </style>

</div>