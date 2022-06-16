$(document).ready(function () {});

function chercher_utilisateurs()
{
    var info = $('input#input-search-users').val();

    if(info.length > 0) 
    {
        var title = "Résultat de la recherche des utilisateurs";
        $.post('assets/programs/utilisateur/chercher.php', {info:info, title:title}, callback, 'text');   
    }
}

function consulter_utilisateur()
{
    load_content('div#displays', 'profil_utilisateur.php');
}

function deconnecter_utilisateur()
{
    if(confirm("Voulez-vous vraiment vous déconnecter ?"))
    {
        window.location.href = "assets/programs/utilisateur/deconnecter.php";
    }
}
function supprimer_utilisateur(id)
{
    if(confirm("Voulez-vous supprimer cet utilisateur ?"))
    {
        if(id > 0)
        {
            $.post('assets/programs/utilisateur/supprimer.php', {id:id}, reload_page, 'text');   
        }
        else 
        {
            alert('Veuillez sélectionner un utilisateur !!');
        }
    }
}
function modifier_etat_utilisateur(id, etat)
{
    var msg = "";
    if(etat == 1) { msg = "Voulez-vous activer cet utilisateur ?"; }
    else if(etat == 0) { msg = "Voulez-vous archiver cet utilisateur ?"; }
    else { msg = "ERREUR !!!!";}

    if(confirm(msg))
    {
        if(id > 0 && (etat == 1 || etat == 0))
        {
            $.post('assets/programs/utilisateur/modifier_etat.php', {id:id, etat:etat}, reload_page, 'text');   
        }
        else 
        {
            alert('Veuillez vérifier vos données !!');
        }
    }
}
function lister_utilisateurs_par_etat(etat, cdp)
{
    $.post('assets/programs/utilisateur/lister.php', {etat:etat, cdp:cdp}, callback, 'text');
}

