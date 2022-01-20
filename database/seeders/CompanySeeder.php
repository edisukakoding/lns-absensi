<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyDetail;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company    = Company::create([
            'uid'       => 'BUMIREJO',
            'name'      => 'Kelurahan Bumirejo',
            'visi'      => 'KEBERSAMAAN DALAM MEMBANGUN DEMI DESA BUMIREJO YANG LEBIH MAJU DAN MAKMUR',
            'visi_desc' => '<p>Rumusan Visi tersebut merupakan suatu ungkapan dari suatu niat yang luhur untuk memperbaiki
                                        dalam Penyelenggaraan Pemerintahan dan Pelaksanaan Pembangunan di Desa BUMIREJO baik secara
                                        individu maupun kelembagaan sehingga 6 ( enam ) tahun ke depan Desa BUMIREJO mengalami suatu
                                        perubahan yang lebih baik dan peningkatan kesejahteraan masyarakat dilihat dari segi ekonomi
                                        dengan dilandasi semangat kebersamaan dalam Penyelenggaraan Pemerintahan dan Pelaksanaan
                                        Pembangunan.
                                    </p>',
            'misi'      => '<ul>
                                <li><i class="bi bi-asterisk"></i> Bersama masyarakat memperkuat kelembagaan desa
                                    yang ada sehingga dapat melayani masyarakat secara optimal <i class="bi bi-asterisk"></i>
                                </li>
                                <li><i class="bi bi-asterisk"></i> Bersama masyarakat dan kelembagaan desa
                                    menyelenggarakan pemerintahan dan melaksanakan pembangunan yang partisipatif <i class="bi bi-asterisk"></i>
                                </li>
                                <li><i class="bi bi-asterisk"></i> Bersama masyarakat dan kelembagaan desa dalam
                                    mewujudkan Desa BUMIREJO yang aman, tentram dan damai <i class="bi bi-asterisk"></i>
                                </li>
                                <li><i class="bi bi-asterisk"></i> Bersama masyarakat dan kelembagaan desa
                                    memberdayakan masyarakat untuk meningkatkan kesejahteraan masyarakat <i class="bi bi-asterisk"></i>
                                </li>
                            </ul>',
            'location'  => 'Bumirejo Kec. Karangawen Kabupaten Demak Jawa Tengah',
            'email'     => 'admin@gmail.com',
            'telephone' => '0822-4321-1234',
            'map'       => '<iframe style="width: 100%;height: 300px;border: 0;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31678.882241599742!2d110.55439086841751!3d-7.025704675207107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7093b48b461571%3A0xf726de5d46bcb901!2sBumirejo%2C%20Kec.%20Karangawen%2C%20Kabupaten%20Demak%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1641815080174!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>',
            'logo'      => 'public/images/company/logo.png',
            'background'=> 'public/images/company/bersama.jpg'
        ]);

        CompanyDetail::create([
            'company_id'=> $company->id,
            'title'     => 'Geografis',
            'content'   => '<p class="fst-italic">
                                Desa Bumirejo terletak pada ketinggian antara 0 sampai 500 dan sebelah selatan berbatasan dengan
                                Desa Karangawen sebelah timur berbatasan dengan Desa Brambang dan sebelah barat berbatasan
                                dengan Desa Candisari.
                            </p>
                            <p>Adapun batas-batas selengkapnya adalah :</p>
                            <ul>
                                <li><i class="bi bi-check"></i> Sebelah Utara berbatasan dengan Desa Wonorejo Kecamatan
                                    Guntur
                                </li>
                                <li><i class="bi bi-check"></i> Sebelah Selatan berbatasan dengan Desa Karangawen Kecamatan
                                    Karangawen
                                </li>
                                <li><i class="bi bi-check"></i> Sebelah Barat berbatasan dengan Desa Candisari Kecamatan
                                    Mranggen
                                </li>
                                <li><i class="bi bi-check"></i> Sebelah Timur berbatasan dengan Desa Brambang Kecamatan
                                    Karangawen
                                </li>
                            </ul>
                            <p>Kondisi iklim Desa Bumirejo menunjukan suhu udara rata-rata sebesar 24-28 oC dengan curah hujan
                                sebanyak 2,5 mm/tahun.</p>',
            'image'     => 'public/images/company/peta.jpg'
        ]);

        CompanyDetail::create([
            'company_id'=> $company->id,
            'title'     => 'Ekonomi',
            'content'   => '<p class="fst-italic">
                                Mata pencaharian penduduk Desa Bumirejo mayoritas adalah sebagai petani 1121 orang, buruh tani
                                1580 orang, PNS/POLRI/TNI 30 orang, karyawan swasta 767 orang, pedagang 20 rang, wirausaha 261
                                orang, buruh bangunan 150 orang, pensiunan 8 orang, tukang batu 38 orang, guru swasta 28 orang
                                dan lain-lain 20 orang.
                            </p>
                            <p>
                                Potensi pertanian Desa Bumirejo adalah sebagai berikut : Lahan Padi 112, 21 Ha, Lahan Sayuran
                                32, 01 Ha, Lahan Palawija & Perkebunan 51 Ha.
                            </p>
                            <p>Potensi peternakan Desa Bumirejo adalah sapi 30 ekor, kambing 75 Ekor, ayam 1500 ekor, bebek 15
                                ekor.</p>
                            <p>Perekonomian Desa Bumirejo ditunjang dengan 3 buah penggilingan padi, 115 buah warung / kios dan
                                15 buah fasilitas lainnya.</p>
                            <p>Adapun komoditas unggulan Desa Bumirejo Adalah Padi & Tanaman Tembakau.</p>',
            'image'     => 'public/images/company/ekonomi.jpg'
        ]);

        CompanyDetail::create([
            'company_id'=> $company->id,
            'title'     => 'Sosial Budaya',
            'content'   => '<p>Berdasarkan pada data administrasi pemerintah Desa Bumirejo jumlah penduduk yang tercatat secara
                                administrasi sebanyak 4.962 jiwa, dengan rincian penduduk laki-laki sebanyak 2.338 jiwa dan
                                perempuan sebanyak 2.544 jiwa dengan total jumlah kepala keluarga sebanyak 2.081 KK.</p>
                            <p>
                                Penduduk Desa Bumirejo dilihat dari kelompok usia adalah sebagai berikut terbesar berusia antara
                                20 sampai 40 yaitu sebanyak 2.986 orang sedangkan terkecil adalah usia antara 04 sampai 15 yaitu
                                sebanyak 757 orang.
                            </p>
                            <p>Kondisi tingkat pendidikan formal penduduk desa Bumirejo adalah sebagai berikut : belum sekolah
                                sebanyak 321 orang, yang tidak pernah bersekolah sebanyak 321 orang, pernah sekolah SD tapi
                                tidak tamat sebanyak 1916 orang, tamat SD/sederajat sebanyak 1916 orang, Tamat SLTP / sederajat
                                sebanyak 125 orang, tamat SLTA/sederajat sebanyak 226 orang, tamat Diploma/sederajat sebanyak 15
                                orang,tamat sarjana/sederajat sebanyak 13 orang</p>
                            <p>Prasarana pendidikan yang terdapat di Desa Bumirejo antara lain pra sekolah/PAUD 3 (tiga) buah,
                                TK/sederajat 2 (dua) buah serta 2 (dua) buah SD Inpres..</p>
                            <p>Untuk kondisi kesehatan masyarakat Desa Bumirejo didukung dengan beberapa fasilitas kesehatan
                                sebagai berikut : Puskesmas 0 (tidak ada) buah, Pustu 0 (tidak ada) buah, Poliklinik 0 (tidak
                                ada) buah, Polindes 2 (dua) buah, jumlah tenaga medis yang ada di desa adalah dokter 1 (satu)
                                orang, bidan 2 orang, dan mantra / pengobatan alternatif 2 orang.</p>
                            <p>Kondisi umat beragama di Desa Bumirejo sudah berjalan dengan baik dimana mayoritas penduduk
                                beragama Islam yaitu sebanyak 4.767 orang, beragama Kristen 193 orang, dan beragama Budha 2
                                orang.</p>
                            <p>
                                Data lain yang cukup penting adalah tentang kesejahteraan penduduk yang dilihat dari jumlah atau
                                banyaknya angka kemiskinan sebanyak 1.254 jiwa dengan jumlah rumah tangga miskin (RTM) sebanyak
                                767 KK.
                            </p>',
            'image'     => 'public/images/company/sosial.jpg'
        ]);

        CompanyDetail::create([
            'company_id'=> $company->id,
            'title'     => 'Pemerintahan',
            'content'   => '<p class="fst-italic">
                                Secara historis Desa Bumirejo merupakan wilayah yang terdiri dari 5 Dusun yaitu Dusun Turus,
                                Dusun Titang, Dusun Bodi, Dusun Karanganyar dan Dusun Lerep, serta dibagi menjadi 63 RT dan 10
                                RW, yang letaknya tidak begitu berjauhan hanya berkisar 1 s/d 2 km.
                            </p>
                            <p>
                                Struktur kepemimpinan Desa Bumirejo untuk periode saat ini (th 2016 s/d 2022) dipimpin oleh
                                seorang Kepala Desa dan dibantu 5 orang kadus dan 4 orang Kaur & 4 Pelaksana Teknis.
                            </p>
                            <p>Untuk melaksanakan Undang-undang dan Peraturan yang berlaku, pada tahun 2021 Desa Bumirejo telah
                                melaksanakan Pemberhentian (Perangkat Desa ) dari Jabatan yang Lama dan Pengangkatan Kembali
                                pada Jabatan Baru sesuai dengan SOTK yang baru, pada Hari Sabtu, 13 Februari 2021, di Balai Desa
                                Bumirejo oleh Kepala Desa.</p>',
            'image'     => 'public/images/company/bersama.jpg'
        ]);

        CompanyDetail::create([
            'company_id'=> $company->id,
            'type'      => 'HEADLINE',
            'title'     => 'Misi Kelurahan Bumirejo',
            'content'   => '<ul>
                                <li><i class="bx bx-check-double"></i> Bersama masyarakat memperkuat kelembagaan desa yang ada
                                    sehingga dapat melayani masyarakat secara optimal.</li>
                                <li><i class="bx bx-check-double"></i> Bersama masyarakat dan kelembagaan desa menyelenggarakan
                                    pemerintahan dan melaksanakan pembangunan yang partisipatif.</li>
                                <li><i class="bx bx-check-double"></i> Bersama masyarakat dan kelembagaan desa dalam mewujudkan
                                    Desa BUMIREJO yang aman, tentram dan damai.</li>
                                <li><i class="bx bx-check-double"></i> Bersama masyarakat dan kelembagaan desa memberdayakan
                                    masyarakat untuk meningkatkan kesejahteraan masyarakat.</li>
                            </ul>',
            'image'     => 'public/images/company/lurah.jpg'
        ]);
    }
}
