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



    public function render()
    {

        // dd( $this->avatar);
        return view('livewire.users');
    }
}
