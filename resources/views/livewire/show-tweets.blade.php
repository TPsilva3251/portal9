<div>
    <div class="primary" style="background-color: #87ceeb; text-align: center">
        <h2>Visualizar seus Tweets</h2>
    </div>
    <form method="post" wire:submit.prevent='create'>
        {{-- <input type="text" class="form-control" name="content" id="content" wire:model='content'> --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Digite aqui seu Tweet" name="content" id="content"
                wire:model='content'>
            <span class="input-group-text" id="basic-addon2"><button type="submit" class="btn btn-success">Criar
                    Tweet</button></span>
        </div>
        @error('content')
            <br><br>
            {{ $message }}
        @enderror
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
                <div>
                    <div class="container" style="padding-inline-start: 5em">
                        {{ $tweet->content }}
                    </div>

                    @if ($tweet->likes->count())
                        <div class="container" style="padding-inline-start: 85vw">
                            <a href="#" wire:click.prevent='unlike({{ $tweet->id }})'
                                style="text-decoration: none; color: #ff0000">Descurtir</a>
                        </div>
                    @else
                        <div class="container" style="padding-inline-start: 85vw">
                            <a href="#" wire:click.prevent='like({{ $tweet->id }})'
                                style="text-decoration: none; color: #038000">Curtir</a>
                        </div>
                    @endif
                </div>
                <br>
            </div>
        </div>
        <hr>
    @endforeach
    <div>
        {{ $tweets->links() }}
    </div>
    <div>
        <button wire:click.prevent='contador'>teste</button>

    </div>
</div>
