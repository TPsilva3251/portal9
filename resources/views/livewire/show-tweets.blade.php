<div>
    ShowTweets
    <br><br>
    {{ $message }}
    <br><br>
    <input type="text" name="message" id="message" wire:model='message'>
    <hr>
    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}}
        <br>
    @endforeach
</div>
