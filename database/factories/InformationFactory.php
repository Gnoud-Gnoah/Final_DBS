<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hoten' => $this->faker->name,
            'ngaysinh' => $this->faker->date($this->format = 'Y-m-d', $this->max = 'now'),
            'gioitinh' => $this->faker->randomElement(['male' ,'female']),
            'quequan' => $this->faker->address,
            'dantoc' => $this->faker->randomElement(['BANA','BO Y','BRAU','BRU-VAN KIEU','CHAM','CHO RO','CHU-RU','CHUT',
            'CO','CO HO','CO LAO','CO TU',
            'CONG','DAO','E-ĐE','GIA RAI',
            'GIAY','GIE-TRIENG','HA NHI','HOA',
            'HRE','KHANG','KHMER','KHƠ MU',
            'LA CHI','LA HA','LA HU','LAO',
            'LO LO','LA','MA','MANG',
            'MNONG','MONG','MUONG','NGAI',
            'NUNG','O ĐU','PA THEN','PHU LA',
            'PU PEO','RA GLAI','RO MAM','SAN CHAY',
            'SAN DIU','SI LA','TA OI', 'TAY',
            'THAI','THO','KINH','XINH MUN',
            'XO ĐANG','XTIENG']),
            'socmnd' => $this->faker->numberBetween(123456789,987654321),
        ];
    }
}
