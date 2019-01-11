<?php

use Illuminate\Database\Migrations\Migration;

class InsertRegistersOnBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('bancos')->insert([
            [
                'nome'       => 'Banco do Brasil',
                'logo'       => 'bb.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Nuconta',
                'logo'       => 'nuconta.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Itau',
                'logo'       => 'itau.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Santander',
                'logo'       => 'santander.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Bradesco',
                'logo'       => 'bradesco.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Caixa',
                'logo'       => 'caixa.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Next',
                'logo'       => 'next.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Neon',
                'logo'       => 'neon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Inter',
                'logo'       => 'inter.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::raw('DELETE FROM bancos');
    }
}
