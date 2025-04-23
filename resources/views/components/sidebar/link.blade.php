@props(['active', 'route', 'label'])
<a {{ $attributes }} href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'border-l pl-3 relative flex items-center cursor-pointer  font-semibold hover:text-emerald-700 text-emerald-500 text-md  hover:border-emerald-500 border-emerald-400 capitalize ' : 'border-l border-slate-300 pl-3 relative flex items-center cursor-pointer  font-semibold hover:text-emerald-500 text-md text-slate-500' }}  hover:border-emerald-400 capitalize">
    {{ $label ?? str_replace('-', ' ', $route)}}
</a>