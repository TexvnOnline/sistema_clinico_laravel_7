<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Specialty;
use Faker\Generator as Faker;

$factory->define(Specialty::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(
            [
                'Anatomía',
                'Patológica',
                'Anestesiología',
                'Cirugía General',
                'Cirugía Pediátrica',
                'Dermatología',	
                'Geriatría',
                'Laboratorio Clínico',
                'Medicina de Urgencia',
                'Medicina Familiar',
                'Mención Niño',
                'Medicina Familiar Mención Adulto',
                'Medicina Interna',
                'Medicina Nuclear',
                'Medicina Intensiva del Niño	Neurocirugía',
                'Neurología',
                'Neurología Pediátrica',
                'Neonatología',
                'Nutrición Clínica y Diabetología',
                'Obstetricia y Ginecología',
                'Oftalmología',
                'Otorrinolaringología',
                'Pediatría',
                'Psiquiatría	Psiquiatría del Niño y del Adolescente',
                'Radiología',
                'Radio-Oncología',
                'Salud Pública',
                'Traumatología y Ortopedia',
                'Urología',
            ]),
        

    ];
});
