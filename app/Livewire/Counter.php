<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Counter Page')]
class Counter extends Component
{
    public $count = 1;

    public function mount()
    {
        $this->count = session()->get('counter_current', 1);

    }


    public function increment(){
        $this->count++;
        session()->put('counter_current', $this->count);
    }

    public function decrement(){
        $this->count--;
        session()->put('counter_current', $this->count);
    }

    public function render()
    {

        return view('livewire.counter',[
            'title' => 'Counter Livewire Laravel 12'
        ]);
    }
}
