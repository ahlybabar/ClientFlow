@extends('layouts.portal')

@section('title', 'Client Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-[#0F172A] sm:text-3xl sm:truncate">Welcome back, John 👋</h2>
            <p class="mt-1 text-sm text-[#64748B]">Here is an overview of your projects with Acme Agency.</p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#4F7CFF] hover:bg-[#4338CA] focus:outline-none">
                Contact Account Manager
            </button>
        </div>
    </div>

    {{-- Stats Row --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-[#E2E8F0]">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#EEF2FF] rounded-md p-3">
                        <svg class="h-6 w-6 text-[#4F7CFF]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-[#64748B] truncate">Active Projects</dt>
                            <dd class="flex items-baseline"><div class="text-2xl font-semibold text-[#0F172A]">2</div></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-[#F8FAFC] px-5 py-3 border-t border-[#E2E8F0]">
                <div class="text-sm"><a href="{{ route('portal.projects') }}" class="font-medium text-[#4F7CFF] hover:text-[#4338CA]">View all projects</a></div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-[#E2E8F0] border-l-4 border-l-[#F59E0B]">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#FEF3C7] rounded-md p-3">
                        <svg class="h-6 w-6 text-[#F59E0B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-[#64748B] truncate">Action Required</dt>
                            <dd class="flex items-baseline"><div class="text-2xl font-semibold text-[#0F172A]">1</div></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-[#F8FAFC] px-5 py-3 border-t border-[#E2E8F0]">
                <div class="text-sm"><a href="#" class="font-medium text-[#F59E0B] hover:text-[#D97706]">Review outstanding items</a></div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-[#E2E8F0]">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-[#ECFDF5] rounded-md p-3">
                        <svg class="h-6 w-6 text-[#22C55E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-[#64748B] truncate">Outstanding Balance</dt>
                            <dd class="flex items-baseline"><div class="text-2xl font-semibold text-[#0F172A]">$0.00</div></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-[#F8FAFC] px-5 py-3 border-t border-[#E2E8F0]">
                <div class="text-sm"><a href="{{ route('portal.invoices') }}" class="font-medium text-[#4F7CFF] hover:text-[#4338CA]">View billing history</a></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Active Projects Summary --}}
        <div class="lg:col-span-2 space-y-6">
            <h3 class="text-lg leading-6 font-medium text-[#0F172A]">Project Progress</h3>
            
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-md border border-[#E2E8F0]">
                <ul class="divide-y divide-[#E2E8F0]">
                    <li>
                        <a href="{{ route('portal.projects') }}" class="block hover:bg-[#F8FAFC] transition duration-150 ease-in-out">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-[#4F7CFF] truncate">Website Redesign (Phase 2)</p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#ECFDF5] text-[#22C55E]">On Track</p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-[#64748B]">
                                            <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            Deliverable: Mar 15, 2025
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-[#64748B] sm:mt-0">
                                        <p>75% complete</p>
                                    </div>
                                </div>
                                <div class="mt-4 relative pt-1">
                                    <div class="overflow-hidden h-2 text-xs flex rounded-full bg-[#E2E8F0]">
                                        <div style="width: 75%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-[#4F7CFF]"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portal.projects') }}" class="block hover:bg-[#F8FAFC] transition duration-150 ease-in-out">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-[#4F7CFF] truncate">Brand Identity Guide</p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#EEF2FF] text-[#4F7CFF]">In Review</p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-[#64748B]">
                                            <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            Deliverable: Feb 28, 2025
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-[#64748B] sm:mt-0">
                                        <p>Action needed: Design sign-off</p>
                                    </div>
                                </div>
                                <div class="mt-4 relative pt-1">
                                    <div class="overflow-hidden h-2 text-xs flex rounded-full bg-[#E2E8F0]">
                                        <div style="width: 95%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-[#4F7CFF]"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Recent Activity & Invoices --}}
        <div class="space-y-6">
            <h3 class="text-lg leading-6 font-medium text-[#0F172A]">Recent Activity</h3>
            
            <div class="bg-white shadow-sm rounded-lg border border-[#E2E8F0] p-4">
                <div class="flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-[#E2E8F0]" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-[#ECFDF5] flex items-center justify-center ring-8 ring-white">
                                            <svg class="h-5 w-5 text-[#22C55E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-[#64748B]">You paid invoice <a href="#" class="font-medium text-[#0F172A]">INV-0042</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-[#64748B]">
                                            <time datetime="2020-09-20">2d ago</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-[#E2E8F0]" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-[#EEF2FF] flex items-center justify-center ring-8 ring-white">
                                            <svg class="h-5 w-5 text-[#4F7CFF]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-[#64748B]">Agency uploaded <a href="#" class="font-medium text-[#0F172A]">design-mockups-v2.pdf</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-[#64748B]">
                                            <time datetime="2020-09-22">3d ago</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-4">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-[#F1F5F9] flex items-center justify-center ring-8 ring-white">
                                            <svg class="h-5 w-5 text-[#64748B]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-[#64748B]">You commented on <a href="#" class="font-medium text-[#0F172A]">Brand Identity Guide</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-[#64748B]">
                                            <time datetime="2020-09-24">1w ago</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
