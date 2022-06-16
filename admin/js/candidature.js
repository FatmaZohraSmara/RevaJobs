$(document).ready(function () {});

function ajouter_candidature(idoff, tpoff, barem)
{
    var idcon = $('input#idcon').val();
    var adcon = $('input#adcon').val();
    var valeur = $('input#vlcon').val();
    if(valeur > 0 && valeur >= barem)
    {
        if(adcon >= tpoff) // Rejet de candidature aux non-diplômés
        {
            if(confirm('Voulez-vous postuler à cette offre ?'))
            {
                $.post('assets/programs/candidature/ajouter.php', {idcon:idcon, idoff:idoff, valeur:valeur}, callbackmsg, 'text');
            }
        }
        else
        {
            alert("Votre niveau de compétence ne correspond pas à cette offre !!")
        }
    }
    else
    {
        alert('Postulat rejetée, vous n\'avez pas le bon niveau de compétence !!!');
    }

    // load_content('div#displays', 'form_ajouter_candidature.php?idoffre=' + idoffre);
}

function lister_candidatures_pour_candidat(idc, ido)
{
    var title = 'Mes candidatures';
    $.post('assets/programs/candidature/lister.php', {idc:idc, ido:ido, title:title}, callback, 'text');
}

function supprimer_candidature(id)
{
    $.post('assets/programs/candidature/supprimer.php', {id:id}, callbackmsg, 'text');
}