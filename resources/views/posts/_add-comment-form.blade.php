@auth
<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf
        <header class="flex items-centered">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Want to Participate?</h2>
        </header>

        <x-form.field>
            <x-form.textarea name="body" rows="5" placeholder="Quick, thing of something to say!"/>
            <x-form.error name="body" />
        </x-form.field>

        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <x-form.button>POST</x-form.button>
        </div>

    </form>
</x-panel>

@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment.
</p>

@endauth