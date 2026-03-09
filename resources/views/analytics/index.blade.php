@extends('layouts.app')

@section('title', 'Analytics')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--color-text)]">Analytics & Intelligence</h1>
            <p class="mt-1 text-sm text-[var(--color-text-secondary)]">Business intelligence metrics and performance insights</p>
        </div>
        {{-- Filters --}}
        <div class="flex flex-wrap gap-2" x-data="{ dateRange: '12m' }">
            <select class="px-3 py-2 border border-[var(--color-border)] bg-[var(--color-card)] rounded-lg text-sm text-[var(--color-text)] focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent custom-select" x-model="dateRange">
                <option value="7d">Last 7 days</option>
                <option value="30d">Last 30 days</option>
                <option value="90d">Last 90 days</option>
                <option value="12m" selected>Last 12 months</option>
            </select>
            <button class="px-4 py-2 bg-[#4F46E5] text-white rounded-lg text-sm font-medium hover:opacity-90 transition-opacity inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export
            </button>
        </div>
    </div>

    {{-- Financial Metrics --}}
    <div>
        <h2 class="text-lg font-semibold text-[var(--color-text)] mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-[#4F46E5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Financial Metrics
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach([
                ['label' => 'MRR', 'value' => '$24,500', 'trend' => '+18%', 'trendType' => 'positive', 'subtitle' => 'Monthly Recurring Revenue', 'icon' => '💰'],
                ['label' => 'Avg Invoice', 'value' => '$2,680', 'trend' => '+8%', 'trendType' => 'positive', 'subtitle' => 'Average Invoice Value', 'icon' => '📄'],
                ['label' => 'Revenue/Client', 'value' => '$4,200', 'trend' => '+12%', 'trendType' => 'positive', 'subtitle' => 'Per Active Client', 'icon' => '👤'],
                ['label' => 'Client LTV', 'value' => '$18,400', 'trend' => '+22%', 'trendType' => 'positive', 'subtitle' => 'Lifetime Value', 'icon' => '⭐'],
                ['label' => 'Payment Delay', 'value' => '4.2 days', 'trend' => '-15%', 'trendType' => 'positive', 'subtitle' => 'Avg Days Late', 'icon' => '⏱️'],
            ] as $metric)
            <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-2xl">{{ $metric['icon'] }}</span>
                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $metric['trendType'] === 'positive' ? 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]' : 'bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]' }}">{{ $metric['trend'] }}</span>
                </div>
                <p class="text-2xl font-bold text-[var(--color-text)]">{{ $metric['value'] }}</p>
                <p class="text-[11px] text-[var(--color-text-secondary)] mt-1">{{ $metric['subtitle'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Operational Metrics --}}
    <div>
        <h2 class="text-lg font-semibold text-[var(--color-text)] mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Operational Metrics
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach([
                ['label' => 'Task Velocity', 'value' => '42/week', 'trend' => '+15%', 'trendType' => 'positive', 'subtitle' => 'Tasks completed per week', 'progress' => 78, 'color' => 'bg-[#4F46E5]'],
                ['label' => 'Delivery Time', 'value' => '18 days', 'trend' => '-8%', 'trendType' => 'positive', 'subtitle' => 'Avg project delivery', 'progress' => 65, 'color' => 'bg-[#22C55E]'],
                ['label' => 'Utilization', 'value' => '84%', 'trend' => '+5%', 'trendType' => 'positive', 'subtitle' => 'Team utilization rate', 'progress' => 84, 'color' => 'bg-[#F59E0B]'],
                ['label' => 'Acquisition', 'value' => '6/month', 'trend' => '+20%', 'trendType' => 'positive', 'subtitle' => 'New clients per month', 'progress' => 72, 'color' => 'bg-[#8B5CF6]'],
            ] as $metric)
            <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-medium text-[var(--color-text-secondary)]">{{ $metric['label'] }}</p>
                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $metric['trendType'] === 'positive' ? 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]' : 'bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]' }}">{{ $metric['trend'] }}</span>
                </div>
                <p class="text-2xl font-bold text-[var(--color-text)] mb-1">{{ $metric['value'] }}</p>
                <p class="text-[11px] text-[var(--color-text-secondary)] mb-3">{{ $metric['subtitle'] }}</p>
                <div class="h-1.5 bg-[var(--color-border)] rounded-full overflow-hidden">
                    <div class="h-full {{ $metric['color'] }} rounded-full progress-animated" style="width: {{ $metric['progress'] }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Charts Row 1 --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Revenue Trends --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <h3 class="text-lg font-semibold text-[var(--color-text)]">Revenue Trends</h3>
            <p class="text-sm text-[var(--color-text-secondary)] mt-1">Last 12 months</p>
            <div class="mt-6 h-72 chart-container">
                <canvas id="revenueTrendsChart"></canvas>
            </div>
        </div>

        {{-- Revenue Forecast --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <div class="flex items-center justify-between mb-1">
                <h3 class="text-lg font-semibold text-[var(--color-text)]">Revenue Forecast</h3>
                <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-[#EEF2FF] text-[#4F46E5] dark:bg-[var(--color-active-bg)]">AI Predicted</span>
            </div>
            <p class="text-sm text-[var(--color-text-secondary)]">Next 6 months projection</p>
            <div class="mt-6 h-72 chart-container">
                <canvas id="revenueForecastChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Charts Row 2 --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Client Growth --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <h3 class="text-lg font-semibold text-[var(--color-text)]">Client Growth</h3>
            <p class="text-sm text-[var(--color-text-secondary)] mt-1">New clients per month</p>
            <div class="mt-6 h-72 chart-container">
                <canvas id="clientGrowthChart"></canvas>
            </div>
        </div>

        {{-- Task Productivity --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <h3 class="text-lg font-semibold text-[var(--color-text)]">Task Productivity</h3>
            <p class="text-sm text-[var(--color-text-secondary)] mt-1">Tasks completed per week</p>
            <div class="mt-6 h-64 chart-container">
                <canvas id="taskProductivityChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Charts Row 3 --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Project Completion --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <h3 class="text-lg font-semibold text-[var(--color-text)]">Project Status</h3>
            <div class="mt-6 h-64 flex items-center justify-center chart-container">
                <canvas id="projectCompletionChart" class="max-w-[220px]"></canvas>
            </div>
        </div>

        {{-- Revenue by Client --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <h3 class="text-lg font-semibold text-[var(--color-text)]">Revenue by Client</h3>
            <div class="mt-6 h-64 flex items-center justify-center chart-container">
                <canvas id="revenueByClientChart" class="max-w-[220px]"></canvas>
            </div>
        </div>

        {{-- Team Utilization --}}
        <div class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm">
            <h3 class="text-lg font-semibold text-[var(--color-text)]">Team Utilization</h3>
            <div class="mt-6 h-64 chart-container">
                <canvas id="teamUtilChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Trends
    new Chart(document.getElementById('revenueTrendsChart'), {
        type: 'line',
        data: {
            labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Revenue',
                data: [15200, 16800, 17500, 18200, 19500, 21200, 19800, 22400, 23100, 23800, 24200, 24500],
                borderColor: '#6366F1',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#6366F1',
                pointRadius: 3,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { color: '#F1F5F9' }, ticks: { callback: v => '$' + (v/1000) + 'K' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Revenue Forecast
    new Chart(document.getElementById('revenueForecastChart'), {
        type: 'line',
        data: {
            labels: ['Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            datasets: [{
                label: 'Actual',
                data: [24500, null, null, null, null, null, null],
                borderColor: '#6366F1',
                backgroundColor: 'transparent',
                pointBackgroundColor: '#6366F1',
                pointRadius: 5,
                borderWidth: 2,
            }, {
                label: 'Forecast',
                data: [24500, 25800, 27200, 28100, 29500, 30800, 32400],
                borderColor: '#22C55E',
                backgroundColor: 'rgba(34, 197, 94, 0.08)',
                borderDash: [8, 4],
                fill: true,
                tension: 0.4,
                pointRadius: 3,
                pointBackgroundColor: '#22C55E',
            }, {
                label: 'Upper Bound',
                data: [24500, 27200, 29500, 31200, 33000, 35200, 37500],
                borderColor: 'transparent',
                backgroundColor: 'rgba(34, 197, 94, 0.04)',
                fill: '+1',
                tension: 0.4,
                pointRadius: 0,
            }, {
                label: 'Lower Bound',
                data: [24500, 24200, 25000, 25500, 26200, 27000, 28000],
                borderColor: 'transparent',
                backgroundColor: 'rgba(34, 197, 94, 0.04)',
                fill: false,
                tension: 0.4,
                pointRadius: 0,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 16, filter: item => item.text !== 'Upper Bound' && item.text !== 'Lower Bound' } }
            },
            scales: {
                y: { grid: { color: '#F1F5F9' }, ticks: { callback: v => '$' + (v/1000) + 'K' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Client Growth
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

    // Task Productivity
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

    // Project Completion Doughnut
    new Chart(document.getElementById('projectCompletionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'In Progress', 'On Hold'],
            datasets: [{
                data: [68, 28, 4],
                backgroundColor: ['#22C55E', '#6366F1', '#F59E0B'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 12 } } }
        }
    });

    // Revenue by Client
    new Chart(document.getElementById('revenueByClientChart'), {
        type: 'doughnut',
        data: {
            labels: ['Acme Corp', 'TechStart', 'Global Sol.', 'Innovate Labs', 'Others'],
            datasets: [{
                data: [8200, 5400, 3800, 4500, 2600],
                backgroundColor: ['#6366F1', '#22C55E', '#F59E0B', '#8B5CF6', '#94A3B8'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 12 } } }
        }
    });

    // Team Utilization
    new Chart(document.getElementById('teamUtilChart'), {
        type: 'bar',
        data: {
            labels: ['John D.', 'Sarah K.', 'Mike W.', 'Alex B.', 'Emily D.'],
            datasets: [{
                label: 'Utilization %',
                data: [92, 78, 88, 65, 70],
                backgroundColor: function(ctx) {
                    const v = ctx.raw;
                    return v >= 85 ? 'rgba(239, 68, 68, 0.8)' : v >= 70 ? 'rgba(79, 70, 229, 0.8)' : 'rgba(34, 197, 94, 0.8)';
                },
                borderRadius: 8,
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, max: 100, grid: { color: '#F1F5F9' } },
                y: { grid: { display: false } }
            }
        }
    });
});
</script>
@endpush
@endsection
