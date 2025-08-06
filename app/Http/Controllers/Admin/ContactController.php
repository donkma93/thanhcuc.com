<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use HasMessagebox;
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('program', 'like', "%{$search}%");
            });
        }

        $contacts = $query->latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,completed',
            'admin_notes' => 'nullable|string',
        ]);

        $data = ['status' => $request->status];
        
        if ($request->filled('admin_notes')) {
            $data['admin_notes'] = $request->admin_notes;
        }

        if ($request->status === 'contacted' && $contact->status === 'new') {
            $data['contacted_at'] = now();
        }

        $contact->update($data);

        return $this->successAndBack('Trạng thái liên hệ đã được cập nhật thành công!');
    }

    public function destroy(Contact $contact)
    {
        $contactName = $contact->name;
        $contact->delete();
        return $this->successAndBack('Đã xóa liên hệ từ "' . $contactName . '" thành công!');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,mark_contacted,mark_completed',
            'selected_contacts' => 'required|array|min:1',
            'selected_contacts.*' => 'exists:contacts,id',
        ]);

        $contacts = Contact::whereIn('id', $request->selected_contacts);

        switch ($request->action) {
            case 'delete':
                $contacts->delete();
                $message = 'Xóa các liên hệ đã chọn thành công!';
                break;
            case 'mark_contacted':
                $contacts->update([
                    'status' => 'contacted',
                    'contacted_at' => now(),
                ]);
                $message = 'Đánh dấu đã liên hệ thành công!';
                break;
            case 'mark_completed':
                $contacts->update(['status' => 'completed']);
                $message = 'Đánh dấu hoàn thành thành công!';
                break;
        }

        return $this->successAndBack($message);
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $contacts = $query->latest()->get();

        $filename = 'contacts_' . now()->format('Y_m_d_H_i_s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');
            
            // UTF-8 BOM for Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Header
            fputcsv($file, [
                'ID', 'Họ tên', 'Email', 'Điện thoại', 'Chương trình', 
                'Tin nhắn', 'Trạng thái', 'Ghi chú admin', 'Ngày tạo'
            ]);

            // Data
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->program,
                    $contact->message,
                    $contact->status,
                    $contact->admin_notes,
                    $contact->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
