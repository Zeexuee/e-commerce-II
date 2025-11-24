<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefreshProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate products table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Tambah produk dummy dengan gambar sementara
        $imagePath = 'products/gambar-sementara.jpg';

        $products = [
            [
                'name' => 'Beras Putih Premium',
                'description' => 'Beras putih berkualitas premium dengan butiran yang panjang dan putih mengkilap. Cocok untuk nasi putih yang lezat dan nasi goreng.',
                'price' => 75000,
                'stock' => 100,
                'sku' => 'BR-001',
                'category' => 'Beras Putih',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Merah Organik',
                'description' => 'Beras merah organik tanpa pestisida. Kaya akan serat dan nutrisi, sempurna untuk diet sehat. Rasa sedikit manis dan tekstur yang kenyal.',
                'price' => 95000,
                'stock' => 50,
                'sku' => 'BR-002',
                'category' => 'Beras Merah',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Basmati Import',
                'description' => 'Beras basmati premium import dari India. Butiran panjang dan aroma harum yang khas. Cocok untuk nasi kuning dan hidangan spesial.',
                'price' => 120000,
                'stock' => 30,
                'sku' => 'BR-003',
                'category' => 'Premium',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Jasmine Thailand',
                'description' => 'Beras jasmine pilihan dari Thailand. Aroma wangi yang alami dan rasa lezat. Cocok untuk hidangan Asia Tenggara.',
                'price' => 85000,
                'stock' => 40,
                'sku' => 'BR-004',
                'category' => 'Premium',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Putih Biasa',
                'description' => 'Beras putih standar untuk kebutuhan sehari-hari. Harga terjangkau dengan kualitas yang baik. Cocok untuk semua jenis masakan.',
                'price' => 55000,
                'stock' => 200,
                'sku' => 'BR-005',
                'category' => 'Regular',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Hitam Manfaat',
                'description' => 'Beras hitam dengan kandungan antioksidan tinggi. Bermanfaat untuk kesehatan dan stamina. Rasa sedikit gurih dan tekstur yang padat.',
                'price' => 110000,
                'stock' => 25,
                'sku' => 'BR-006',
                'category' => 'Beras Merah',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Putih Pecah Kulit',
                'description' => 'Beras pecah kulit dengan nutrisi lengkap dari sekam luar. Cocok untuk diet dan gaya hidup sehat. Tidak kehilangan nutrisi penting.',
                'price' => 70000,
                'stock' => 60,
                'sku' => 'BR-007',
                'category' => 'Regular',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
            [
                'name' => 'Beras Merah Super',
                'description' => 'Beras merah super dengan kualitas terbaik. Warna merah yang konsisten dan butiran yang utuh. Kaya akan mineral dan vitamin.',
                'price' => 100000,
                'stock' => 45,
                'sku' => 'BR-008',
                'category' => 'Beras Merah',
                'is_active' => 1,
                'image1' => $imagePath,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('Semua produk berhasil di-refresh dengan gambar sementara!');
    }
}
