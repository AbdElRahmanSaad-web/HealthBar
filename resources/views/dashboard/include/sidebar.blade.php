<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/LogoHealthBar.png') }}" class="logo-icon fs-22" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">
                Health Bar
            </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/') }}">
                <div class="parent-icon"><i class='bx bxs-home-circle'></i>
                </div>
                <div class="menu-title">{{ __('words.dashboard') }}</div>
            </a>
        </li>
        <li>
            <a href="javascript:" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-list"></i>
                </div>
                <div class="menu-title">{{ __('words.categories') }}</div>
            </a>
            <ul>
                <li><a href="{{route('categories.index')}}"><i
                            class="bx bx-right-arrow-alt"></i>{{ __('words.categories') }}</a>
                </li>
                <li><a href="{{route('sub_categories.index')}}"><i
                            class="bx bx-right-arrow-alt"></i>{{ __('words.sub_categories') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-list"></i>
                </div>
                <div class="menu-title">{{ __('words.items') }}</div>
            </a>
            <ul>
                <li><a href="{{route('items.index')}}"><i
                            class="bx bx-right-arrow-alt"></i>{{ __('words.items') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-list"></i>
                </div>
                <div class="menu-title">{{ __('words.meals') }}</div>
            </a>
            <ul>
                <li><a href="{{route('meals.index')}}"><i
                            class="bx bx-right-arrow-alt"></i>{{ __('words.meals') }}</a>
                </li>
            </ul>
        </li>

    </ul>
</div>
