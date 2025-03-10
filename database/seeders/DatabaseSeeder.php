<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kamar;
use App\Models\DetailKamar;
use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\DetailFasilitas;
use App\Models\Pelanggan;
use App\Models\Tamu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataUser = [
            [
                'username' => 'tgki',
                'nama' => 'M.Abdur Rouf',
                'email' => '_tgki.14@gmail.com',
                'no_hp' => '123456789012',
                'password' => bcrypt('admin132'),
                'level' => 'admin',
                'status' => 'aktif',
                'photo' => 'Tagaki.jpg'
            ],
            [
                'username' => 'resepsionis',
                'nama' => 'Syifa Kulstum Zahro',
                'email' => 'syifakulstumzahro@gmail.com',
                'no_hp' => '123456789013',
                'password' => bcrypt('cipaaaa14'),
                'level' => 'resepsionis',
                'status' => 'aktif',
                'photo' => 'cipaa.jpg'
            ],
        ];

        foreach ($dataUser as $user) {
            User::create($user);
        }

        $dataKamar = [
            [
                'tipe' => 'Superior',
                'harga' => 750000,
                'detail' => 'Kamar Superior adalah pilihan akomodasi yang menawarkan kenyamanan dan kemewahan. Didesain dengan gaya modern, kamar ini memberikan suasana yang hangat dan menyenangkan.',
                'photo' => 'Super.jpg',
                'jumlah' => 4,
            ],
            [
                'tipe' => 'Deluxe',
                'harga' => 850000,
                'detail' => ' Kamar Deluxe adalah pilihan akomodasi yang nyaman dan fungsional, ideal untuk pelancong yang mencari kenyamanan dengan harga yang terjangkau. Didesain dengan sentuhan modern, kamar ini menawarkan suasana yang menyenangkan untuk beristirahat.',
                'photo' => 'Delux.jpeg',
                'jumlah' => 4,
            ],
            [
                'tipe' => 'Family Room',
                'harga' => 1000000,
                'detail' => ' Kamar Family adalah pilihan akomodasi yang nyaman dan fungsional, ideal untuk pelancong yang mencari kenyamanan dengan harga yang terjangkau. Didesain dengan sentuhan modern, kamar ini menawarkan suasana yang menyenangkan untuk beristirahat.',
                'photo' => 'Family.jpeg',
                'jumlah' => 4,
            ],
            [
                'tipe' => 'Exclusive',
                'harga' => 1500000,
                'detail' => 'Kamar eksklusif adalah pilihan akomodasi premium yang menawarkan pengalaman menginap yang istimewa. Didesain dengan sentuhan mewah dan perhatian terhadap detail, kamar ini memberikan kenyamanan dan privasi yang maksimal.',
                'photo' => 'Exk.jpeg',
                'jumlah' => 4,
            ],
        ];

        foreach ($dataKamar as $kamar) {
            Kamar::create($kamar);
        }

        $dataDetail = [
            [
                'kamar_id' => 1,
                'nomor' => 'S001',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 1,
                'nomor' => 'S001',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 1,
                'nomor' => 'S003',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 1,
                'nomor' => 'S004',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 2,
                'nomor' => 'D001',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 2,
                'nomor' => 'D002',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 2,
                'nomor' => 'D003',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 2,
                'nomor' => 'D004',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 3,
                'nomor' => 'F001',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 3,
                'nomor' => 'F002',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 3,
                'nomor' => 'F003',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 3,
                'nomor' => 'F004',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 4,
                'nomor' => 'E001',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 4,
                'nomor' => 'E002',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 4,
                'nomor' => 'E003',
                'status' => 'nonaktif'
            ],
            [
                'kamar_id' => 4,
                'nomor' => 'E004',
                'status' => 'nonaktif'
            ],
        ];

        foreach ($dataDetail as $detail) {
            DetailKamar::create($detail);
        }

        $dataFasilitasKamar = [
            [
                'nama' => 'bath room',
                'keterangan' => 'Kamar mandi dengan Shower dan air panas',
                'photo' => 'tub.jpg',
            ],
            [
                'nama' => 'Bath Tub and Shower',
                'keterangan' => 'kamar mandi dengan Tub dan Shower',
                'photo' => 'shower.jpg',
            ],
            [
                'nama' => 'LED TV 32 Inch',
                'keterangan' => 'TV LED kapasitas besar dengan lebar 32 Inch',
                'photo' => '32.jpeg',
            ],
            [
                'nama' => 'LED TV 42 Inch',
                'keterangan' => 'TV LED kapasitas besar dengan lebar 42 Inch',
                'photo' => '42.jpeg',
            ],
            [
                'nama' => 'Coffee Maker',
                'keterangan' => 'Coffee maker untuk membuat coffee takaran selera sesuai keinginan',
                'photo' => 'coffee.jpg',
            ],
            [
                'nama' => 'Kursi Sofa',
                'keterangan' => 'Disediakan kursi sofa yang lembut dan nyaman',
                'photo' => 'sofa.jpg',
            ],
            [
                'nama' => 'Ac',
                'keterangan' => 'Disediakan Ac supaya ruangan lebih dingin dan nyaman',
                'photo' => 'ac.jpg',
            ],
            [
                'nama' => 'Alat Mandi',
                'keterangan' => 'Disediakan Alat mandi untuk mempermudah tamu',
                'photo' => 'alt.jpg',
            ],
            [
                'nama' => 'Bantal',
                'keterangan' => 'Disediakan bantal untuk biar bisa beriistirahat dengan tenang',
                'photo' => 'bantal.jpg',
            ],
            [
                'nama' => 'Ps 5',
                'keterangan' => 'Disediakan Ps 5 untuk main',
                'photo' => 'ps5.jpg',
            ],
            [
                'nama' => 'Lemari Pakaian',
                'keterangan' => 'Disediakan Lemari Pakaian untuk menaruh pakaian',
                'photo' => 'lmr.jpg',
            ],
            [
                'nama' => 'Sendal',
                'keterangan' => 'Disediakan sendal  untuk mempemudah tamu dan sebagai sovernir',
                'photo' => 'sandal.jpg',
            ],
        ];

        foreach ($dataFasilitasKamar as $fasilitas) {
            FasilitasKamar::create($fasilitas);
        }

        $dataDetailFasilitas = [
            [
                'kamar_id' => 1,
                'fasilitas_kamar_id' => 1,
            ],
            [
                'kamar_id' => 1,
                'fasilitas_kamar_id' => 3,
            ],
            [
                'kamar_id' => 1,
                'fasilitas_kamar_id' => 5,
            ],
            [
                'kamar_id' => 1,
                'fasilitas_kamar_id' => 6,
            ],
            [
                'kamar_id' => 2,
                'fasilitas_kamar_id' => 2,
            ],
            [
                'kamar_id' => 2,
                'fasilitas_kamar_id' => 4,
            ],
            [
                'kamar_id' => 2,
                'fasilitas_kamar_id' => 5,
            ],
            [
                'kamar_id' => 2,
                'fasilitas_kamar_id' => 6,
            ],
            [
                'kamar_id' => 3,
                'fasilitas_kamar_id' => 2,
            ],
            [
                'kamar_id' => 3,
                'fasilitas_kamar_id' => 4,
            ],
            [
                'kamar_id' => 3,
                'fasilitas_kamar_id' => 5,
            ],
            [
                'kamar_id' => 3,
                'fasilitas_kamar_id' => 6,
            ],
            [
                'kamar_id' => 4,
                'fasilitas_kamar_id' => 2,
            ],
            [
                'kamar_id' => 4,
                'fasilitas_kamar_id' => 4,
            ],
            [
                'kamar_id' => 4,
                'fasilitas_kamar_id' => 5,
            ],
            [
                'kamar_id' => 4,
                'fasilitas_kamar_id' => 6,
            ],
        ];

        foreach ($dataDetailFasilitas as $detail) {
            DetailFasilitas::create($detail);
        }

        $datafasilitashotel = [
            [
                'nama_fasilitas' => 'Fitness',
                'Keterangan' => 'Dapat di gunakan untuk berolahraga',
                'photo' => 'Fitness.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Jacuzzi',
                'Keterangan' => 'Dapat di gunakan untuk pemandian dan dapat pemandangan yang indah',
                'photo' => 'jacuzzi.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Parking',
                'Keterangan' => 'Dapat di gunakan untuk menaruh kendaran anda supaya lebih aman',
                'photo' => 'parking.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Receptionist',
                'Keterangan' => 'Tempat untuk melakukan Chek in dan Chek Out',
                'photo' => 'receptionist.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Restoran',
                'Keterangan' => 'Tempat untuk membeli makanan',
                'photo' => 'restoran.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Sauna',
                'Keterangan' => 'Tempat untuk terapi dengan suhu ruangan',
                'photo' => 'sauna.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Shuttlle',
                'Keterangan' => 'Kendaran untuk antar Jemput',
                'photo' => 'shuttlle.jpg',
                'status' => 'aktif'
            ],
            [
                'nama_fasilitas' => 'Swimming Pool',
                'Keterangan' => 'Tempat renang untuk bersenang senang',
                'photo' => 'swiming.jpg',
                'status' => 'aktif'
            ],
        ];

        foreach ($datafasilitashotel as $FasilitasHotel) {
            FasilitasHotel::create($FasilitasHotel);
        }

        $dataPelanggan = [
            [
                'nama' => 'Tagaki',
                'email' => 'tunner098@gmail.com',
                'no_hp' => '082117205811',
                'password' => bcrypt('tagaki14'),
            ],
            [
                'nama' => 'Cipaaa❤️',
                'email' => 'syifakulstumzahro@gmail.com',
                'no_hp' => '082117205811',
                'password' => bcrypt('12345678'),
            ],
            [
                'nama' => 'Chikaa',
                'email' => 'chikaflaraa@gmail.com',
                'no_hp' => '082117205811',
                'password' => bcrypt('0709'),
            ],
        ];

        foreach ($dataPelanggan as $pelanggan) {
            Pelanggan::create($pelanggan);
        }

        $dataTamu = [
            [
                'no_identitas' => '32140922112900001',
                'jenis_identitas' => 'Ktp',
                'nama_tamu' => 'Zidane Stya Remadhanni',
                'no_hp' => '0831213819',
                'jk' => 'l',
                'alamat' => 'Bandung',
            ],
            [
                'no_identitas' => '32140922112900002',
                'jenis_identitas' => 'Ktp',
                'nama_tamu' => 'Lily mariposes',
                'no_hp' => '0831213819',
                'jk' => 'p',
                'alamat' => 'Bandung',
            ],
        ];

        foreach ($dataTamu as $tamu) {
            Tamu::create($tamu);
        }
    }
}
