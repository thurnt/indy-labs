if (document.getElementsByClassName("btn-delete-task")) {
    [...(document.getElementsByClassName('btn-delete-task'))].forEach(function (item, idx) {
        var form = item.closest('form');
        item.addEventListener("click", function () {
            Swal.fire({
                title: "Are you sure?",
                text: "This task will be delete.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-light w-xs mt-2',
                confirmButtonText: "Confirm",
                buttonsStyling: false,
                showCloseButton: true
            }).then(function (result) {
                if (result.value) {
                    form.submit()
                }
            });
        })
    });
}
