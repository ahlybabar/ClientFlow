@extends('layouts.app')

@section('title', 'Analytics')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A] dark:text-[#E5E7EB]">Analytics</h1>
            <p class="mt-1 text-sm text-[#64748B] dark:text-[#9CA3AF]">Insights and performance metrics</p>
        </div>
        {{-- Filters --}}
        <div class="flex flex-wrap gap-2" x-data="{ dateRange: '12m', teamMember: '', status: '' }">
            <select class="px-3 py-2 border border-[#E2E8F0] dark:border-[#111827] bg-white dark:bg-[#020617] rounded-lg text-sm text-[#0F172A] dark:text-[#E5E7EB] focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent" x-model="dateRange">
                <option value="7d">Last 7 days</option>
                <option value="30d">Last 30 days</option>
                <option value="90d">Last 90 days</option>
                <option value="12m" selected>Last 12 months</option>
            </select>
            <select class="px-3 py-2 border border-[#E2E8F0] dark:border-[#111827] bg-white dark:bg-[#020617] rounded-lg text-sm text-[#0F172A] dark:text-[#E5E7EB] focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent" x-model="teamMember">
                <option value="">All team members</option>
                <option value="1">John Doe</option>
                <option value="2">Sarah Kim</option>
                <option value="3">Mike Wilson</option>
            </select>
            <select class="px-3 py-2 border border-[#E2E8F0] dark:border-[#111827] bg-white dark:bg-[#020617] rounded-lg text-sm text-[#0F172A] dark:text-[#E5E7EB] focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent" x-model="status">
                <option value="">All statuses</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
                <option value="on_hold">On Hold</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Revenue Trends -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Revenue Trends</h3>
            <p class="text-sm text-[#64748B] dark:text-[#9CA3AF] mt-1">Last 12 months</p>
            <div class="mt-6 h-72">
                <canvas id="revenueTrendsChart"></canvas>
            </div>
        </div>

        <!-- Client Growth -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Client Growth</h3>
            <p class="text-sm text-[#64748B] dark:text-[#9CA3AF] mt-1">New clients per month</p>
            <div class="mt-6 h-72">
                <canvas id="clientGrowthChart"></canvas>
            </div>
        </div>

        <!-- Project Completion Rate -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Project Completion Rate</h3>
            <div class="mt-6 h-64 flex items-center justify-center">
                <canvas id="projectCompletionChart" class="max-w-[220px]"></canvas>
            </div>
        </div>

        <!-- Task Productivity -->
        <div class="bg-white dark:bg-[#0B1220] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Task Productivity</h3>
            <p class="text-sm text-[#64748B] dark:text-[#9CA3AF] mt-1">Tasks completed per week</p>
            <div class="mt-6 h-64">
                <canvas id="taskProductivityChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Chart(document.getElementById('revenueTrendsChart'), {
        type: 'line',
        data: {
            labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Revenue',
                data: [15200, 16800, 17500, 18200, 19500, 21200, 19800, 22400, 23100, 23800, 24200, 24500],
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
    new Chart(document.getElementById('clientGrowthChart'), {
        type: 'bar',
        data: {
            labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'New Clients',
                data: [4, 5, 3, 6, 5, 7, 4, 8, 6, 5, 7, 6],
                backgroundColor: 'rgba(79, 70, 229, 0.8)',
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#F1F5F9' } },
                x: { grid: { display: false } }
            }
        }
    });
    new Chart(document.getElementById('projectCompletionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'In Progress', 'On Hold'],
            datasets: [{
                data: [68, 28, 4],
                backgroundColor: ['#22C55E', '#4F46E5', '#F59E0B'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
    new Chart(document.getElementById('taskProductivityChart'), {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            datasets: [{
                label: 'Completed',
                data: [32, 45, 38, 52, 48],
                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#F1F5F9' } },
                x: { grid: { display: false } }
            }
        }
    });
});
</script>
@endpush
@endsection
