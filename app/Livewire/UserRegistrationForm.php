<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

#[Title('Users Page')]
class UserRegistrationForm extends Component
{
    use WithFileUploads;
    public $title = 'Users Page';

    public $randomUser;

    //tempat untuk menyimpat request input user(userRegister)
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email:dns|unique:users,email')]
    public $email;
    #[Validate('required|string|min:6')]
    public $password;
    #[Validate('image|nullable|max:5000')]
    public $avatar;

    public function showRandomUser()
    {
        // $this->randomUser = User::get()->random();
        $this->randomUser = User::inRandomOrder()->first();
    }
    // membuat user baru dari inputan form(userRegister)
    public function createUser()
    {

        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar'],
        ]);
        // reset input field setelah submit
        $this->reset(['name', 'email', 'password', 'avatar']);

        session()->flash('success', 'User created successfully.');
        $this->dispatch('user-created');
    }
    // fungsi untuk menghapus avatar yang sudah diupload(userRegister)
    public function clearAvatar()
    {
        $this->avatar = null;
    }

    public function render()
    {
        return view('livewire.user-registration-form');
    }
}
