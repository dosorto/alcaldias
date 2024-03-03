<!-- importar-excel.blade.php -->

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="importar">
        <input type="file" wire:model="archivo">
        @error('archivo') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Importar</button>
    </form>
</div>
