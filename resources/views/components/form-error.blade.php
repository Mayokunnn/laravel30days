@props(['name'])
@error($name)
<span class="text-xs text-red-500 font-semibold">{{$message}}</span>
@enderror
