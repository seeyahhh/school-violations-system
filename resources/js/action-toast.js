document.addEventListener('DOMContentLoaded', function () {
    const actionToast = document.getElementById('actionToast');

    if (actionToast) {
        const response = actionToast.dataset.response;
        
        if (response) {
            const toast = bootstrap.Toast.getOrCreateInstance(actionToast);
            toast.show()
        }
    } else {
        console.log('failed');
    }
});