<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class UsersList extends Component
{
    //pagination
    use WithPagination;

    public $title2 = 'New Users';
    public $title3 = 'Show All Users';

    //tempat untuk nampung (userList)
    public $search;


    // tempat untuk menyimpan user random
    public $randomUser;
    public $newUsers = [];

    // membuat user baru dari factory dan langsung simpan ke database(userList)
    public function createFakeUser()
    {
        $users = User::factory()->create();

        array_unshift($this->newUsers, $users);
    }
    // fungsi untuk mereset halaman pagination ketika melakukan pencarian(userList)
    #[On('user-created')]
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function searchUsers()
    {
        $this->resetPage();
    }

     public function placeholder()
    {
        return view('livewire.placeholder.skeleton');
    }

    #[Computed()]
    public function users()
    {
        return User::latest()
                ->where('name', 'like', "%{$this->search}%")
                ->paginate(7);
    }


    public function render()
    {

        return view('livewire.users-list', [
            'users' => $this->users,
        ]);
    }
}
