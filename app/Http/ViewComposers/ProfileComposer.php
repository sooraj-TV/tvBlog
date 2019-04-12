<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ProfileComposer
{
    public $test = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->test = [
            'data1', 'data2'
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('profile', $this->test);
    }
}
