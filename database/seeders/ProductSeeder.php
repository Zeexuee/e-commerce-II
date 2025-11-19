<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Beras Putih Premium 10kg',
                'description' => 'Beras putih premium pilihan, berkualitas tinggi, cocok untuk sehari-hari dengan butir yang panjang dan putih bersih.',
                'price' => 150000,
                'stock' => 50,
                'sku' => 'BR-WHT-10KG-001',
                'category' => 'Premium',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Putih Regular 5kg',
                'description' => 'Beras putih reguler berkualitas standar, harga terjangkau, cocok untuk keluarga Indonesia.',
                'price' => 75000,
                'stock' => 100,
                'sku' => 'BR-WHT-5KG-002',
                'category' => 'Beras Putih',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Merah Organik 5kg',
                'description' => 'Beras merah organik tanpa pestisida, kaya serat dan nutrisi, baik untuk kesehatan.',
                'price' => 120000,
                'stock' => 30,
                'sku' => 'BR-RED-5KG-003',
                'category' => 'Beras Merah',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Putih Super 10kg',
                'description' => 'Beras putih super dengan kualitas tertinggi, butir panjang, tidak pecah, cocok untuk acara spesial.',
                'price' => 180000,
                'stock' => 25,
                'sku' => 'BR-WHT-10KG-SUPER',
                'category' => 'Premium',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Merah Regular 5kg',
                'description' => 'Beras merah berkualitas standar, kaya akan serat dan nutrisi, harga terjangkau.',
                'price' => 95000,
                'stock' => 40,
                'sku' => 'BR-RED-5KG-REG',
                'category' => 'Beras Merah',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Putih Jasmine 10kg',
                'description' => 'Beras jasmine putih dengan aroma harum alami, tekstur lembut, cocok untuk masakan istimewa.',
                'price' => 200000,
                'stock' => 15,
                'sku' => 'BR-JAS-10KG-001',
                'category' => 'Premium',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Hitam 5kg',
                'description' => 'Beras hitam atau beras ketan hitam yang langka, kaya antioksidan dan nutrisi lengkap.',
                'price' => 250000,
                'stock' => 10,
                'sku' => 'BR-BLK-5KG-001',
                'category' => 'Premium',
                'is_active' => true,
            ],
            [
                'name' => 'Beras Putih Serbaguna 25kg',
                'description' => 'Kemasan besar untuk kebutuhan restoran atau usaha katering, harga grosir.',
                'price' => 350000,
                'stock' => 20,
                'sku' => 'BR-WHT-25KG-BULK',
                'category' => 'Regular',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
