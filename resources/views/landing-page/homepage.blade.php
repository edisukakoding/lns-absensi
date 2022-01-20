@extends('layouts.landing-page')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" style="background-image: url('{{ Storage::url('public/images/company/bersama.jpg') }}')">
        <div class="hero-container" data-aos="fade-up">
            <h1>Desa Bumirejo</h1>
            <h2>KEBERSAMAAN DALAM MEMBANGUN DEMI DESA BUMIREJO YANG LEBIH MAJU DAN MAKMUR</h2>
            <a href="{{ url('/profile', []) }}" class="btn-get-started scrollto">PROFIL</a>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row justify-content-end">
                    <div class="col-lg-11">
                        <div class="row justify-content-end">
                            @php
                                $population = \App\Models\Population::orderBy('year', 'DESC')->first();
                            @endphp
                            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                                <div class="count-box py-5">
                                    <i class="bi bi-people"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $population->total }}"
                                        class="purecounter">0</span>
                                    <p>Jiwa</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                                <div class="count-box py-5">
                                    <i class="bi bi-person"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $population->man }}"
                                        class="purecounter">0</span>
                                    <p>Laki Laki</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                                <div class="count-box pb-5 pt-0 pt-lg-5">
                                    <i class="bi bi-person-fill"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $population->woman }}"
                                        class="purecounter">0</span>
                                    <p>Perempuan</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                                <div class="count-box pb-5 pt-0 pt-lg-5">
                                    <i class="bi bi-people-fill"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="{{ $population->child + $population->baby }}"
                                        class="purecounter">0</span>
                                    <p>Anak anak & Bayi</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6 video-box align-self-baseline position-relative">
                        <img src="{{ Storage::url('public/images/company/lurah.jpg') }}" class="img-fluid" alt=""
                            style="width: 100%">
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a> --}}
                    </div>

                    <div class="col-lg-6 pt-3 pt-lg-0 content">
                        <h3>Misi Keluarahan Bumirejo</h3>
                        {{-- <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p> --}}
                        <ul>
                            <li><i class="bx bx-check-double"></i> Bersama masyarakat memperkuat kelembagaan desa yang ada
                                sehingga dapat melayani masyarakat secara optimal.</li>
                            <li><i class="bx bx-check-double"></i> Bersama masyarakat dan kelembagaan desa menyelenggarakan
                                pemerintahan dan melaksanakan pembangunan yang partisipatif.</li>
                            <li><i class="bx bx-check-double"></i> Bersama masyarakat dan kelembagaan desa dalam mewujudkan
                                Desa BUMIREJO yang aman, tentram dan damai.</li>
                            <li><i class="bx bx-check-double"></i> Bersama masyarakat dan kelembagaan desa memberdayakan
                                masyarakat untuk meningkatkan kesejahteraan masyarakat.</li>
                        </ul>
                        {{-- <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p> --}}
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        @if ($structure->count() > 0)
        <!-- ======= Services Section ======= -->
        <section id="services" class="services ">
            <div class="container">

                <div class="section-title pt-5" data-aos="fade-up">
                    <h2>Aparat Desa</h2>
                </div>

                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate non provident</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
                            <h4 class="title"><a href="">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat tarad limino ata</p>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i>
                            </div>
                            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur</p>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum</p>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
                            <h4 class="title"><a href="">Nemo Enim</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque</p>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
                            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam
                                libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div id="struktur-aparat-desa"></div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->
        @endif

    </main>
    <!-- End #main -->
@endsection

