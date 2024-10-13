
<a {{ $attributes->merge(['class' => 'inline-flex items-center px-1 pt-1 border-y-2 border-transparent text-base font-medium leading-5 text-zinc-400 hover:text-red-600 hover:border-red-600 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out' ]) }}>
    {{ $slot }}
</a>
