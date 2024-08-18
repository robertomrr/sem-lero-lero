<div>
    <div class="container mx-auto">

        <div class="grid grid-cols-2">
            <div class="mb-4">
                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create User (Table)</button>
            </div>
                        
            <div class="mb-4">            
                <button wire:click="ShowDashboard()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voltar</button>
            </div>
        </div>
    
        {{-- if($isModalOpen)
            include('livewire.create')
        endif --}}
    
        <table class="table-fixed w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Admin</th>
                    <th class="px-4 py-2">Created_at</th>
                    <th class="px-4 py-2">Last Update</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr wire:key="{{ $user->id }}" class="border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}</th>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 {{ $user->is_admin ? 'text-green-500' : 'text-blue-500' }}">
                        {{ $user->is_admin ? 'Admin' : 'Member' }}</td>
                    <td class="px-4 py-3">{{ $user->created_at }}</td>
                    <td class="px-4 py-3">{{ $user->updated_at }}</td>
                    <td class="px-4 py-3 flex items-center justify-end">
                        <button
                            onclick="confirm('Are you sure you want to delete {{ $user->name }} ?') || event.stopImmediatePropagation()"
                            wire:click="delete({{ $user->id }})"
                            class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                    </td>
                </tr>                
                {{-- <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->is_admin }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $user->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button wire:click="delete({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr> --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>