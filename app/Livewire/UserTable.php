<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

class UserTable extends Component
{
    public $users, $name, $email, $user_id;

    public $ShowHideUser = true;

    public function render()
    {
        if ($this->ShowHideUser){
            
            $this->users = User::all();
            return view('livewire.user-table')->layout('layouts.app'); // Especificando o layout
     
        } else{
            return view('dashboard')->layout('layouts.app');
            $this->ShowHideUser = true; 
        } 
    }

    public function ShowDashboard()
    {
        $this->ShowHideUser = false;
    }    
}
