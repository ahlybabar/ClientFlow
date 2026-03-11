@props([
    'label',
    'value',
    'trend' => null,
    'trendType' => 'positive', // positive, negative, neutral
    'icon' => null,
    'color' => 'neutral' // primary, success, warning, danger, neutral
])

@php
    $colorStyles = [
        'primary' => ['bg' => 'bg-[#EEF2FF] dark:bg-[var(--color-active-bg)]', 'text' => 'text-[#4F7CFF]'],
        'success' => ['bg' => 'bg-[#ECFDF5] dark:bg-[rgba(34,197,94,0.1)]', 'text' => 'text-[#22C55E]'],
        'warning' => ['bg' => 'bg-[#FEF3C7] dark:bg-[rgba(245,158,11,0.1)]', 'text' => 'text-[#F59E0B]'],
        'danger'  => ['bg' => 'bg-[#FEF2F2] dark:bg-[rgba(239,68,68,0.1)]', 'text' => 'text-[#EF4444]'],
        'neutral' => ['bg' => 'bg-[var(--color-hover)]', 'text' => 'text-[var(--color-text-secondary)]'],
    ];

    $trendStyles = [
        'positive' => 'text-[#22C55E]',
        'negative' => 'text-[#EF4444]',
        'neutral'  => 'text-[#94A3B8]',
    ];

    $selectedColor = $colorStyles[$color] ?? $colorStyles['neutral'];
    $selectedTrendColor = $trendStyles[$trendType] ?? $trendStyles['neutral'];

    $trendIcon = match($trendType) {
        'positive' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>',
        'negative' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path>',
        default => '',
    };
@endphp

<div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow group">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-[14px] font-medium text-[var(--color-text-secondary)]">{{ $label }}</p>
            <p class="mt-2 text-[32px] font-bold text-[var(--color-text)] leading-none">{{ $value }}</p>
            
            @if($trend)
            <div class="mt-3 flex items-center gap-1.5">
                @if($trendType !== 'neutral')
                <svg class="w-4 h-4 {{ $selectedTrendColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $trendIcon !!}
                </svg>
                @endif
                <p class="text-[13px] {{ $selectedTrendColor }} font-medium">
                    {{ $trend }}
                    <span class="text-[var(--color-text-muted)] font-normal ml-1">vs last month</span>
                </p>
            </div>
            @endif
        </div>
        
        @if($icon)
        <div class="p-3 rounded-xl {{ $selectedColor['bg'] }} {{ $selectedColor['text'] }} group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        </div>
        @endif
    </div>
    
    {{ $slot ?? '' }}
</div>
