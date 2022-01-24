@extends('layouts.landing-page')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Profil Desa</li>
                </ol>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Work Process Section ======= -->
        <section id="work-process" class="work-process">
            <div class="container">

                <!-- ======= Our Clients Section ======= -->
                <section id="clients" class="clients">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2>VISI</h2>
                            <strong>“{{ $company->visi }}”</strong>
                            {!! $company->visi_desc !!}
                        </div>
                    </div>
                </section>
                <!-- End Our Clients Section -->

                <!-- ======= Our Clients Section ======= -->
                <section id="clients" class="clients">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2>Misi</h2>
                            <div class="row content justify-content-center">
                                <div class="col-md-12 pt-4" data-aos="fade-left">
                                    {!! $company->misi !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Our Clients Section -->

                <div class="section-title" data-aos="fade-up">
                    <h2>GAMBARAN UMUM KONDISI DESA BUMIREJO</h2>
                    <p>Luas wilayah Desa Bumirejo adalah + 361,12 Ha. Luas lahan yang ada terbagi dalam beberapa peruntukan
                        seperti untuk fasilitas umum seluas + 182 Ha, pemukiman seluas + 65 Ha, dan kegiatan ekonomi lainnya
                        seluas + 112, 21 Ha.</p>
                </div>

                @foreach ($contents as $content)
                    <div class="row content">
                        <div class="col-md-5 {{ $content->id % 2 !== 0 ? 'order-1 order-md-2' : '' }}"
                            data-aos="fade-{{ $content->id % 2 !== 0 ? 'left' : 'right' }}" style="margin-top: 90px">
                            <img src="{{ Storage::url($content->image) }}" class="img-fluid"
                                alt="{{ $content->title }}">
                        </div>
                        <div class="col-md-7 pt-5" data-aos="fade-{{ $content->id % 2 !== 0 ? 'right' : 'left' }}">
                            <h3>{{ $content->title }}</h3>
                            {!! $content->content !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </section><!-- End Work Process Section -->

    </main><!-- End #main -->
@endsection
