<div {{$attributes->merge([
    'class' => 'border-2 bg-neutral-400 overflow-hidden shadow-sm sm:rounded-lg'
])}}>
    <div class="p-6 text-gray-900">
        {{$slot}}
    </div>
</div>
