@extends('layouts.app')

@section('title', 'Payments')

@section('content')
<div class="space-y-6">
    <div class="mb-4">
        <h1 class="text-[28px] font-bold text-[#0F172A]">Payments</h1>
        <p class="mt-1 text-sm text-[#64748B] mb-4">Track payment history and revenue</p>
    </div>

    {{-- Financial Overview Panel --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-metric-card 
            label="Total Revenue" 
            value="$124,500" 
            trend="+18%" 
            trendType="positive" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />' 
            color="success" 
        />
        <x-metric-card 
            label="Outstanding Invoices" 
            value="$4,200" 
            trend="3 unpaid" 
            trendType="neutral" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />' 
            color="warning" 
        />
        <x-metric-card 
            label="Paid This Month" 
            value="$24,500" 
            trend="12 payments" 
            trendType="neutral" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />' 
            color="primary" 
        />
        <x-metric-card 
            label="Failed Payments" 
            value="$850" 
            trend="2 failed" 
            trendType="negative" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />' 
            color="danger" 
        />
    </div>

    <!-- Charts replaced by analytics section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-[20px] font-semibold text-[#0F172A]">Payment Analytics</h3>
            <p class="text-[12px] text-[#64748B] mt-1">Cash flow and invoice status</p>
            <div class="mt-4 h-64">
                <canvas id="paymentRevenueChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm hover:shadow-md transition-shadow">
            <h3 class="text-[20px] font-semibold text-[#0F172A]">Payment Distribution</h3>
            <p class="text-[12px] text-[#64748B] mt-1">Volume by payment method</p>
            <div class="mt-4 h-64 flex items-center justify-center">
                <canvas id="paymentDistributionChart" class="max-w-[200px]"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-[#E2E8F0] shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="px-6 py-5 border-b border-[#E2E8F0]">
            <h3 class="text-[20px] font-semibold text-[#0F172A]">Payment History</h3>
            <p class="text-[12px] text-[#64748B] mt-1">Recent processed transactions</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#F8FAFC] border-b border-[#E2E8F0]">
                    <tr>
                        <th class="px-6 py-4 text-left text-[12px] font-semibold text-[#64748B] uppercase tracking-wider">Payment ID</th>
                        <th class="px-6 py-4 text-left text-[12px] font-semibold text-[#64748B] uppercase tracking-wider">Invoice ID</th>
                        <th class="px-6 py-4 text-left text-[12px] font-semibold text-[#64748B] uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-left text-[12px] font-semibold text-[#64748B] uppercase tracking-wider">Method</th>
                        <th class="px-6 py-4 text-left text-[12px] font-semibold text-[#64748B] uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E8F0]">
                    @foreach([
                        ['id' => 'PAY-0089', 'invoice' => 'INV-0042', 'amount' => '$2,500', 'method' => 'Bank Transfer', 'date' => 'Mar 10, 2025'],
                        ['id' => 'PAY-0088', 'invoice' => 'INV-0039', 'amount' => '$3,200', 'method' => 'Stripe', 'date' => 'Feb 28, 2025'],
                        ['id' => 'PAY-0087', 'invoice' => 'INV-0038', 'amount' => '$1,500', 'method' => 'PayPal', 'date' => 'Feb 20, 2025'],
                        ['id' => 'PAY-0086', 'invoice' => 'INV-0037', 'amount' => '$2,800', 'method' => 'Bank Transfer', 'date' => 'Feb 15, 2025'],
                        ['id' => 'PAY-0085', 'invoice' => 'INV-0036', 'amount' => '$4,100', 'method' => 'Stripe', 'date' => 'Feb 10, 2025'],
                    ] as $pay)
                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                        <td class="px-6 py-4 font-medium text-[#0F172A]">{{ $pay['id'] }}</td>
                        <td class="px-6 py-4 text-[14px] text-[#64748B]">{{ $pay['invoice'] }}</td>
                        <td class="px-6 py-4 font-medium text-[#22C55E]">{{ $pay['amount'] }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-[14px] text-[#64748B]">
                                @if($pay['method'] === 'Bank Transfer')<span class="w-2 h-2 rounded-full bg-[#4F46E5]"></span>
                                @elseif($pay['method'] === 'Stripe')<span class="w-2 h-2 rounded-full bg-[#22C55E]"></span>
                                @elseif($pay['method'] === 'PayPal')<span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                                @else<span class="w-2 h-2 rounded-full bg-[#64748B]"></span>@endif
                                {{ $pay['method'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-[14px] text-[#64748B]">{{ $pay['date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[#E2E8F0]">
            <p class="text-[13px] text-[#64748B]">Showing 1-5 of 89 payments</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Chart(document.getElementById('paymentRevenueChart'), {
        type: 'line',
        data: {
            labels: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Revenue',
                data: [18200, 19500, 21200, 19800, 22400, 23100, 24500],
                borderColor: window.chartColors.success,
                backgroundColor: 'rgba(34, 197, 94, 0.1)', // success light
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(226, 232, 240, 0.5)' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
    new Chart(document.getElementById('paymentDistributionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Bank Transfer', 'Stripe', 'PayPal', 'Cash'],
            datasets: [{
                data: [45, 35, 15, 5],
                backgroundColor: [window.chartColors.primary, window.chartColors.success, window.chartColors.warning, window.chartColors.neutral],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
});
</script>
@endpush
@endsection
