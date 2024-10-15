<div {{$attributes->merge([
    'class' => 'border-2 p-4 bg-neutral-400 overflow-hidden shadow-sm sm:rounded-lg'
])}}>
        {{$slot}}
</div>
