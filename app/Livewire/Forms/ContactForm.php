<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Contact;
use Livewire\Attributes\Validate;

class ContactForm extends Form
{
    //
    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|email:dns')]
    public $email;
    #[Validate('required|min:3')]
    public $message;

    public function createNewContact()
    {
        // dd("oke");
        $this->validate();

        Contact::create($this->all());

        $this->reset();
        session()->flash('success', 'Thank you for contacting us. We will get back to you soon!');
    }
}
