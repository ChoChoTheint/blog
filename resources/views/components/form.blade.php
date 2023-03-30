@props(['name','title','type','value'=>null,'old'=>null])

<div class="mb-3">
  <label for="{{ $name }}" class="form-label">{{ $title }}</label>
  <input name="{{ $name }}" type="{{ $type}}" class="form-control" id="{{$name}}" placeholder="Enter {{ $name }}" value="{{ $old ? $old : $value }}">
  <x-error :name="$name" />
</div>