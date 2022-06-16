$(document).ready(function () {
    load_content("nav#navbar", "content_navbar.html");
    load_content("div#footer", "content_footer.html");
});

function load_content(selector, path) {
    $(selector).load(path);
}

function reload_page() {
    window.location.reload();
}

function feedback(data) {
    $('').html(data);
}