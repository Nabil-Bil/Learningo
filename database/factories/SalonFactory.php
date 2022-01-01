<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private $colors=['red','indigo','blue','gray','yellow','green','purple','pink'];
    private $opacity=['100','200','300','400'];

    private function get_color(){
        $random_index_color=array_rand($this->colors);
        $random_index_opacity=array_rand($this->opacity);
        return $this->colors[$random_index_color] . "-" . $this->opacity[$random_index_opacity];
    }
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(6),
            'description'=>$this->faker->sentences(2,true),
            'module'=>$this->faker->sentence(3),
            'user_id'=>2,
            'color_code'=>$this->get_color(),
            'codeSalon'=>Str::random(6),
        ];
    }
}
