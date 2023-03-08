<x-layout>
    {{-- flash message --}}
    @if (session('success'))
    <div
        class="alert alert-success"
        role="alert"
    >
        {{session('success')}}
    </div>
    @endif
    <x-hero />
    <x-blog-section :blogs="$blogs" />
    <x-subscribe />
</x-layout>