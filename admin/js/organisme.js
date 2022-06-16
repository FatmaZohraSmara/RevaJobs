$(document).ready(function () {});

function chercher_organismes()
{
    var info = $('input#input-search-organisms').val();

    if(info.length > 0) 
    {
        var title = "Résultat de la recherche des organismes";
        $.post('assets/programs/organisme/chercher.php', {info:info, title:title}, callback, 'text');   
    }
}

function supprimer_organisme(id)
{
    if(confirm("Voulez-vous supprimer cet organisme ?"))
    {
        if(id > 0)
        {
            $.post('assets/programs/organisme/supprimer.php', {id:id}, reload_page, 'text');   
        }
        else 
        {
            alert('Veuillez sélectionner un organisme !!');
        }
    }
}

function modifier_etat_organisme(id, etat)
{
    var msg = "";
    if(etat == 1) { msg = "Voulez-vous activer cet organisme ?"; }
    else if(etat == 0) { msg = "Voulez-vous archiver cet organisme ?"; }
    else { msg = "ERREUR !!!!";}

    if(confirm(msg))
    {
        if(id > 0 && (etat == 1 || etat == 0))
        {
            $.post('assets/programs/organisme/modifier_etat.php', {id:id, etat:etat}, reload_page, 'text');   
        }
        else 
        {
            alert('Veuillez vérifier vos données !!');
        }
    }
}

function lister_organismes_par_etat(etat)
{
    $.post('assets/programs/organisme/lister_par_etat.php', {etat:etat}, callback, 'text');
}

function lister_organismes_par_recruteur()
{
    var idr = $('input#idcon').val();   
    $.post('assets/programs/organisme/lister_pour_recruteur.php', {idr:idr}, callback, 'text');
}