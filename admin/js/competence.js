$(document).ready(function () {});

function lister_competences_pour_candidat(id, title)
{
    // var idcon = $("input#idcon").val();

    if(id > 0)
    {
       $.post('assets/programs/competence/lister.php', {id:id, title:title}, callback, 'text');
    }
    else
    {
        alert("Veuillez vous connecter");
    }
    
}

function supprimer_competence(idcomp, tpcomp, idcand, ddcomp, dfcomp) {
    if(confirm('Voulez-vous supprimer cette compétence ?'))
    {
        $.post('assets/programs/competence/supprimer.php',
               {idcomp:idcomp, tpcomp:tpcomp, idcand:idcand, ddcomp:ddcomp, dfcomp:dfcomp}, 
               callbackmsg, 
               'text');
    }
}