<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'hoten' => 'Hỗ trợ',
            'username' => 'hotro',
            'password' => bcrypt('hotro'),
            'quyen' => 1
        ]);
        DB::table('chi_nhanh')->insert(
                [
                    'chi_nhanh_ma' => 'CN01',
                    'chi_nhanh_ten' => 'Chi nhánh 1',
                ],
                [
                    'chi_nhanh_ma' => 'CN02',
                    'chi_nhanh_ten' => 'Chi nhánh 2',
                ]
        );
    }

}
