@if (auth()->check() && auth()->user()->role == 'user')
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="../../../../index.html"
                    class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('user.home') }}" class="nav-link px-2 text-white">@lang('navbar.home')</a></li>
                    <li><a href="{{ route('user.profile') }}" class="nav-link px-2 text-white">@lang('navbar.profile')</a>
                    </li>
                    <li><a href="{{ route('user.article') }}" class="nav-link px-2 text-white">@lang('navbar.article')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="languageDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('navbar.language.title')
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ route('set_locale', ['locale' => 'en']) }}">@lang('navbar.language.en')</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('set_locale', ['locale' => 'id']) }}">@lang('navbar.language.id')</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="text-end">
                    <a href="" type="button" class="btn btn-warning">{{ auth()->user()->name }}</a>
                    <a href="{{ route('auth.logout') }}" type="button" class="btn btn-outline-light me-2">Logout</a>
                </div>
            </div>
        </div>
    </header>
@endif

@if (auth()->check() && auth()->user()->role == 'admin')
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="../../../../index.html"
                    class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('admin.home') }}" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="{{ route('admin.admin.index') }}" class="nav-link px-2 text-white">Admin</a></li>
                    <li><a href="{{ route('admin.user.index') }}" class="nav-link px-2 text-white">User</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="languageDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ route('set_locale', ['locale' => 'en']) }}">English</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('set_locale', ['locale' => 'id']) }}">Indonesian</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="text-end">
                    <a href="" type="button" class="btn btn-warning">{{ auth()->user()->name }}</a>
                    <a href="{{ route('auth.logout') }}" type="button" class="btn btn-outline-light me-2">Logout</a>
                </div>
            </div>
        </div>
    </header>
@endif

@if (!auth()->check())
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="../../../../index.html"
                    class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('guest.article') }}" class="nav-link px-2 text-white">@lang('navbar.home')</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('navbar.category')
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @php
                                $categories = App\Models\Category::all();
                            @endphp
                            @foreach ($categories as $item)
                                <li><a class="dropdown-item"
                                        href="{{ route('guest.article', ['name' => $item->name]) }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#" class="nav-link px-2 text-white">@lang('navbar.about_us')</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="languageDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('navbar.language.title')
                        </a>
                         <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ route('set_locale', ['locale' => 'en']) }}">@lang('navbar.language.en')</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('set_locale', ['locale' => 'id']) }}">@lang('navbar.language.id')</a></li>
                        </ul>
                    </li>

                </ul>

                <div class="text-end">
                    <a href="{{ route('auth.register') }}" type="button" class="btn btn-warning">Sign-up</a>
                    <a href="{{ route('auth.login') }}" type="button" class="btn btn-outline-light me-2">Login</a>
                </div>
            </div>
        </div>
    </header>

@endif
