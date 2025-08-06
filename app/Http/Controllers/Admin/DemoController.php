<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DemoController extends Controller
{
    use HasMessagebox;

    /**
     * Show messagebox demo page
     */
    public function messagebox()
    {
        return view('admin.demo.messagebox');
    }

    /**
     * Demo session-based messages
     */
    public function messageboxSession(Request $request)
    {
        $type = $request->get('type', 'success');
        
        $messages = [
            'success' => 'Đây là thông báo thành công từ session! Dữ liệu đã được lưu thành công.',
            'error' => 'Đây là thông báo lỗi từ session! Có lỗi xảy ra trong quá trình xử lý.',
            'warning' => 'Đây là thông báo cảnh báo từ session! Vui lòng kiểm tra lại thông tin.',
            'info' => 'Đây là thông báo thông tin từ session! Hệ thống đã ghi nhận yêu cầu của bạn.'
        ];

        $message = $messages[$type] ?? $messages['success'];

        switch ($type) {
            case 'success':
                return $this->successAndRedirect($message, 'admin.demo.messagebox');
            case 'error':
                return $this->errorAndRedirect($message, 'admin.demo.messagebox');
            case 'warning':
                return $this->warningAndRedirect($message, 'admin.demo.messagebox');
            case 'info':
                return $this->infoAndRedirect($message, 'admin.demo.messagebox');
            default:
                return $this->successAndRedirect($message, 'admin.demo.messagebox');
        }
    }

    /**
     * Demo AJAX responses
     */
    public function messageboxAjax(Request $request)
    {
        $type = $request->get('type', 'success');

        switch ($type) {
            case 'success':
                return $this->jsonSuccess('AJAX request thành công! Dữ liệu đã được xử lý.');
                
            case 'error':
                return $this->jsonError('AJAX request thất bại! Có lỗi xảy ra trên server.', [], 500);
                
            case 'validation':
                // Simulate validation error
                throw ValidationException::withMessages([
                    'name' => ['Trường tên là bắt buộc.'],
                    'email' => ['Email không đúng định dạng.'],
                    'phone' => ['Số điện thoại phải có ít nhất 10 số.']
                ]);
                
            default:
                return $this->jsonSuccess('AJAX request hoàn thành!');
        }
    }

    /**
     * Demo form submission
     */
    public function messageboxForm(Request $request)
    {
        // Validate the form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string|max:1000'
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'message.max' => 'Tin nhắn không được vượt quá 1000 ký tự.'
        ]);

        // If AJAX request
        if ($request->expectsJson()) {
            return $this->jsonSuccess(
                'Form đã được gửi thành công! Cảm ơn ' . $validated['name'] . ' đã liên hệ với chúng tôi.',
                ['data' => $validated]
            );
        }

        // Regular form submission
        return $this->successAndRedirect(
            'Form đã được gửi thành công! Cảm ơn ' . $validated['name'] . ' đã liên hệ với chúng tôi.',
            'admin.demo.messagebox'
        );
    }

    /**
     * Demo multiple message types
     */
    public function messageboxMultiple()
    {
        return $this->flashMessages([
            'success' => 'Thao tác thành công!',
            'warning' => 'Có một số cảnh báo cần lưu ý.',
            'info' => 'Thông tin bổ sung cho bạn.'
        ]);
    }

    /**
     * Demo validation errors
     */
    public function messageboxValidation(Request $request)
    {
        // Always fail validation for demo
        $request->validate([
            'required_field' => 'required',
            'email_field' => 'required|email',
            'numeric_field' => 'required|numeric|min:10'
        ], [
            'required_field.required' => 'Trường này là bắt buộc.',
            'email_field.required' => 'Vui lòng nhập email.',
            'email_field.email' => 'Email không đúng định dạng.',
            'numeric_field.required' => 'Vui lòng nhập số.',
            'numeric_field.numeric' => 'Giá trị phải là số.',
            'numeric_field.min' => 'Giá trị phải lớn hơn hoặc bằng 10.'
        ]);
    }

    /**
     * Demo long message
     */
    public function messageboxLong()
    {
        $longMessage = 'Đây là một thông báo rất dài để kiểm tra khả năng hiển thị của messagebox khi nội dung có nhiều text. ' .
                      'Thông báo này bao gồm nhiều thông tin chi tiết về quá trình xử lý, các bước đã thực hiện, ' .
                      'và kết quả cuối cùng. Messagebox sẽ tự động điều chỉnh kích thước để hiển thị toàn bộ nội dung ' .
                      'một cách rõ ràng và dễ đọc cho người dùng.';

        return $this->successAndRedirect($longMessage, 'admin.demo.messagebox');
    }

    /**
     * Demo HTML content in message
     */
    public function messageboxHtml()
    {
        $htmlMessage = 'Thông báo với <strong>HTML content</strong>:<br>' .
                      '• <em>Italic text</em><br>' .
                      '• <code>Code snippet</code><br>' .
                      '• <a href="#" onclick="alert(\'Link clicked!\'); return false;">Link example</a>';

        return $this->successAndRedirect($htmlMessage, 'admin.demo.messagebox');
    }

    /**
     * Show admin actions demo page
     */
    public function adminActions()
    {
        return view('admin.demo.admin-actions');
    }

    /**
     * Demo delete action
     */
    public function demoDelete($id)
    {
        return $this->successAndRedirect(
            "Mục #{$id} đã được xóa thành công!",
            'admin.demo.admin-actions'
        );
    }

    /**
     * Demo toggle action
     */
    public function demoToggle($id)
    {
        return $this->successAndRedirect(
            "Trạng thái của mục #{$id} đã được thay đổi thành công!",
            'admin.demo.admin-actions'
        );
    }

    /**
     * Demo quick edit
     */
    public function demoQuickEdit(Request $request, $id)
    {
        $field = array_keys($request->except('_token'))[0] ?? 'field';
        $value = $request->input($field);

        return $this->jsonSuccess("Đã cập nhật {$field} thành '{$value}' cho mục #{$id}!");
    }

    /**
     * Demo auto save
     */
    public function demoAutoSave(Request $request, $id)
    {
        $field = array_keys($request->except('_token'))[0] ?? 'field';
        $value = $request->input($field);

        return $this->jsonSuccess("Đã tự động lưu {$field} = '{$value}' cho mục #{$id}!");
    }

    /**
     * Demo sort order
     */
    public function demoSortOrder(Request $request)
    {
        $items = $request->input('items', []);
        $count = count($items);

        return $this->jsonSuccess("Đã cập nhật thứ tự cho {$count} mục!");
    }

    /**
     * Demo confirmation modal
     */
    public function confirmationModal()
    {
        return view('admin.demo.confirmation-modal');
    }
}