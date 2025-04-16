@props(['href', 'active' => false, 'icon' => ''])

<li class="nav-item {{ $active ? 'active' : '' }}">
    <a href="{{ $href }}" class="nav-link">
        <i class="{{ $icon }}"></i>
        <span>{{ $slot }}</span>
    </a>
</li>