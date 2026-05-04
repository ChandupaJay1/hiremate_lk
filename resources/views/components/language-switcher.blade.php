<div class="flex items-center gap-2">
    <a href="?lang=en" class="text-xs font-bold px-2 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-brand-500 text-white shadow-sm' : 'text-gray-500 hover:bg-gray-100' }} transition-all">
        EN
    </a>
    <a href="?lang=si" class="text-xs font-bold px-2 py-1 rounded {{ app()->getLocale() == 'si' ? 'bg-brand-500 text-white shadow-sm' : 'text-gray-500 hover:bg-gray-100' }} transition-all">
        සිං
    </a>
    <a href="?lang=ta" class="text-xs font-bold px-2 py-1 rounded {{ app()->getLocale() == 'ta' ? 'bg-brand-500 text-white shadow-sm' : 'text-gray-500 hover:bg-gray-100' }} transition-all">
        தமி
    </a>
</div>
