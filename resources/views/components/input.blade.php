<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $multiple ? $name."[]"  : $name }}" id="{{ $name }}" value="{{ old($name,$default) }}"
        placeholder="Enter Post {{ $name}}"
        class="form-control form-control-sm @error("$name") is-invalid @enderror @error('photos.*') is-invalid @enderror"
        @isset($multiple) multiple @endisset>
    @error("$name")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @isset($multiple)
        @error('$name.*')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endisset
</div>
