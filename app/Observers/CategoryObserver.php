<?php

namespace App\Observers;

use App\Category;
use App\Helpers\LogActivity;


class CategoryObserver
{
     public function creating(Category $category)
    {
        $category->category = ucwords($category->category);
        $category->slug = str_slug($category->category);
    }

    public function created(Category $category)
    {
        LogActivity::addToLog('[Category] ' . $category->category . ' created');
        // dd($category->category . " Category is created via observer");
    }

    public function updated(Category $category)
    {
        $category->category = ucwords($category->category);
        $category->slug = str_slug($category->category);
        LogActivity::addToLog('[Category] ' . $category->category . ' updated');
        // dd($category->category . " Category is updated via observer");
    }

    public function deleted(Category $category)
    {
        LogActivity::addToLog('[Category] ' . $category->category . ' deleted');
        // dd($category->category . " Category is deleted via observer");
    }
}
