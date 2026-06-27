@if (session('success'))
    <div class="mb-6 rounded-xl border border-green-400 bg-green-100 px-4 py-3 text-green-700" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-6 rounded-xl border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
        <ul class="list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
