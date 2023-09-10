/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    //
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function deleteConfirmation(text) {
    return swal({
        title: "Are you sure?",
        text: text || "Do you really want to delete this record?",
        icon: "warning",
        buttons: [
            'Cancel',
            'Delete'
        ],
        dangerMode: true,
    });
}

function successMessage(text) {
    return swal({
        title: "Success!",
        text: text || "Record has been deleted!",
        icon: "success",
    });
}

function errorMessage(text) {
    return swal({
        title: "Error!",
        text: text || "Something went wrong!",
        icon: "error",
    });
}
