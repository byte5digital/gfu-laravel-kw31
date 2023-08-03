<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WelcomeComponent extends Component
{

    public $welcome_text = 'Welcome to GFU';

    public $input_field = 'lorem';

    public function render()
    {
        return view('livewire.welcome-component');
    }

    public function change_welcome_text(){
        $this->welcome_text = 'Hola GFU Trainees';
    }
}
