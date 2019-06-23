<?php

use Illuminate\Database\Seeder;

class TestSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'many' => [],
            ],
            2 => [
                'many' => [],
            ],
            3 => [
                'many' => [1, 2],
            ],
            4 => [
                'many' => [2],
            ],

        ];

        foreach ($items as $id => $item) {
            $test = \App\Test::find($id);

            foreach ($item as $key => $ids) {
                $test->{$key}()->sync($ids);
            }
        }
    }
}
