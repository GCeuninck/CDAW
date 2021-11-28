<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available()
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->pseudo, $component->state['pseudo']);
        $this->assertEquals($user->email, $component->state['email']);
    }

    public function test_profile_information_can_be_updated()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
                ->set('state', ['pseudo' => 'UpdatePseudo', 'name' => 'nom', 'firstname' => 'prénom', 'birthday' => '2021-11-28', 'email' => 'test@example.com'])
                ->call('updateProfileInformation');

        $this->assertEquals('UpdatePseudo', $user->fresh()->pseudo);
        $this->assertEquals('test@example.com', $user->fresh()->email);
        $this->assertEquals('nom', $user->fresh()->name);
        $this->assertEquals('prénom', $user->fresh()->firstname);
        $this->assertEquals('2021-11-28', $user->fresh()->birthday);
    }
}
