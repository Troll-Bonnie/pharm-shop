<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News_article;

class NewsComponent extends Component
{

    use WithPagination;

    public function render()
    {
        $page_size = 8;
        $news = News_article::paginate($page_size);
        return view('livewire.news-component',[
            'news' => $news
        ])->layout('layouts.base');
    }
}
