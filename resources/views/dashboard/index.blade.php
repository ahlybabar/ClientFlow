@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')

@endsection

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div>
        <h1 class="text-[28px] font-bold text-[var(--color-text)]">Dashboard</h1>
        <p class="mt-1 text-sm text-[var(--color-text-secondary)] mb-4">Welcome back! Here's what's happening with your projects.</p>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-6 mb-8">
        @php
            $kpis = [
                ['label' => 'Total Clients', 'value' => '48', 'trend' => '+12%', 'trendType' => 'positive', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />', 'color' => 'primary'],
                ['label' => 'Active Projects', 'value' => '24', 'trend' => '+5%', 'trendType' => 'positive', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />', 'color' => 'success'],
                ['label' => 'Tasks Completed', 'value' => '156', 'trend' => '+23%', 'trendType' => 'positive', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />', 'color' => 'warning'],
                ['label' => 'Monthly Revenue', 'value' => '$24,500', 'trend' => '+18%', 'trendType' => 'positive', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />', 'color' => 'primary'],
            ];
        @endphp
        @foreach($kpis as $kpi)
            <x-metric-card 
                :label="$kpi['label']" 
                :value="$kpi['value']" 
                :trend="$kpi['trend']" 
                :trendType="$kpi['trendType']" 
                :icon="$kpi['icon']" 
                :color="$kpi['color']" 
            />
        @endforeach
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Project Progress Chart -->
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Project Progress</h3>
            <p class="text-[12px] text-[var(--color-text-secondary)] mt-1">Completion rate by project</p>
            <div class="mt-6 h-64">
                <canvas id="projectProgressChart"></canvas>
            </div>
        </div>

        <!-- Monthly Revenue Graph -->
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Monthly Revenue</h3>
            <p class="text-[12px] text-[var(--color-text-secondary)] mt-1">Revenue trend over the last 6 months</p>
            <div class="mt-6 h-64">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Task Completion & Widgets -->
    <div class="grid grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)) lg:grid-cols-4 gap-6">
        <!-- Task Completion Rate -->
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Task Completion Rate</h3>
            <div class="mt-6 flex items-center justify-center">
                <div class="relative w-40 h-40">
                    <canvas id="taskCompletionChart"></canvas>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-2xl font-bold text-[var(--color-text)]">78%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="lg:col-span-2 bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Recent Activities</h3>
            <div class="mt-4 space-y-4">
                @foreach([
                    ['action' => 'New client added', 'detail' => 'Acme Corp', 'time' => '2 min ago', 'type' => 'client'],
                    ['action' => 'Project completed', 'detail' => 'Website Redesign', 'time' => '1 hour ago', 'type' => 'project'],
                    ['action' => 'Invoice paid', 'detail' => 'INV-0042 - $2,500', 'time' => '3 hours ago', 'type' => 'payment'],
                ] as $activity)
                    <div class="flex gap-4 py-3 border-b border-[var(--color-border)] last:border-0 hover:bg-[var(--color-hover)] transition-colors rounded-lg px-2 -mx-2">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 shadow-sm
                            {{ $activity['type'] === 'client' ? 'bg-[#EEF2FF] text-[#4F46E5] dark:bg-[var(--color-active-bg)]' : 
                              ($activity['type'] === 'project' ? 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]' : 
                               'bg-[#FEF3C7] text-[#F59E0B] dark:bg-[rgba(245,158,11,0.1)]') }}">
                            @if($activity['type'] === 'client')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @elseif($activity['type'] === 'project')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @endif
                        </div>
                        <div>
                            <p class="text-[14px] font-medium text-[var(--color-text)]">{{ $activity['action'] }}</p>
                            <p class="text-[12px] text-[var(--color-text-secondary)]">{{ $activity['detail'] }} · {{ $activity['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Upcoming & Overdue -->
        <div class="space-y-6">
            <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Upcoming Deadlines</h3>
                <div class="mt-4 space-y-3">
                    @foreach([
                        ['task' => 'Final design review', 'date' => 'Mar 8', 'project' => 'Website Redesign'],
                        ['task' => 'API integration', 'date' => 'Mar 10', 'project' => 'Mobile App'],
                    ] as $item)
                        <div class="flex items-center justify-between py-3 border-b border-[var(--color-border)] last:border-0 hover:bg-[var(--color-hover)] transition-colors rounded-lg px-2 -mx-2">
                            <div>
                                <p class="text-[14px] font-medium text-[var(--color-text)]">{{ $item['task'] }}</p>
                                <p class="text-[12px] text-[var(--color-text-secondary)]">{{ $item['project'] }}</p>
                            </div>
                            <span class="text-[11px] font-medium text-[#4F46E5] bg-[#EEF2FF] dark:bg-[var(--color-active-bg)] px-2.5 py-1 rounded-full">{{ $item['date'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow border-l-4 border-l-[#EF4444]">
                <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Overdue Invoices</h3>
                <div class="mt-4 flex items-center justify-between">
                    <div>
                        <p class="text-[32px] font-bold text-[#EF4444] leading-none">3</p>
                        <p class="text-[13px] text-[var(--color-text-secondary)] mt-1">Total: $4,200</p>
                    </div>
                    <a href="{{ route('invoices.index') }}" class="p-2 rounded-lg bg-[#FEF2F2] dark:bg-[rgba(239,68,68,0.1)] text-[#EF4444] hover:bg-[#FEE2E2] dark:hover:bg-[rgba(239,68,68,0.2)] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            {{-- Project Health Overview --}}
            <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-[20px] font-semibold text-[var(--color-text)]">Project Health</h3>
                    <a href="{{ route('projects.index') }}" class="text-sm text-[#4F46E5] hover:underline font-medium">View all</a>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded-lg bg-[#ECFDF5] dark:bg-[rgba(34,197,94,0.1)] border border-[#22C55E]/20">
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-[#22C55E]"></span>
                            <span class="text-sm font-medium text-[var(--color-text)]">Healthy</span>
                        </div>
                        <span class="text-lg font-bold text-[#22C55E]">3</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg bg-[#FEF3C7] dark:bg-[rgba(245,158,11,0.1)] border border-[#F59E0B]/20">
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-[#F59E0B] animate-pulse"></span>
                            <span class="text-sm font-medium text-[var(--color-text)]">At Risk</span>
                        </div>
                        <span class="text-lg font-bold text-[#F59E0B]">2</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg bg-[#FEF2F2] dark:bg-[rgba(239,68,68,0.1)] border border-[#EF4444]/20">
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-[#EF4444] animate-pulse"></span>
                            <span class="text-sm font-medium text-[var(--color-text)]">Critical</span>
                        </div>
                        <span class="text-lg font-bold text-[#EF4444]">1</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Project Progress Bar Chart
    new Chart(document.getElementById('projectProgressChart'), {
        type: 'bar',
        data: {
            labels: ['Website Redesign', 'Mobile App', 'Brand Identity', 'E-commerce', 'Dashboard'],
            datasets: [{
                label: 'Progress %',
                data: [85, 62, 90, 45, 78],
                backgroundColor: window.chartColors.primary,
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, max: 100, grid: { color: 'rgba(226, 232, 240, 0.5)' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Revenue Line Chart
    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Revenue',
                data: [18500, 21200, 19800, 22400, 23100, 24500],
                borderColor: window.chartColors.success,
                backgroundColor: 'rgba(34, 197, 94, 0.1)', // success light
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { color: 'rgba(226, 232, 240, 0.5)' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Task Completion Doughnut
    new Chart(document.getElementById('taskCompletionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Remaining'],
            datasets: [{
                data: [78, 22],
                backgroundColor: [window.chartColors.primary, window.chartColors.neutral + '40'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            cutout: '75%',
            plugins: { legend: { display: false } }
        }
    });
});
</script>
@endpush
@endsection
