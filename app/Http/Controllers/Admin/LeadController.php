<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderByDesc('created_at')->limit(100)->get();
        return view('admin.leads.index', compact('leads'));
    }

    public function export(Request $request)
    {
        $leads = Lead::orderByDesc('created_at')->get();

        $filename = 'leads_export_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($leads) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, [
                'ID',
                'Name',
                'Phone',
                'Email',
                'Business Type',
                'Subject',
                'Message',
                'Address',
                'Source',
                'Status',
                'Created At'
            ]);

            // Add data rows
            foreach ($leads as $lead) {
                fputcsv($file, [
                    $lead->id,
                    $lead->name,
                    $lead->phone,
                    $lead->email,
                    $lead->business_type,
                    $lead->subject,
                    $lead->message,
                    $lead->address,
                    $lead->source,
                    $lead->status,
                    $lead->created_at?->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
