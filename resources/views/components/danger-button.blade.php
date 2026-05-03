<button {{ $attributes->merge(['type' => 'submit', 'style' => 'background-color: #dc2626; color: white; border: none; padding: 10px 20px; border-radius: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; font-size: 14px; cursor: pointer; shadow: 0 4px 6px -1px rgba(220, 38, 38, 0.2);']) }} class="inline-flex items-center hover:opacity-90 transition">
    {{ $slot }}
</button>
