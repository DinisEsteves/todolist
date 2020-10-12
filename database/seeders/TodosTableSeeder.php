<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    private $numberOfTodos = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Todos table seeder notice'], [
            ['Edit this file to change the number of Todos created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfTodos . ' Todos ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfTodos);

        for ($i = 0; $i < $this->numberOfTodos; ++$i) {
            Todo::factory()->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
