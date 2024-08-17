<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

class UserCrud extends Component
{
    public $users, $name, $email, $user_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->users = User::all();
        //return view('livewire.user-crud')->layout('layouts.app'); // Especificando o layout
        return view('livewire.user-crud');
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
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
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
}
