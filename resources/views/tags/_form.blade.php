<div class="mb-3">
    <label for="name" class="form-label">
        Nombre
    </label>

    <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $tag->name ?? '') }}"
        class="form-control @error('name') is-invalid @enderror"
        maxlength="255"
        required
        autofocus
    >

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        {{ $buttonText }}
    </button>

    <a
        href="{{ route('tags.index') }}"
        class="btn btn-secondary"
    >
        Cancelar
    </a>
</div>