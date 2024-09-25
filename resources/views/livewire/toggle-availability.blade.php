<div class="flex items-center space-x-2 p-2 rounded-lg">
    <button wire:click="toggleAvailability" class="relative inline-flex items-center justify-between w-11 h-5 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out {{ $availability ? 'bg-green-500' : '' }}">
        <span class="absolute left-0 w-5 h-5 bg-white rounded-full shadow transition-transform duration-200 ease-in-out {{ $availability ? 'transform translate-x-6 bg-green-500' : '' }}"></span>
    </button>

    <span class="ml-2 text-sm font-medium text-gray-700">
        {{ $availability ? 'In Stock' : 'Out of Stock' }}
    </span>
</div>

