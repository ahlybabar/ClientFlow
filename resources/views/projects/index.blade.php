@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="space-y-6" x-data="{ statusFilter: 'all' }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--color-text)]">Projects</h1>
            <p class="mt-1 text-sm text-[var(--color-text-secondary)]">Track and manage all your client projects</p>
        </div>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:bg-[#4338CA] font-medium text-sm transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Project
        </button>
    </div>

    {{-- Project Health Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="flex items-center gap-3 p-4 bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm">
            <div class="w-10 h-10 rounded-full bg-[#ECFDF5] dark:bg-[rgba(34,197,94,0.1)] flex items-center justify-center">
                <svg class="w-5 h-5 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-[#22C55E]">3</p>
                <p class="text-xs text-[var(--color-text-secondary)]">Healthy Projects</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm">
            <div class="w-10 h-10 rounded-full bg-[#FEF3C7] dark:bg-[rgba(245,158,11,0.1)] flex items-center justify-center">
                <svg class="w-5 h-5 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-[#F59E0B]">2</p>
                <p class="text-xs text-[var(--color-text-secondary)]">At Risk</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm">
            <div class="w-10 h-10 rounded-full bg-[#FEF2F2] dark:bg-[rgba(239,68,68,0.1)] flex items-center justify-center">
                <svg class="w-5 h-5 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-[#EF4444]">1</p>
                <p class="text-xs text-[var(--color-text-secondary)]">Critical</p>
            </div>
        </div>
    </div>

    <!-- Status Filter Tabs -->
    <div class="flex flex-wrap gap-2">
        @foreach([
            ['v' => 'all',         'l' => 'All Projects', 'c' => 6],
            ['v' => 'In Progress', 'l' => 'In Progress',  'c' => 3],
            ['v' => 'Planning',    'l' => 'Planning',     'c' => 1],
            ['v' => 'Review',      'l' => 'Review',       'c' => 1],
            ['v' => 'Completed',   'l' => 'Completed',    'c' => 1],
        ] as $tab)
        <button @click="statusFilter = '{{ $tab['v'] }}'"
                :class="statusFilter === '{{ $tab['v'] }}' ? 'bg-[#4F46E5] text-white border-transparent' : 'border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)]'"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
            {{ $tab['l'] }}
            <span :class="statusFilter === '{{ $tab['v'] }}' ? 'bg-white/20' : 'bg-[var(--color-bg-secondary)]'" class="text-xs px-1.5 py-0.5 rounded-full">{{ $tab['c'] }}</span>
        </button>
        @endforeach
    </div>

    <!-- Project Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
        @foreach([
            ['name' => 'Website Redesign',    'client' => 'Acme Corp',        'team' => ['JD','SK','MW'], 'status' => 'In Progress', 'deadline' => 'Mar 15', 'progress' => 75,  'tasks' => ['done' => 9, 'total' => 12], 'health' => 'healthy', 'healthReasons' => []],
            ['name' => 'Mobile App',          'client' => 'TechStart Inc',    'team' => ['JD','AB'],      'status' => 'In Progress', 'deadline' => 'Apr 20', 'progress' => 45,  'tasks' => ['done' => 5, 'total' => 11], 'health' => 'at-risk', 'healthReasons' => ['3 overdue tasks', 'Deadline approaching']],
            ['name' => 'Brand Identity',      'client' => 'Acme Corp',        'team' => ['SK'],           'status' => 'Completed',   'deadline' => 'Feb 28', 'progress' => 100, 'tasks' => ['done' => 8, 'total' => 8],  'health' => 'healthy', 'healthReasons' => []],
            ['name' => 'E-commerce Platform', 'client' => 'Global Solutions', 'team' => ['JD','SK','MW','AB'], 'status' => 'Planning', 'deadline' => 'May 10', 'progress' => 10, 'tasks' => ['done' => 1, 'total' => 10], 'health' => 'critical', 'healthReasons' => ['4 overdue tasks', 'Budget exceeded', 'Deadline approaching']],
            ['name' => 'Dashboard UI',        'client' => 'Innovate Labs',    'team' => ['MW'],           'status' => 'In Progress', 'deadline' => 'Mar 25', 'progress' => 60,  'tasks' => ['done' => 6, 'total' => 10], 'health' => 'at-risk', 'healthReasons' => ['2 overdue tasks']],
            ['name' => 'API Integration',     'client' => 'TechStart Inc',    'team' => ['AB'],           'status' => 'Review',      'deadline' => 'Mar 12', 'progress' => 90,  'tasks' => ['done' => 7, 'total' => 8],  'health' => 'healthy', 'healthReasons' => []],
        ] as $project)
        @php
        $statusClasses = [
            'Completed'   => 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]',
            'In Progress' => 'bg-[#EEF2FF] text-[#4F46E5] dark:bg-[var(--color-active-bg)]',
            'Review'      => 'bg-[#FEF3C7] text-[#D97706] dark:bg-[rgba(217,119,6,0.1)]',
            'Planning'    => 'bg-[var(--color-hover)] text-[var(--color-text-secondary)]',
        ];
        $healthClasses = [
            'healthy'  => ['bg' => 'bg-[#22C55E]', 'text' => 'text-[#22C55E]', 'label' => 'Healthy',  'ring' => 'ring-[#22C55E]/20', 'bgLight' => 'bg-[#ECFDF5] dark:bg-[rgba(34,197,94,0.1)]'],
            'at-risk'  => ['bg' => 'bg-[#F59E0B]', 'text' => 'text-[#F59E0B]', 'label' => 'At Risk',  'ring' => 'ring-[#F59E0B]/20', 'bgLight' => 'bg-[#FEF3C7] dark:bg-[rgba(245,158,11,0.1)]'],
            'critical' => ['bg' => 'bg-[#EF4444]', 'text' => 'text-[#EF4444]', 'label' => 'Critical', 'ring' => 'ring-[#EF4444]/20', 'bgLight' => 'bg-[#FEF2F2] dark:bg-[rgba(239,68,68,0.1)]'],
        ];
        $hc = $healthClasses[$project['health']];
        $barColor = $project['progress'] === 100 ? 'bg-[#22C55E]' : ($project['health'] === 'critical' ? 'bg-[#EF4444]' : ($project['health'] === 'at-risk' ? 'bg-[#F59E0B]' : 'bg-[#4F46E5]'));
        @endphp
        <a href="{{ route('projects.show', 1) }}"
           x-show="statusFilter === 'all' || statusFilter === '{{ $project['status'] }}'"
           class="block bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-lg transition-all group">
            <div class="flex items-start justify-between mb-3">
                <h3 class="font-semibold text-[var(--color-text)] group-hover:text-[#4F46E5] transition-colors">{{ $project['name'] }}</h3>
                <div class="flex items-center gap-2">
                    {{-- Health Badge --}}
                    <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold px-2 py-0.5 rounded-full {{ $hc['bgLight'] }} {{ $hc['text'] }}" title="{{ $hc['label'] }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $hc['bg'] }} animate-pulse"></span>
                        {{ $hc['label'] }}
                    </span>
                    <span class="text-xs font-medium px-2.5 py-1 rounded-full {{ $statusClasses[$project['status']] ?? '' }}">{{ $project['status'] }}</span>
                </div>
            </div>
            <p class="text-sm text-[var(--color-text-secondary)] mb-4">{{ $project['client'] }}</p>

            {{-- Health Reasons (if any) --}}
            @if(count($project['healthReasons']) > 0)
            <div class="mb-4 p-2.5 rounded-lg {{ $hc['bgLight'] }} border border-{{ $project['health'] === 'critical' ? '[#EF4444]/10' : ($project['health'] === 'at-risk' ? '[#F59E0B]/10' : '[#22C55E]/10') }}">
                @foreach($project['healthReasons'] as $reason)
                <p class="text-[11px] {{ $hc['text'] }} flex items-center gap-1.5">
                    <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                    {{ $reason }}
                </p>
                @endforeach
            </div>
            @endif

            <!-- Team avatars -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex -space-x-2">
                    @foreach($project['team'] as $member)
                    <div class="w-8 h-8 rounded-full bg-[#4F46E5] border-2 border-[var(--color-card)] flex items-center justify-center text-white text-xs font-medium">{{ $member }}</div>
                    @endforeach
                </div>
                <span class="text-xs text-[var(--color-text-secondary)]">{{ $project['tasks']['done'] }}/{{ $project['tasks']['total'] }} tasks</span>
            </div>

            <div class="flex items-center justify-between text-sm text-[var(--color-text-secondary)] mb-2">
                <span class="flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Due {{ $project['deadline'] }}
                </span>
                <span class="font-semibold text-[var(--color-text)]">{{ $project['progress'] }}%</span>
            </div>
            <div class="h-1.5 bg-[var(--color-border)] rounded-full overflow-hidden">
                <div class="h-full {{ $barColor }} rounded-full transition-all" style="width: {{ $project['progress'] }}%"></div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
