@extends('admin.layouts.app')

@section('title', 'Test Confirmation Modal')

@section('content')
<div class="container">
    <h1>Test Confirmation Modal</h1>
    
    <div class="alert alert-info">
        <strong>Debug Info:</strong> Mở Developer Tools (F12) và xem Console để debug.
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <h3>Test Delete Button (data-delete)</h3>
            <form action="#" method="POST" onsubmit="return false;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" data-delete="Test Item">
                    <i class="fas fa-trash me-2"></i>Delete Test Item
                </button>
            </form>
        </div>
        
        <div class="col-md-6">
            <h3>Test Confirm Button (data-confirm)</h3>
            <button type="button" class="btn btn-warning" 
                    data-confirm="Are you sure you want to do this?"
                    data-confirm-type="warning"
                    onclick="return false;">
                <i class="fas fa-exclamation-triangle me-2"></i>Test Confirm
            </button>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <h3>Test JavaScript Functions</h3>
            <button type="button" class="btn btn-primary" onclick="testConfirmAction()">
                Test confirmAction()
            </button>
            <button type="button" class="btn btn-danger" onclick="testConfirmDelete()">
                Test confirmDelete()
            </button>
            <button type="button" class="btn btn-success" onclick="testDirectModal()">
                Test Direct Modal
            </button>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <h3>Debug Info</h3>
            <button type="button" class="btn btn-info" onclick="showDebugInfo()">
                Show Debug Info
            </button>
            <div id="debugInfo" class="mt-3"></div>
        </div>
    </div>
</div>

<script>
function testConfirmAction() {
    console.log('Testing confirmAction...');
    console.log('window.confirmationModal:', window.confirmationModal);
    
    if (typeof confirmAction === 'function') {
        confirmAction('This is a test confirmation. Do you want to continue?', function() {
            alert('You confirmed!');
        }, function() {
            alert('You cancelled!');
        });
    } else {
        console.error('confirmAction function not found');
        alert('confirmAction function not found');
    }
}

function testConfirmDelete() {
    console.log('Testing confirmDelete...');
    console.log('window.confirmationModal:', window.confirmationModal);
    
    if (typeof confirmDelete === 'function') {
        confirmDelete('Test Item', function() {
            alert('Item deleted!');
        }, function() {
            alert('Delete cancelled!');
        });
    } else {
        console.error('confirmDelete function not found');
        alert('confirmDelete function not found');
    }
}

function testDirectModal() {
    console.log('Testing direct modal...');
    console.log('window.confirmationModal:', window.confirmationModal);
    
    if (window.confirmationModal) {
        window.confirmationModal.show({
            title: 'Direct Test',
            message: 'This is a direct modal test. Do you want to continue?',
            type: 'info',
            onConfirm: function() {
                alert('Direct modal confirmed!');
            },
            onCancel: function() {
                alert('Direct modal cancelled!');
            }
        });
    } else {
        console.error('window.confirmationModal not available');
        alert('window.confirmationModal not available');
    }
}

function showDebugInfo() {
    const debugInfo = document.getElementById('debugInfo');
    const info = {
        'window.confirmationModal': !!window.confirmationModal,
        'confirmAction function': typeof confirmAction,
        'confirmDelete function': typeof confirmDelete,
        'showConfirmation function': typeof showConfirmation,
        'ConfirmationModal class': typeof window.ConfirmationModal,
        'Modal element exists': !!document.getElementById('confirmationModal')
    };
    
    let html = '<div class="card"><div class="card-body"><h5>Debug Information:</h5><ul>';
    for (const [key, value] of Object.entries(info)) {
        html += `<li><strong>${key}:</strong> ${value}</li>`;
    }
    html += '</ul></div></div>';
    
    debugInfo.innerHTML = html;
    console.log('Debug info:', info);
}

// Auto-show debug info on page load
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(showDebugInfo, 1000);
});
</script>
@endsection
