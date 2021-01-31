<?php

namespace App\Policies;

use App\Karyawan;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KaryawanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function view(User $user, Karyawan $karyawan)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return $user->email === 'admin@admin.com';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function update(User $user, Karyawan $karyawan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function delete(User $user, Karyawan $karyawan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function restore(User $user, Karyawan $karyawan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Karyawan  $karyawan
     * @return mixed
     */
    public function forceDelete(User $user, Karyawan $karyawan)
    {
        //
    }
}
