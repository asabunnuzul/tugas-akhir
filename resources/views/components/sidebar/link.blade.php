@props(['active', 'route', 'label'])
<a {{ $attributes }} href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'border-l pl-3 relative flex items-center cursor-pointer  font-semibold hover:text-sky-700 text-sky-500 text-md  hover:border-sky-500 border-sky-400 capitalize ' : 'border-l border-slate-300 pl-3 relative flex items-center cursor-pointer  font-semibold hover:text-sky-500 text-md text-slate-500' }}  hover:border-sky-400 capitalize">
    {{ $label ?? str_replace('-', ' ', $route)}}
</a>