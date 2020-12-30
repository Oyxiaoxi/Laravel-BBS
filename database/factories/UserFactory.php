<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $avatars = [
            'https://img.zcool.cn/community/016e3c554324510000019ae98659d5.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/01864e554324510000019ae916f559.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/014391554324510000019ae9a6e22e.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/0145ff554324510000019ae963ac21.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/01e072554324510000019ae93c181b.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/017862554324510000019ae9796f84.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/010bb3554324510000019ae964f0d7.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/013040554324510000019ae9cb98c2.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/0120db554324510000019ae9821170.jpg@1280w_1l_2o_100sh.jpg',
            'https://img.zcool.cn/community/01bd97554324500000019ae9def95a.jpg@1280w_1l_2o_100sh.jpg',
        ];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'introduction' => $this->faker->sentence(),
            'avatar' => $this->faker->randomElement($avatars),
        ];
    }
}
