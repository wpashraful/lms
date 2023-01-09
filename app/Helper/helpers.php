<?php

use Illuminate\Support\Facades\Auth;

function rolePermissionCheck($permission){

    $user = Auth::user();
    $check = $user->hasPermissionTo($permission);
    if(!$check){
        flash()->addWarning('not admin user');
        return redirect()->route('dashboard');
    }

}

