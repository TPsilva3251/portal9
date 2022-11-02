<div>
    <h1>Atualizar foto do perfil</h1>
    <br><br>
    <form method="post" wire:submit.prevent='storagePhoto'>
        <input type="file" wire:model='photo'>
        <br><br>
        @error('photo')
            {{ $message }}
            <br>
        @enderror        
        <button type="submit" style="background-color: #038000">Upload Foto</button>
    </form>
</div>
