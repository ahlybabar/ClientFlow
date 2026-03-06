@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#64748B]">
    <span class="text-[#0F172A] font-medium">Dashboard</span>
</nav>
@endsection

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div>
        <h1 class="text-2xl font-bold text-[#0F172A] dark:text-[#E5E7EB]">Dashboard</h1>
        <p class="mt-1 text-sm text-[#64748B] dark:text-[#9CA3AF]">Welcome back! Here's what's happening with your projects.</p>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $kpis = [
                ['label' => 'Total Clients', 'value' => '48', 'change' => '+12%', 'positive' => true, 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'bg-[#EEF2FF] text-[#4F46E5]'],
                ['label' => 'Active Projects', 'value' => '24', 'change' => '+5%', 'positive' => true, 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'color' => 'bg-[#ECFDF5] text-[#22C55E]'],
                ['label' => 'Tasks Completed', 'value' => '156', 'change' => '+23%', 'positive' => true, 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'color' => 'bg-[#FEF3C7] text-[#F59E0B]'],
                ['label' => 'Monthly Revenue', 'value' => '$24,500', 'change' => '+18%', 'positive' => true, 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'bg-[#EEF2FF] text-[#4F46E5]'],
            ];
        @endphp
        @foreach($kpis as $kpi)
            <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm hover:shadow-md transition-all">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-[#64748B] dark:text-[#9CA3AF]">{{ $kpi['label'] }}</p>
                        <p class="mt-2 text-2xl font-bold text-[#0F172A] dark:text-[#E5E7EB]">{{ $kpi['value'] }}</p>
                        <p class="mt-1 text-sm {{ $kpi['positive'] ? 'text-[#22C55E]' : 'text-[#EF4444]' }}">
                            {{ $kpi['change'] }} from last month
                        </p>
                    </div>
                    <div class="p-2.5 rounded-lg {{ $kpi['color'] }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $kpi['icon'] }}"/>
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Project Progress Chart -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Project Progress</h3>
            <p class="text-sm text-[#64748B] dark:text-[#9CA3AF] mt-1">Completion rate by project</p>
            <div class="mt-6 h-64">
                <canvas id="projectProgressChart"></canvas>
            </div>
        </div>

        <!-- Monthly Revenue Graph -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Monthly Revenue</h3>
            <p class="text-sm text-[#64748B] dark:text-[#9CA3AF] mt-1">Revenue trend over the last 6 months</p>
            <div class="mt-6 h-64">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Task Completion & Widgets -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Task Completion Rate -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Task Completion Rate</h3>
            <div class="mt-6 flex items-center justify-center">
                <div class="relative w-40 h-40">
                    <canvas id="taskCompletionChart"></canvas>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-2xl font-bold text-[#0F172A]">78%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Recent Activities</h3>
            <div class="mt-4 space-y-4">
                @foreach([
                    ['action' => 'New client added', 'detail' => 'Acme Corp', 'time' => '2 min ago'],
                    ['action' => 'Project completed', 'detail' => 'Website Redesign', 'time' => '1 hour ago'],
                    ['action' => 'Invoice paid', 'detail' => 'INV-0042 - $2,500', 'time' => '3 hours ago'],
                    ['action' => 'Task assigned', 'detail' => 'Design review to Sarah', 'time' => '5 hours ago'],
                    ['action' => 'New project started', 'detail' => 'Mobile App - TechStart', 'time' => 'Yesterday'],
                ] as $activity)
                    <div class="flex gap-3 py-2 border-b border-[#F1F5F9] dark:border-[#111827] last:border-0">
                        <div class="w-2 h-2 mt-2 rounded-full bg-[#4F46E5] shrink-0"></div>
                        <div>
                            <p class="text-sm font-medium text-[#0F172A] dark:text-[#E5E7EB]">{{ $activity['action'] }}</p>
                            <p class="text-xs text-[#64748B] dark:text-[#9CA3AF]">{{ $activity['detail'] }} · {{ $activity['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Upcoming & Overdue -->
        <div class="space-y-6">
            <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
                <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Upcoming Deadlines</h3>
                <div class="mt-4 space-y-3">
                    @foreach([
                        ['task' => 'Final design review', 'date' => 'Mar 8', 'project' => 'Website Redesign'],
                        ['task' => 'API integration', 'date' => 'Mar 10', 'project' => 'Mobile App'],
                        ['task' => 'Client presentation', 'date' => 'Mar 12', 'project' => 'Brand Identity'],
                    ] as $item)
                        <div class="flex items-center justify-between py-2 border-b border-[#F1F5F9] dark:border-[#111827] last:border-0">
                            <div>
                                <p class="text-sm font-medium text-[#0F172A] dark:text-[#E5E7EB]">{{ $item['task'] }}</p>
                                <p class="text-xs text-[#64748B] dark:text-[#9CA3AF]">{{ $item['project'] }}</p>
                            </div>
                            <span class="text-xs font-medium text-[#4F46E5] bg-[#EEF2FF] px-2 py-1 rounded">{{ $item['date'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm border-l-4 border-l-[#EF4444]">
                <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Overdue Invoices</h3>
                <div class="mt-4 space-y-2">
                    <p class="text-2xl font-bold text-[#EF4444]">3</p>
                    <p class="text-sm text-[#64748B]">Total: $4,200</p>
                    <a href="{{ route('invoices.index') }}" class="inline-block mt-2 text-sm font-medium text-[#4F46E5] hover:underline">View all →</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                backgroundColor: 'rgba(79, 70, 229, 0.8)',
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, max: 100, grid: { color: '#F1F5F9' } },
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
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { color: '#F1F5F9' } },
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
                backgroundColor: ['#4F46E5', '#E2E8F0'],
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
