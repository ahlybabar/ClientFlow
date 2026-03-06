@extends('layouts.app')

@section('title', 'Payments')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-[#0F172A]">Payments</h1>
        <p class="mt-1 text-sm text-[#64748B]">Track payment history and revenue</p>
    </div>

    {{-- Financial Overview Panel --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Total Revenue</p>
            <p class="text-2xl font-bold text-[#0F172A] mt-1">$124,500</p>
            <p class="text-xs text-[#22C55E] mt-1">+18% from last month</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Outstanding Invoices</p>
            <p class="text-2xl font-bold text-[#F59E0B] mt-1">$4,200</p>
            <p class="text-xs text-[#64748B] mt-1">3 unpaid</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Paid This Month</p>
            <p class="text-2xl font-bold text-[#22C55E] mt-1">$24,500</p>
            <p class="text-xs text-[#64748B] mt-1">12 payments</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A]">Monthly Revenue</h3>
            <p class="text-sm text-[#64748B] mt-1">Revenue growth indicator</p>
            <div class="mt-4 h-64">
                <canvas id="paymentRevenueChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
            <h3 class="text-lg font-semibold text-[#0F172A]">Payment Distribution</h3>
            <p class="text-sm text-[#64748B] mt-1">By method: Cash, Bank, Transfer, Stripe</p>
            <div class="mt-4 h-64 flex items-center justify-center">
                <canvas id="paymentDistributionChart" class="max-w-[200px]"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-[#E2E8F0] shadow-sm overflow-hidden">
        <h3 class="px-6 py-4 font-semibold text-[#0F172A] border-b border-[#E2E8F0]">Payment History</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#F8FAFC] border-b border-[#E2E8F0]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Payment ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Invoice ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Amount</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Method</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Date</th>
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
                        <td class="px-6 py-4 text-sm text-[#64748B]">{{ $pay['invoice'] }}</td>
                        <td class="px-6 py-4 font-medium text-[#22C55E]">{{ $pay['amount'] }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-sm text-[#64748B]">
                                @if($pay['method'] === 'Bank Transfer')<span class="w-2 h-2 rounded-full bg-[#4F46E5]"></span>
                                @elseif($pay['method'] === 'Stripe')<span class="w-2 h-2 rounded-full bg-[#22C55E]"></span>
                                @elseif($pay['method'] === 'PayPal')<span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                                @else<span class="w-2 h-2 rounded-full bg-[#64748B]"></span>@endif
                                {{ $pay['method'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#64748B]">{{ $pay['date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[#E2E8F0]">
            <p class="text-sm text-[#64748B]">Showing 1-5 of 89 payments</p>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Chart(document.getElementById('paymentRevenueChart'), {
        type: 'line',
        data: {
            labels: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Revenue',
                data: [18200, 19500, 21200, 19800, 22400, 23100, 24500],
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
    new Chart(document.getElementById('paymentDistributionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Bank Transfer', 'Stripe', 'PayPal', 'Cash'],
            datasets: [{
                data: [45, 35, 15, 5],
                backgroundColor: ['#4F46E5', '#22C55E', '#F59E0B', '#64748B'],
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
