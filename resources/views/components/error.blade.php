@props(['name'])

@error($name)
    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
@enderror
