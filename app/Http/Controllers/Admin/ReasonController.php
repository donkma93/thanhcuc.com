<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reason;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    use HasMessagebox;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reasons = Reason::orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.reasons.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Set default sort order
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = Reason::max('sort_order') + 1;
        }

        // Handle checkbox
        $data['is_active'] = $request->has('is_active');

        Reason::create($data);

        return $this->successAndRedirect('Lý do đã được tạo thành công!', 'admin.reasons.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reason $reason)
    {
        return view('admin.reasons.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reason $reason)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Handle checkbox
        $data['is_active'] = $request->has('is_active');

        $reason->update($data);

        return $this->successAndRedirect('Lý do đã được cập nhật thành công!', 'admin.reasons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reason $reason)
    {
        $reason->delete();

        return $this->successAndRedirect('Lý do đã được xóa thành công!', 'admin.reasons.index');
    }

    /**
     * Update reasons order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:reasons,id',
            'items.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Reason::where('id', $item['id'])
                ->update(['sort_order' => $item['sort_order']]);
        }

        return $this->jsonSuccess('Thứ tự lý do đã được cập nhật!');
    }
}
