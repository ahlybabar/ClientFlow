{{-- Quick Create Modal: New Client, Project, Task, Invoice, Payment --}}
<template x-teleport="body">
<div x-show="quickCreateOpen" x-cloak
 x-transition
 class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50"
 @keydown.escape.window="quickCreateOpen = false"
 @click.self="quickCreateOpen = false">
 <div class="w-full max-w-lg max-h-[90vh] overflow-hidden bg-white rounded-xl shadow-2xl border border-[#E5E7EB] flex flex-col"
 @click.stop>
 <div class="flex items-center justify-between px-6 py-4 border-b border-[#E5E7EB]">
 <h2 class="text-lg font-semibold text-[#111827]">Quick Create</h2>
 <button @click="quickCreateOpen = false" class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#6B7280]">✕</button>
 </div>
 <div class="flex border-b border-[#E5E7EB] overflow-x-auto">
 <template x-for="tab in ['client','project','task','invoice','payment']" :key="tab">
 <button @click="quickCreateTab = tab"
 :class="quickCreateTab === tab ? 'border-[#4F7CFF] text-[#4F7CFF]' : 'border-transparent text-[#6B7280]'"
 class="px-4 py-3 text-sm font-medium border-b-2 capitalize whitespace-nowrap transition-colors">
 New <span x-text="tab"></span>
 </button>
 </template>
 </div>
 <div class="flex-1 overflow-y-auto p-6">
 {{-- New Client --}}
 <form x-show="quickCreateTab === 'client'" @submit.prevent="quickCreateSubmit()" class="space-y-4">
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Company Name *</label>
 <input type="text" required class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="Acme Inc">
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Contact Person</label>
 <input type="text" class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="John Smith">
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Email *</label>
 <input type="email" required class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="john@acme.com">
 </div>
 <button type="submit" class="w-full py-2.5 bg-[#4F7CFF] text-white rounded-lg font-medium hover:opacity-90 transition-opacity">Create Client</button>
 </form>
 {{-- New Project --}}
 <form x-show="quickCreateTab === 'project'" @submit.prevent="quickCreateSubmit()" class="space-y-4">
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Project Name *</label>
 <input type="text" required class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="Website Redesign">
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Client</label>
 <select class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 <option>Acme Corp</option>
 <option>TechStart Inc</option>
 </select>
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Due Date</label>
 <input type="date" class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 </div>
 <button type="submit" class="w-full py-2.5 bg-[#4F7CFF] text-white rounded-lg font-medium hover:opacity-90 transition-opacity">Create Project</button>
 </form>
 {{-- New Task --}}
 <form x-show="quickCreateTab === 'task'" @submit.prevent="quickCreateSubmit()" class="space-y-4">
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Task Name *</label>
 <input type="text" required class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="Design homepage mockup">
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Project</label>
 <select class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 <option>Website Redesign</option>
 <option>Mobile App</option>
 </select>
 </div>
 <div class="grid grid-cols-2 gap-4">
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Priority</label>
 <select class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 <option>Low</option><option>Medium</option><option selected>High</option><option>Critical</option>
 </select>
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Due Date</label>
 <input type="date" class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 </div>
 </div>
 <button type="submit" class="w-full py-2.5 bg-[#4F7CFF] text-white rounded-lg font-medium hover:opacity-90 transition-opacity">Create Task</button>
 </form>
 {{-- New Invoice --}}
 <form x-show="quickCreateTab === 'invoice'" @submit.prevent="quickCreateSubmit()" class="space-y-4">
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Client *</label>
 <select class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 <option>Acme Corp</option>
 <option>TechStart Inc</option>
 </select>
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Amount ($)</label>
 <input type="number" step="0.01" class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="2500.00">
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Due Date</label>
 <input type="date" class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 </div>
 <button type="submit" class="w-full py-2.5 bg-[#4F7CFF] text-white rounded-lg font-medium hover:opacity-90 transition-opacity">Create Invoice</button>
 </form>
 {{-- New Payment --}}
 <form x-show="quickCreateTab === 'payment'" @submit.prevent="quickCreateSubmit()" class="space-y-4">
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Invoice *</label>
 <select class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 <option>INV-0042 - Acme Corp - $2,500</option>
 <option>INV-0041 - TechStart - $1,800</option>
 </select>
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Amount ($)</label>
 <input type="number" step="0.01" class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent" placeholder="2500.00">
 </div>
 <div>
 <label class="block text-sm font-medium text-[#6B7280] mb-1">Method</label>
 <select class="w-full px-4 py-2 border border-[#E5E7EB] rounded-lg focus:ring-2 focus:ring-[#4F7CFF] focus:border-transparent">
 <option>Bank Transfer</option>
 <option>Stripe</option>
 <option>PayPal</option>
 <option>Cash</option>
 </select>
 </div>
 <button type="submit" class="w-full py-2.5 bg-[#4F7CFF] text-white rounded-lg font-medium hover:opacity-90 transition-opacity">Record Payment</button>
 </form>
 </div>
 </div>
</div>
</template>
