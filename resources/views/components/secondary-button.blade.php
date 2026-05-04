<button {{ $attributes->merge(['type' => 'button', 'style' => 'background-color: white; color: #374151; border: 1px solid #d1d5db; padding: 10px 20px; border-radius: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; font-size: 14px; cursor: pointer; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);']) }} class="inline-flex items-center hover:bg-gray-50 transition">
    {{ $slot }}
</button>
