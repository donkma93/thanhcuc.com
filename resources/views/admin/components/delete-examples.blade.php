{{-- 
    Examples of how to use Confirmation Modal for delete actions
    Include this file in your admin views for reference
--}}

{{-- 
    1. Simple Delete Button with data-delete attribute
    The data-delete value will be used as the item name in the confirmation
--}}
<button type="submit" class="btn btn-danger" data-delete="Item Name">
    <i class="fas fa-trash me-2"></i>Delete
</button>

{{-- 
    2. Delete Button with custom message
    Use data-delete-message for custom confirmation text
--}}
<button type="submit" class="btn btn-danger" 
        data-delete="User Account"
        data-delete-message="Are you sure you want to delete this user account? All associated data will be permanently lost.">
    <i class="fas fa-trash me-2"></i>Delete User
</button>

{{-- 
    3. Form with confirmation
    Add data-confirm to the form element
--}}
<form action="/delete-item" method="POST" 
      data-confirm="Are you sure you want to delete this item?"
      data-confirm-type="danger">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

{{-- 
    4. Link with confirmation
    Use data-confirm on any clickable element
--}}
<a href="/delete-item" class="btn btn-danger"
   data-confirm="This will permanently delete the item. Continue?"
   data-confirm-type="danger"
   data-confirm-title="Confirm Deletion">
    Delete Item
</a>

{{-- 
    5. Dropdown menu item
    Works with any element inside dropdowns
--}}
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
        Actions
    </button>
    <ul class="dropdown-menu">
        <li>
            <form action="/delete" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger" 
                        data-delete="Item Name">
                    <i class="fas fa-trash me-2"></i>Delete
                </button>
            </form>
        </li>
    </ul>
</div>

{{-- 
    6. Bulk Actions
    Use confirmAction() function in JavaScript
--}}
<script>
function confirmBulkDelete() {
    const selectedCount = document.querySelectorAll('.item-checkbox:checked').length;
    
    if (selectedCount === 0) {
        showError('Please select at least one item to delete.');
        return false;
    }
    
    const message = `Are you sure you want to delete ${selectedCount} selected items? This action cannot be undone.`;
    
    return confirmAction(message, function() {
        // Submit the bulk delete form
        document.getElementById('bulkDeleteForm').submit();
    });
}
</script>

{{-- 
    7. AJAX Delete with confirmation
--}}
<script>
function deleteItemAjax(itemId, itemName) {
    confirmDelete(itemName, function() {
        return $.ajax({
            url: `/admin/items/${itemId}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(response) {
            // Handle success - maybe reload the page or remove the item from DOM
            location.reload();
        });
    });
}
</script>

{{-- 
    8. Custom confirmation with all options
--}}
<script>
function customDeleteConfirmation() {
    showConfirmation({
        title: 'Delete Confirmation',
        message: 'This is a custom delete confirmation with all options.',
        type: 'danger',
        confirmText: 'Yes, Delete',
        cancelText: 'Cancel',
        onConfirm: function() {
            // Your delete logic here
            showSuccess('Item deleted successfully!');
        },
        onCancel: function() {
            showInfo('Delete operation cancelled.');
        }
    });
}
</script>

{{-- 
    Available confirmation types:
    - danger (red) - for delete/destructive actions
    - warning (yellow) - for potentially harmful actions  
    - info (blue) - for informational confirmations
    - success (green) - for positive confirmations
--}}

{{-- 
    Available global functions:
    - confirmAction(message, onConfirm, onCancel)
    - confirmDelete(itemName, onConfirm, onCancel)
    - confirmWarning(message, onConfirm, onCancel)
    - confirmInfo(message, onConfirm, onCancel)
    - showConfirmation(options)
--}}
