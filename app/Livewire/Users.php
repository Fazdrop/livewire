<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    // tempat untuk menyimpan judul halaman
    public $title = 'Users Page';
    public $title2 = 'New Users';
    public $title3 = 'Show All Users';

    //tempat untuk menyimpat request input user
    public $name;
    public $email;
    public $password;
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

   public function createUser()
   {
     User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
    ]);
    // reset input field setelah submit
    $this->reset(['name', 'email', 'password']);

   }


    public function render()
    {
        return view('livewire.users', [
            'users' => User::all(),
        ]);
    }
}
