<div class="mb-3">
    <label for="title" class="form-label">
        Título
    </label>

    <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $task->title ?? '') }}"
        class="form-control @error('title') is-invalid @enderror"
        maxlength="255"
        required
    >

    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label for="description" class="form-label">
        Descripción
    </label>

    <textarea
        name="description"
        id="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror"
        required
    >{{ old('description', $task->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">

    <label for="category_id" class="form-label">
        Categoría
    </label>

    <select
        name="category_id"
        id="category_id"
        class="form-select @error('category_id') is-invalid @enderror"
        required
    >

        <option value="">
            Selecciona una categoría
        </option>

        @foreach ($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(
                    old(
                        'category_id',
                        $task->category_id ?? ''
                    ) == $category->id
                )
            >
                {{ $category->name }}
            </option>

        @endforeach

    </select>

    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


@php
    $selectedTags = old(
        'tags',
        isset($task)
            ? $task->tags->pluck('id')->all()
            : []
    );
@endphp


<div class="mb-3">

    <label class="form-label">
        Etiquetas
    </label>

    <div class="border rounded p-3">

        @forelse ($tags as $tag)

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="tags[]"
                    value="{{ $tag->id }}"
                    id="tag-{{ $tag->id }}"
                    @checked(in_array($tag->id, $selectedTags))
                >

                <label
                    class="form-check-label"
                    for="tag-{{ $tag->id }}"
                >
                    {{ $tag->name }}
                </label>

            </div>

        @empty

            <p class="text-danger mb-0">
                No existen etiquetas disponibles.
            </p>

        @endforelse

    </div>

    @error('tags')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror

    @error('tags.*')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror

</div>


<div class="mb-3">

    <label for="is_completed" class="form-label">
        Estado
    </label>

    <select
        name="is_completed"
        id="is_completed"
        class="form-select @error('is_completed') is-invalid @enderror"
        required
    >

        <option
            value="0"
            @selected(
                old(
                    'is_completed',
                    isset($task)
                        ? (int) $task->is_completed
                        : 0
                ) == 0
            )
        >
            Pendiente
        </option>

        <option
            value="1"
            @selected(
                old(
                    'is_completed',
                    isset($task)
                        ? (int) $task->is_completed
                        : 0
                ) == 1
            )
        >
            Completada
        </option>

    </select>

    @error('is_completed')
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
        href="{{ route('tasks.index') }}"
        class="btn btn-secondary"
    >
        Cancelar
    </a>

</div>