<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class MasterComposer 
{
    public function compose(View $view)
    {
        $view->with('topCategories', Category::with('child')->where(['parent_id'=>null,'status'=>'active'])->get());
    }
}