<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domain>
 */
class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_domain' => $this->faker->text(),
            'epp_code' => $this->faker->text(),
            'keterangan_domain' => $this->faker->text(),
            'lokasi_domain' => $this->faker->text(),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_expired' => $this->faker->date(),
            'status_domain' => $this->faker->text('Aktif'),
            'hosting' => $this->faker->text(),
            'kapasitas_hosting' => $this->faker->number(),
            'tanggal_hosting' => $this->faker->date(),
            'lokasi_hosting' => $this->faker->text(),
            'paket_website' => $this->faker->text(),
            'jumlah_email' => $this->faker->number(),
        ];
    }
}
