<div>
    <p>{{$this->welcome_text}}</p>
    <input type="text" wire:model="input_field"></input>
    <button wire:click="change_welcome_text">Change the Text</button>
</div>
