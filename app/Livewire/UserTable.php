<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;




class UserTable extends Component
{
    public $users, $name, $email, $user_id;

    public $ShowHideUser = true;

    use WithPagination;
    protected $paginationTheme = 'bootstrap'; // Define o tema de paginação, opcional
    
    public function render()
    {
        
        if ($this->ShowHideUser){
            
            $this->users = User::all();
            return view('livewire.user-table')->layout('layouts.app');
     
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
