function showToast(event) {
    let toast = document.getElementById('toast');
    let toastIcon = toast.querySelector('.toast-header i');
    let toastTitle = toast.querySelector('.toast-header strong');
    let toastBody = toast.querySelector('.toast-body');

    toastIcon.className = event.detail.icon;
    toastTitle.innerText = event.detail.title;
    toastBody.innerHTML = event.detail.content;

    new bootstrap.Toast(toast).show();
}

window.addEventListener('dispatch-event', showToast);

window.addEventListener('refresh-page', function () {
    location.reload();
});
