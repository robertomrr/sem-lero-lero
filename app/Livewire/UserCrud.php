<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

class UserCrud extends Component
{
    public $users, $name, $email, $user_id;
    public $isModalOpen = 0;
    public $ShowHideUser = true;

    public function render()
    {
        if ($this->ShowHideUser){
            
            $this->users = User::all();
            return view('livewire.user-crud')->layout('layouts.app'); // Especificando o layout
     
        } else{
            return view('dashboard')->layout('layouts.app');
            $this->ShowHideUser = true; 
        }        
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->user_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            // 'password' => $this->password,
        ]);

        session()->flash('message',
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    } 

    public function ShowDashboard()
    {
        $this->ShowHideUser = false;
    }
}
