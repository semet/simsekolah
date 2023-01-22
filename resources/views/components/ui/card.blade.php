<div class="row">
    <div {{ $attributes->merge(['class' => 'col-md-'.$width]) }} >
        <div class="card">
            <div class="card-body">
                @if ($title)
                    <h4 class="card-title mb-4">{{ $title }}</h4>
                @endif
                {{-- Card Content --}}
                {{ $slot }}
            </div>
        </div>
    </div>
</div>


