<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BagianUserSeeder extends Seeder
{
    /**
     * Seed akun untuk setiap Bagian.
     */
    public function run(): void
    {
        $bagians = [
            [
                'name'     => 'Staf Umum',
                'email'    => 'umum@sukabumi.go.id',
                'password' => 'umumsetdasmi',
                'bagian'   => 'Bagian Umum',
            ],
            [
                'name'     => 'Staf Organisasi',
                'email'    => 'organisasi@sukabumi.go.id',
                'password' => 'organisasisetdasmi',
                'bagian'   => 'Bagian Organisasi',
            ],
            [
                'name'     => 'Staf Perekonomian',
                'email'    => 'ekonomi@sukabumi.go.id',
                'password' => 'perekonomiansetdasmi',
                'bagian'   => 'Bagian Perekonomian',
            ],
            [
                'name'     => 'Staf Tapem',
                'email'    => 'tapem@sukabumi.go.id',
                'password' => 'tapemsetdasmi',
                'bagian'   => 'Bagian Tata Pemerintahan',
            ],
            [
                'name'     => 'Staf Kerjasama',
                'email'    => 'kerjasama@sukabumi.go.id',
                'password' => 'kerjasamasetdasmi',
                'bagian'   => 'Bagian Kerjasama dan Bantuan Hukum',
            ],
            [
                'name'     => 'Staf Humas',
                'email'    => 'humas@sukabumi.go.id',
                'password' => 'humassetdasmi',
                'bagian'   => 'Bagian Humas',
            ],
            [
                'name'     => 'Staf Kesra',
                'email'    => 'kesra@sukabumi.go.id',
                'password' => 'kesejahteraansetdasmi',
                'bagian'   => 'Bagian Kesejahteraan Rakyat',
            ],
        ];

        foreach ($bagians as $data) {
            User::updateOrCreate(
                ['email' => $data['email']], // cari berdasarkan email
                [
                    'name'              => $data['name'],
                    'password'          => Hash::make($data['password']),
                    'bagian'            => $data['bagian'],
                    'role'              => 'staff', // sesuaikan kalau ternyata kolom role wajib nilai lain
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}