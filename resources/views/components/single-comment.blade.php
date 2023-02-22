@props(['comment'])

<x-card>
    <div class="d-flex">
        <div>
            <img
                src="#"
                width="50"
                height="50"
                class="rounded-circle"
                alt=""
            >
        </div>
        <div class="ms-3">
            <h6>Haing Min Than</h6>
            <p class="text-secondary">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</x-card>