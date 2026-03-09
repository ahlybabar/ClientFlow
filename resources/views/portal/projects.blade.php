@extends('layouts.portal')

@section('title', 'My Projects')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-[#0F172A] sm:text-3xl sm:truncate">Projects</h2>
            <p class="mt-1 text-sm text-[#64748B]">Track the progress of all your active and completed work.</p>
        </div>
    </div>

    <!-- Active Projects -->
    <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg border border-[#E2E8F0]">
        <div class="px-4 py-5 border-b border-[#E2E8F0] sm:px-6 flex items-center justify-between">
            <h3 class="text-lg leading-6 font-medium text-[#0F172A]">Active Projects</h3>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#EEF2FF] text-[#4F46E5]">{{ count([1,2]) }} Active</span>
        </div>
        <ul class="divide-y divide-[#E2E8F0]">
            @foreach([
                ['name' => 'Website Redesign', 'phase' => 'Phase 2: Development', 'status' => 'On Track', 'statusColor' => 'bg-[#ECFDF5] text-[#22C55E]', 'progress' => 75, 'deadline' => 'Mar 15, 2025', 'lastUpdate' => '2 days ago', 'team' => ['JS', 'AK']],
                ['name' => 'Brand Identity Guide', 'phase' => 'Final Review', 'status' => 'In Review', 'statusColor' => 'bg-[#EEF2FF] text-[#4F46E5]', 'progress' => 95, 'deadline' => 'Feb 28, 2025', 'lastUpdate' => '1 week ago', 'team' => ['MB']],
            ] as $project)
            <li>
                <a href="#" class="block hover:bg-[#F8FAFC] transition duration-150 ease-in-out">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-[#0F172A] truncate">{{ $project['name'] }}</p>
                            <div class="ml-2 flex-shrink-0 flex">
                                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project['statusColor'] }}">{{ $project['status'] }}</p>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <p class="flex items-center text-sm text-[#4F46E5] font-medium">
                                    {{ $project['phase'] }}
                                </p>
                            </div>
                            <div class="mt-2 flex items-center text-sm text-[#64748B] sm:mt-0">
                                <p>Last updated {{ $project['lastUpdate'] }}</p>
                            </div>
                        </div>
                        <div class="mt-4 sm:flex sm:justify-between sm:items-end">
                            <div class="w-full sm:max-w-xs">
                                <div class="flex items-center justify-between text-xs text-[#64748B] mb-1">
                                    <span>Progress</span>
                                    <span class="font-medium text-[#0F172A]">{{ $project['progress'] }}%</span>
                                </div>
                                <div class="relative pt-1">
                                    <div class="overflow-hidden h-2 text-xs flex rounded-full bg-[#E2E8F0]">
                                        <div style="width: {{ $project['progress'] }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center {{ $project['progress'] === 100 ? 'bg-[#22C55E]' : 'bg-[#4F46E5]' }}"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 flex items-center justify-between sm:w-auto w-full gap-4">
                                <div class="flex -space-x-2">
                                    @foreach($project['team'] as $member)
                                    <div class="w-8 h-8 rounded-full bg-white border border-[#E2E8F0] shadow-sm flex items-center justify-center text-xs font-medium text-[#64748B]">{{ $member }}</div>
                                    @endforeach
                                </div>
                                <p class="flex items-center text-sm text-[#64748B]">
                                    <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    Due {{ $project['deadline'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Completed Projects -->
    <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg border border-[#E2E8F0]">
        <div class="px-4 py-5 border-b border-[#E2E8F0] sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-[#0F172A]">Completed Projects</h3>
        </div>
        <ul class="divide-y divide-[#E2E8F0]">
            @foreach([
                ['name' => 'Logo Design', 'completedDate' => 'Jan 15, 2025', 'manager' => 'Sarah K.'],
                ['name' => 'Q4 Marketing Campaign', 'completedDate' => 'Dec 20, 2024', 'manager' => 'John D.'],
            ] as $project)
            <li>
                <div class="px-4 py-4 sm:px-6 hover:bg-[#F8FAFC] transition duration-150 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-[#0F172A]">{{ $project['name'] }}</p>
                        <p class="text-xs text-[#64748B] mt-1">Completed on {{ $project['completedDate'] }} • Managed by {{ $project['manager'] }}</p>
                    </div>
                    <button class="text-sm font-medium text-[#4F46E5] hover:text-[#4338CA]">View files</button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
