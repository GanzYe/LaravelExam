<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Product $product)
    {
        //
    }

    public function create(User $user)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    public function update(User $user, Product $product)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    public function delete(User $user, Product $product)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    public function restore(User $user, Product $product)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    public function forceDelete(User $user, Product $product)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }
}
