<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    //untuk menggunakan use
    use WithFileUploads;
    use WithPagination;

    // tempat untuk menyimpan judul halaman
    public $title = 'Users Page';
    public $title2 = 'New Users';
    public $title3 = 'Show All Users';

    //tempat untuk menyimpat request input user
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email:dns|unique:users,email')]
    public $email;
    #[Validate('required|string|min:6')]
    public $password;
    #[Validate('image|nullable|max:5000')]
    public $avatar;

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

        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        }
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar'],
        ]);
        // reset input field setelah submit
        $this->reset(['name', 'email', 'password','avatar']);

        session()->flash('success', 'User created successfully.');
    }


    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate(7),
        ]);
    }
}
