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
        <div class="flex">
            <div class="w2/8">
                @if ($tweet->user->photo)
                    <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}"
                        class="rounded-full h-12 w-12">
                @else
                    <img src="{{ url('imgs/noimage.png') }}" alt="{{ $tweet->user->name }}"
                        class="rounded-full h-12 w-12">
                @endif
                {{ $tweet->user->name }}
            </div>
            <div class="w6/8">
                {{ $tweet->content }}
                @if ($tweet->likes->count())
                    <a href="#" wire:click.prevent='unlike({{ $tweet->id }})'>Descurtir</a>
                @else
                    <a href="#" wire:click.prevent='like({{ $tweet->id }})'>Curtir</a>
                @endif
                <br>
            </div>
        </div>
    @endforeach
    <hr>
    <div>
        {{ $tweets->links() }}
    </div>
</div>
