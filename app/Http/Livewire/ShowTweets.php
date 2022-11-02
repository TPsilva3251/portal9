<?php

namespace App\Http\Livewire;

use App\Models\like;
use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = '';
    

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {

        $tweets = Tweet::with('user')->latest()->paginate(4);       
        // $quants = like::select('tweet_id', like::raw('count(*) as total'))
        //          ->groupBy('tweet_id')
        //          ->get();
                //  dd($quants);
        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);

    }

    public function create()
    {
        $this->validate();

        // Tweet::create([
        //     'content' => $this->content,
        //     'user_id' => 1,
        // ]);

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function like($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id,
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }

   
}
