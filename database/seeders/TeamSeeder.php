<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = config('teams');

        foreach ($teams as $team) {
            $new_team = new Team();
            $new_team->fill($team);
            $new_team->save();
        }
    }
}
