// Call the dataTables jQuery plugin
$(document).ready(function () {
    $("#dataTable").DataTable({
        layout: {
            topStart: "info",
            topEnd: {
                search: {
                    placeholder: "Search Games",
                },
            },
        },
    });
});
