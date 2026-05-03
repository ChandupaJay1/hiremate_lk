<button {{ $attributes->merge(['type' => 'submit', 'style' => 'background-color: #0d9488; color: white; border: none; padding: 12px 24px; border-radius: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; font-size: 14px; cursor: pointer; box-shadow: 0 4px 6px -1px rgba(13, 148, 136, 0.2);']) }} class="inline-flex items-center hover:opacity-90 transition">
    {{ $slot }}
</button>
