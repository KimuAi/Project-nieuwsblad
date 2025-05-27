<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();

        if (!$admin) {
            User::factory()->admin()->create();
        }

        $this->call([
            \Database\Seeders\NieuwsitemSeeder::class,
            \Database\Seeders\FaqSeeder::class,
        ]);
    }
}
