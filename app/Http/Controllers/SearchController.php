<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Mock data representing the system
        $data = [
            'clients' => [
                ['id' => 1, 'type' => 'client', 'label' => 'Acme Corp', 'subtitle' => 'John Smith · john@acme.com', 'url' => '/clients/1', 'status' => 'active', 'tags' => ['enterprise', 'vip']],
                ['id' => 2, 'type' => 'client', 'label' => 'TechStart Inc', 'subtitle' => 'Sarah Johnson · sarah@techstart.io', 'url' => '/clients/2', 'status' => 'active', 'tags' => []],
                ['id' => 3, 'type' => 'client', 'label' => 'Global Solutions', 'subtitle' => 'Mike Chen · mike@globalsol.com', 'url' => '/clients/3', 'status' => 'active', 'tags' => ['enterprise']],
                ['id' => 4, 'type' => 'client', 'label' => 'Design Studio', 'subtitle' => 'Emma Wilson · emma@designstudio.co', 'url' => '/clients/4', 'status' => 'inactive', 'tags' => []],
                ['id' => 5, 'type' => 'client', 'label' => 'Innovate Labs', 'subtitle' => 'David Brown · david@innovatelabs.com', 'url' => '/clients/5', 'status' => 'active', 'tags' => ['long-term']],
                ['id' => 6, 'type' => 'client', 'label' => 'CloudBridge', 'subtitle' => 'Chris Lee · chris@cloudbridge.io', 'url' => '/clients/6', 'status' => 'active', 'tags' => []],
                ['id' => 7, 'type' => 'client', 'label' => 'PixelWave', 'subtitle' => 'Mia Torres · mia@pixelwave.co', 'url' => '/clients/7', 'status' => 'inactive', 'tags' => ['high-risk']],
            ],
            'projects' => [
                ['id' => 1, 'type' => 'project', 'label' => 'Website Redesign', 'subtitle' => 'Acme Corp · 75% complete', 'url' => '/projects/1', 'status' => 'in-progress', 'priority' => 'high', 'health' => 'healthy'],
                ['id' => 2, 'type' => 'project', 'label' => 'Mobile App', 'subtitle' => 'TechStart Inc · 62% complete', 'url' => '/projects/2', 'status' => 'in-progress', 'priority' => 'high', 'health' => 'at-risk'],
                ['id' => 3, 'type' => 'project', 'label' => 'Brand Identity', 'subtitle' => 'Acme Corp · 90% complete', 'url' => '/projects/3', 'status' => 'in-progress', 'priority' => 'medium', 'health' => 'healthy'],
                ['id' => 4, 'type' => 'project', 'label' => 'E-commerce Platform', 'subtitle' => 'Global Solutions · 45% complete', 'url' => '/projects/4', 'status' => 'in-progress', 'priority' => 'critical', 'health' => 'critical'],
                ['id' => 5, 'type' => 'project', 'label' => 'Dashboard Redesign', 'subtitle' => 'Innovate Labs · 78% complete', 'url' => '/projects/5', 'status' => 'in-progress', 'priority' => 'medium', 'health' => 'healthy'],
            ],
            'tasks' => [
                ['id' => 1, 'type' => 'task', 'label' => 'Design homepage mockup', 'subtitle' => 'Website Redesign · High Priority', 'url' => '/tasks', 'status' => 'todo', 'priority' => 'high'],
                ['id' => 2, 'type' => 'task', 'label' => 'Set up dev environment', 'subtitle' => 'Website Redesign · Medium Priority', 'url' => '/tasks', 'status' => 'todo', 'priority' => 'medium'],
                ['id' => 3, 'type' => 'task', 'label' => 'Implement header component', 'subtitle' => 'Website Redesign · High Priority', 'url' => '/tasks', 'status' => 'in-progress', 'priority' => 'high'],
                ['id' => 4, 'type' => 'task', 'label' => 'Build contact form', 'subtitle' => 'Website Redesign · Medium Priority', 'url' => '/tasks', 'status' => 'in-progress', 'priority' => 'medium'],
                ['id' => 5, 'type' => 'task', 'label' => 'Final design review', 'subtitle' => 'Website Redesign · Critical', 'url' => '/tasks', 'status' => 'overdue', 'priority' => 'critical'],
                ['id' => 6, 'type' => 'task', 'label' => 'Accessibility audit', 'subtitle' => 'Mobile App · High Priority', 'url' => '/tasks', 'status' => 'overdue', 'priority' => 'high'],
                ['id' => 7, 'type' => 'task', 'label' => 'API integration', 'subtitle' => 'Mobile App · High Priority', 'url' => '/tasks', 'status' => 'overdue', 'priority' => 'high'],
                ['id' => 8, 'type' => 'task', 'label' => 'Performance optimization', 'subtitle' => 'E-commerce · Medium Priority', 'url' => '/tasks', 'status' => 'todo', 'priority' => 'medium'],
            ],
            'invoices' => [
                ['id' => 1, 'type' => 'invoice', 'label' => 'INV-0042', 'subtitle' => 'Acme Corp · $2,500', 'url' => '/invoices/1', 'status' => 'paid'],
                ['id' => 2, 'type' => 'invoice', 'label' => 'INV-0041', 'subtitle' => 'Acme Corp · $1,800', 'url' => '/invoices/2', 'status' => 'unpaid'],
                ['id' => 3, 'type' => 'invoice', 'label' => 'INV-0040', 'subtitle' => 'TechStart Inc · $3,200', 'url' => '/invoices/3', 'status' => 'paid'],
                ['id' => 4, 'type' => 'invoice', 'label' => 'INV-0039', 'subtitle' => 'Global Solutions · $1,400', 'url' => '/invoices/4', 'status' => 'overdue'],
                ['id' => 5, 'type' => 'invoice', 'label' => 'INV-0038', 'subtitle' => 'Innovate Labs · $4,500', 'url' => '/invoices/5', 'status' => 'overdue'],
                ['id' => 6, 'type' => 'invoice', 'label' => 'INV-0037', 'subtitle' => 'Design Studio · $2,100', 'url' => '/invoices/6', 'status' => 'unpaid'],
            ],
            'team' => [
                ['id' => 1, 'type' => 'team', 'label' => 'John Doe', 'subtitle' => 'Project Lead · Administrator', 'url' => '/team', 'status' => 'active'],
                ['id' => 2, 'type' => 'team', 'label' => 'Sarah Kim', 'subtitle' => 'UI/UX Designer', 'url' => '/team', 'status' => 'active'],
                ['id' => 3, 'type' => 'team', 'label' => 'Mike Wilson', 'subtitle' => 'Full-Stack Developer', 'url' => '/team', 'status' => 'active'],
                ['id' => 4, 'type' => 'team', 'label' => 'Alex Brown', 'subtitle' => 'Backend Developer', 'url' => '/team', 'status' => 'active'],
                ['id' => 5, 'type' => 'team', 'label' => 'Emily Davis', 'subtitle' => 'QA Engineer', 'url' => '/team', 'status' => 'away'],
            ],
            'files' => [
                ['id' => 1, 'type' => 'file', 'label' => 'wireframes-v2.pdf', 'subtitle' => 'Website Redesign · 2.4 MB', 'url' => '/projects/1', 'status' => ''],
                ['id' => 2, 'type' => 'file', 'label' => 'design-mockups.zip', 'subtitle' => 'Website Redesign · 8.1 MB', 'url' => '/projects/1', 'status' => ''],
                ['id' => 3, 'type' => 'file', 'label' => 'content-brief.docx', 'subtitle' => 'Brand Identity · 124 KB', 'url' => '/projects/3', 'status' => ''],
            ],
            'notes' => [
                ['id' => 1, 'type' => 'note', 'label' => 'Weekly check-in with Acme Corp', 'subtitle' => 'Client note · Key decision maker info', 'url' => '/clients/1', 'status' => ''],
                ['id' => 2, 'type' => 'note', 'label' => 'Design review meeting notes', 'subtitle' => 'Project note · Feb 20', 'url' => '/projects/1', 'status' => ''],
            ]
        ];

        $q = strtolower(trim($request->input('q', '')));

        if (empty($q)) {
            return response()->json($data);
        }

        // Apply simplistic filtering based on query string across all types
        $results = [];
        foreach ($data as $category => $items) {
            $filteredItems = array_values(array_filter($items, function($item) use ($q) {
                // Return true if label or subtitle matches $q
                $labelMatch = strpos(strtolower($item['label'] ?? ''), $q) !== false;
                $subMatch = strpos(strtolower($item['subtitle'] ?? ''), $q) !== false;
                $statusMatch = strpos(strtolower($item['status'] ?? ''), $q) !== false;
                $healthMatch = strpos(strtolower($item['health'] ?? ''), $q) !== false;
                $priorityMatch = strpos(strtolower($item['priority'] ?? ''), $q) !== false;
                return $labelMatch || $subMatch || $statusMatch || $healthMatch || $priorityMatch;
            }));
            
            // Limit to top 10 per category as requested
            $results[$category] = array_slice($filteredItems, 0, 10);
        }

        return response()->json($results);
    }
}
