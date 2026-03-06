@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A]">Projects</h1>
            <p class="mt-1 text-sm text-[#64748B]">Track and manage all your client projects</p>
        </div>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:bg-[#4338CA] font-medium text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Project
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach([
            ['name' => 'Website Redesign', 'client' => 'Acme Corp', 'team' => ['JD', 'SK', 'MW'], 'status' => 'In Progress', 'deadline' => 'Mar 15', 'progress' => 75],
            ['name' => 'Mobile App', 'client' => 'TechStart Inc', 'team' => ['JD', 'AB'], 'status' => 'In Progress', 'deadline' => 'Apr 20', 'progress' => 45],
            ['name' => 'Brand Identity', 'client' => 'Acme Corp', 'team' => ['SK'], 'status' => 'Completed', 'deadline' => 'Feb 28', 'progress' => 100],
            ['name' => 'E-commerce Platform', 'client' => 'Global Solutions', 'team' => ['JD', 'SK', 'MW', 'AB'], 'status' => 'Planning', 'deadline' => 'May 10', 'progress' => 10],
            ['name' => 'Dashboard UI', 'client' => 'Innovate Labs', 'team' => ['MW'], 'status' => 'In Progress', 'deadline' => 'Mar 25', 'progress' => 60],
            ['name' => 'API Integration', 'client' => 'TechStart Inc', 'team' => ['AB'], 'status' => 'Review', 'deadline' => 'Mar 12', 'progress' => 90],
        ] as $project)
        <a href="{{ route('projects.show', 1) }}" class="block bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm hover:shadow-md hover:border-[#4F46E5]/30 transition-all group">
            <div class="flex items-start justify-between mb-4">
                <h3 class="font-semibold text-[#0F172A] group-hover:text-[#4F46E5] transition-colors">{{ $project['name'] }}</h3>
                <span class="text-xs font-medium px-2.5 py-1 rounded-full {{ 
                    $project['status'] === 'Completed' ? 'bg-[#ECFDF5] text-[#22C55E]' : 
                    ($project['status'] === 'In Progress' ? 'bg-[#EEF2FF] text-[#4F46E5]' : 
                    ($project['status'] === 'Review' ? 'bg-[#FEF3C7] text-[#F59E0B]' : 'bg-[#F1F5F9] text-[#64748B]')) 
                }}">{{ $project['status'] }}</span>
            </div>
            <p class="text-sm text-[#64748B] mb-3">{{ $project['client'] }}</p>
            <div class="flex -space-x-2 mb-4">
                @foreach($project['team'] as $member)
                <div class="w-8 h-8 rounded-full bg-[#4F46E5] border-2 border-white flex items-center justify-center text-white text-xs font-medium">{{ $member }}</div>
                @endforeach
            </div>
            <div class="flex items-center justify-between text-sm text-[#64748B] mb-2">
                <span>Due {{ $project['deadline'] }}</span>
                <span class="font-medium text-[#0F172A]">{{ $project['progress'] }}%</span>
            </div>
            <div class="h-2 bg-[#E2E8F0] rounded-full overflow-hidden">
                <div class="h-full bg-[#4F46E5] rounded-full transition-all" style="width: {{ $project['progress'] }}%"></div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
