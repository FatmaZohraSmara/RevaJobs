$(document).ready(function () {});

function chercher_offres()
{
    var info = $('input#input-search-offers').val();

    if(info.length > 0) 
    {
        var title = "Résultat de la recherche des offres";
        $.post('assets/programs/offre/chercher.php', {info:info, title:title}, callback, 'text');   
    }
}

function supprimer_offre(id)
{
    if(confirm('Voulez-vous supprimer cette offre ?'))
    {
        $.post('assets/programs/offre/supprimer.php', {id:id}, reload_page, 'text');   
    }
}

function lister_offres()
{
    load_content('div#displays', 'assets/programs/offre/lister_pour_admin.php');
}

function lister_offres_en_vigueur()
{
    var title = 'Liste des offres en vigueur';
    $.post('assets/programs/offre/lister.php', {title:title}, callback, 'text');   
}