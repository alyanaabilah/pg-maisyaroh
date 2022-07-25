<section class="breadcrumb-section set-bg" data-setbg="{{ asset('front_assets/img/breadcrumbt.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Pangkalan Gas Maisyaroh</h2>
                    <div class="breadcrumb__option">
                        @if(Route::has('login'))
                        @auth
                        @if(Auth::user()->ceklevel === 'user')
                        <a href="/user/home">Beranda</a>
                        <span>{{ $judul }}</span>
                        @else
                        <a href="/admin/home">Beranda</a>
                        <span>{{ $judul }}</span>
                        @endif
                        @else
                        <a href="/">Beranda</a>
                        <span>{{ $judul }}</span>
                        @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>