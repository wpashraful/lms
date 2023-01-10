<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{

    public $selectedPermissions = [];
    public $name;
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.role-create', [
            'permissions' => $permissions
            ]);
    }

    protected $rules = [
            'name' => 'required',
            'selectedPermissions' => 'required|array|min:1'
    ];

    public function roleFormsubmit(){
            $this->validate();
        $role = Role::create(['name'=> $this->name]);
        $role->syncPermissions($this->selectedPermissions);

        flash()->addSuccess('roles and permissions created successfully');
        return redirect()->route('role.index');

    }
}
