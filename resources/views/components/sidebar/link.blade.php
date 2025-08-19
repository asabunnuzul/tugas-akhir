@props(['active', 'route', 'label'])
<a {{ $attributes }} href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'border-l pl-3 relative flex items-center cursor-pointer  font-semibold hover:text-gray-300 text-white text-md  hover:border-white border-white capitalize ' : 'border-l border-slate-300 pl-3 relative flex items-center cursor-pointer  font-semibold hover:text-gray-200 text-md text-slate-600' }}  hover:border-white capitalize">
    {{ $label ?? str_replace('-', ' ', $route)}}
</a>