<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class FavoriteComposer
{
    public $favCount;    
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $fav = session('favorites');
        if(isset($fav))
        {
            $this->favCount = count($fav);
        }
        else{
            $this->favCount =0;
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('favCount', $this->favCount);
    }
}