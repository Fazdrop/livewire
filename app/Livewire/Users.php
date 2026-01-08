<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $title = 'Users Page';
    public $title2 = 'New Users';
    public $title3 = 'Show All Users';
    // tempat untuk menyimpan user random
    public $randomUser;

    public $newUsers = [];

    public function showRandomUser()
    {
        // $this->randomUser = User::get()->random();
        $this->randomUser = User::inRandomOrder()->first();
    }

    // membuat user baru dari factory dan langsung simpan ke database
    public function createFakeUser()
    {
       $users = User::factory()->create();

       array_unshift($this->newUsers, $users);
       
    }

   
 
    
    public function render()
    {
        return view('livewire.users', [
            'users' => User::all(),
        ]);
    }
}
