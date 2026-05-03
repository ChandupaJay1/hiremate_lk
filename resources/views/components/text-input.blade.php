@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block mt-1 w-full border-[#19140035] dark:border-[#3E3E3A] rounded-sm focus:border-[#1915014a] dark:focus:border-[#62605b]']) }}>
