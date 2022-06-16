$(document).ready(function () {
    var type = $('input#tpcon').val();
    if(type == 1) { lister_offres_en_vigueur(); }
    else if(type == 2) { lister_organismes_par_recruteur(); }
         else if(type == 3) { lister_organismes_par_etat(0); }
              else { window.location.href = "assets/programs/utilisateur/deconnecter.php"; }
});

function load_content(selector, path) {
    $(selector).load(path);
}

function reload_page() {
    window.location.reload();
}

function callback(data) {
    $('div#displays').html(data);
}

function callbackmsg(data) {
    alert(data);
    reload_page();
}