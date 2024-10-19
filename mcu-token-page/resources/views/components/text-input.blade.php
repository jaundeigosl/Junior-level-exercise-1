@props(['disabled' => false])

<? dd();?>

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-300 border-gray-200 focus:border-black focus:ring-black rounded-md shadow-sm']) }}>
