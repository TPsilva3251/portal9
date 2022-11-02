<div>
    ShowTweets
    <br><br>
    {{ $content }}
    <br><br>
    <form method="post" wire:submit.prevent='create'>
        <input type="text" name="content" id="content" wire:model='content'>
        @error('content')
            <br><br>
            {{ $message }}
        @enderror
        <br><br>
        <button type="submit" style="background-color: #008000">Criar Tweet</button>
    </form>
    <hr>
    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }}
        @if ($tweet->likes->count())
            <a href="#" wire:click.prevent='unlike({{ $tweet->id }})'>Descurtir</a>
        @else
            <a href="#" wire:click.prevent='like({{ $tweet->id }})'>Curtir</a>
        @endif
        <br>
    @endforeach
    <hr>
    <div>
        {{ $tweets->links() }}
    </div>
</div>
