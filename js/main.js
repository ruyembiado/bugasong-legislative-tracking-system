$(document).ready(function () {
    function toggleSidebar() {
        if ($(window).width() <= 767) {
            $("#accordionSidebar").addClass("toggled");
        } else {
            $("#accordionSidebar").removeClass("toggled");
        }
    }
    toggleSidebar();
    $(window).resize(function () {
        toggleSidebar();
    });

    $("#dataTable1").DataTable();

    // Highlight the active link based on localStorage value
    var activeLink = localStorage.getItem("activeLink");
    if (activeLink) {
        $("#" + activeLink).closest(".nav-item").addClass("active");
        // Set the title based on the stored active link
        var title = $("#" + activeLink).data("title");
        if (title) {
            document.title = title;
        }
    }

    // Handle click event for nav links and store the active link in localStorage
    $(".Links").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");
        var activeLink = $(this).attr("id");
        var title = $(this).data("title");
        localStorage.setItem("activeLink", activeLink);
        if (title) {
            document.title = title;
        }
        document.location.href = href;
    });

    // Handle click event for the brand link and set the dashboard as active
    $("#brandLink").on("click", function (e) {
        e.preventDefault();
        var dashboardLink = $("#dashboardLink").attr("id");
        var title = $(this).data("title");
        localStorage.setItem("activeLink", dashboardLink);
        if (title) {
            document.title = title;
        }
        document.location.href = $(this).attr("href");
    });

    // Handle click event for document management dropdown to set active link and document title
    $("#documentManagementLink").on("click", function () {
        var activeLink = $(this).attr("id");
        var title = $(this).data("title");
        localStorage.setItem("activeLink", activeLink);
        if (title) {
            document.title = title;
        }
    });

    $(".logout").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");

        Swal.fire({
            type: "warning",
            icon: "warning",
            title: "Are You Sure?",
            text: "You will be logged out",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Logout",
            customClass: {
                actions: "my-actions",
                cancelButton: "order-1 right-gap",
                confirmButton: "order-2",
                container: "my-swal",
            },
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    $(".delete").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");

        Swal.fire({
            type: "warning",
            icon: "warning",
            title: "Are You Sure?",
            text: "This will be deleted",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Delete",
            customClass: {
                actions: "my-actions",
                cancelButton: "order-1 right-gap",
                confirmButton: "order-2",
                container: "my-swal",
            },
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    $(".unpublish").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");

        Swal.fire({
            type: "warning",
            icon: "warning",
            title: "Are You Sure?",
            text: "This document will be Unpublished",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Unpublished",
            customClass: {
                actions: "my-actions",
                cancelButton: "order-1 right-gap",
                confirmButton: "order-2",
                container: "my-swal",
            },
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    $(".deactivate").on("click", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");

        Swal.fire({
            type: "warning",
            icon: "warning",
            title: "Are You Sure?",
            text: "This user will be deactivated",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Deactivated",
            customClass: {
                actions: "my-actions",
                cancelButton: "order-1 right-gap",
                confirmButton: "order-2",
                container: "my-swal",
            },
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });
});