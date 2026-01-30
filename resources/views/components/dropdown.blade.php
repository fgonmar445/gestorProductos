@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    $alignmentClasses = match ($align) {
        'left' => 'left-0',
        'top' => 'origin-top',
        default => 'right-0',
    };

    $width = $width === '48' ? 'w-48' : $width;
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false">
    {{-- Botón que abre/cierra --}}
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    {{-- Contenido del menú --}}
    <div
        x-show="open"
        x-transition
        class="absolute z-[9999] mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