@if ($structure->count() > 0)
    @push('styles')
        <style>
            .boc-search {
                width: 100%;
                right: 0 !important;
            }

            #struktur-aparat-desa {
                width: 100%;
                height: 100%;
                position: relative;
            }

        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('js/orgchart.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', async () => {
                OrgChart.templates.isla = Object.assign({}, OrgChart.templates.ana);
                OrgChart.templates.isla.defs =
                    '<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="isla-shadow">' +
                    '<feOffset dx="0" dy="4" in="SourceAlpha" result="shadowOffsetOuter1" />' +
                    '<feGaussianBlur stdDeviation="10" in="shadowOffsetOuter1" result="shadowBlurOuter1" />' +
                    '<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.2 0" in="shadowBlurOuter1" type="matrix" result="shadowMatrixOuter1" />' +
                    '<feMerge><feMergeNode in="shadowMatrixOuter1" /><feMergeNode in="SourceGraphic" /></feMerge>' +
                    '</filter>';
                OrgChart.templates.isla.size = [180, 120];
                OrgChart.templates.isla.node =
                    '<rect filter="url(#isla-shadow)" x="0" y="20" rx="7" ry="7" height="100" width="180" fill="#FFF" stroke-width="1" stroke="#94c045"></rect>' +
                    '<rect x="25" y="75" rx="10" ry="10" height="20" width="130" fill="#94c045" stroke-width="3" stroke="#94c045"></rect>' +
                    '<rect fill="#ffffff" stroke="#94c045" stroke-width="1" x="70" y="0" rx="13" ry="13" width="40" height="40"></rect>' +
                    '<circle stroke="#FFCA28" stroke-width="3" fill="none" cx="90" cy="12" r="8"></circle>' +
                    '<path d="M75,34 C75,17 105,17 105,34" stroke="#FFCA28" stroke-width="3" fill="none"></path>';
                OrgChart.templates.isla.field_0 =
                    '<text data-width="120" style="font-size: 12px;" fill="#fff" x="90" y="90" text-anchor="middle">{val}</text>';
                OrgChart.templates.isla.field_1 =
                    '<text data-width="160" style="font-size: 13px;" fill="#94c045" x="90" y="64" text-anchor="middle">{val}</text>';
                OrgChart.templates.isla.img_0 =
                    '<clipPath id="{randId}">' +
                    '<rect filter="url(#isla-shadow)" fill="#ffffff" stroke="#94c045" stroke-width="1" x="70" y="0" rx="13" ry="13" width="40" height="40"></rect>' +
                    '</clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="70" y="0" width="40" height="40"></image>';
                OrgChart.templates.isla.minus =
                    '<circle cx="15" cy="15" r="15" fill="#F57C00" stroke="#F57C00" stroke-width="1"></circle>' +
                    '<line x1="8" y1="15" x2="22" y2="15" stroke-width="1" stroke="#ffffff"></line>';
                OrgChart.templates.isla.plus =
                    '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#94c045" stroke-width="1"></circle>' +
                    '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#94c045"></line>' +
                    '<line x1="15" y1="4" x2="15" y2="26" stroke-width="1" stroke="#94c045"></line>';
                OrgChart.templates.isla.nodeMenuButton =
                    '<g style="cursor:pointer;" transform="matrix(1,0,0,1,83,45)" data-ctrl-n-menu-id="{id}">' +
                    '<rect x="-4" y="-10" fill="#000000" fill-opacity="0" width="22" height="22"></rect>' +
                    '<circle cx="0" cy="0" r="2" fill="#F57C00"></circle>' +
                    '<circle cx="7" cy="0" r="2" fill="#F57C00"></circle>' +
                    '<circle cx="14" cy="0" r="2" fill="#F57C00"></circle>' +
                    '</g>';

                OrgChart.templates.isla.ripple = {
                    radius: 0,
                    color: "#F57C00",
                    rect: {
                        x: 0,
                        y: 20,
                        width: 180,
                        height: 100
                    }
                };
                OrgChart.templates.isla.editFormHeaderColor = '#94c045';
                OrgChart.SEARCH_PLACEHOLDER = "Cari Aparat Desa";
                var chart = new OrgChart(document.getElementById("struktur-aparat-desa"), {
                    template: "isla",
                    scaleInitial: 1,
                    mouseScrool: OrgChart.action.none,
                    nodeBinding: {
                        field_0: "name",
                        field_1: 'position'
                    },
                    nodes: await fetch(`{{ url('/organizationalstructure') }}`).then(res => res.json())
                        .then(data => data.map((row => {
                            console.log(row);
                            let result = {};
                            result = {
                                ...result,
                                id: row.employee.id,
                                name: row.employee.name,
                                position: row.employee.position.name,
                                image: row.employee.image.replace('public', 'storage')
                            }
                            result = row.boss ? {
                                ...result,
                                pid: row.boss.id
                            } : result;
                            return result;
                        }))),
                    editForm: {
                        titleBinding: "name",
                        photoBinding: "image",
                        buttons: {
                            edit: null,
                            share: {
                                icon: OrgChart.icon.share(24, 24, '#fff'),
                                text: 'Share'
                            },
                            pdf: null,
                            remove: null
                        },
                    }
                });
            })
        </script>
    @endpush
@endif
