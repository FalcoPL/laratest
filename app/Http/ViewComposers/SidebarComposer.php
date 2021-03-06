<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SidebarComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    // protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    // public function __construct(UserRepository $users)
    // {
        // Dependencies automatically resolved by service container...
        // $this->users = $users;
    // }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view -> with('categories', app('App\Http\Controllers\CategoriesController') -> index());
    }
}