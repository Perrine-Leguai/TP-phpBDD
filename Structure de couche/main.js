// function afficherSelonChamp(nomID, noCol){

// $("#"+nomID).on('keyup', function(event){
    
//     value = event.target.value.toUpperCase();

//     $(".table tbody tr").hide();
//     $('.table tbody tr td:nth-child('+noCol+'):contains("'+value+'") ').parent().show()

// })

// }

// afficherSelonChamp("triNom", 2);

// afficherSelonChamp("triPrenom", 3 );
// afficherSelonChamp("triEmploi", 4);

//passer l'id du champ + colonne dans laquelle ça cherche en argument de fonction pour pouvoir faire une fonction pour les 4 champs
//inconvénient = pas sûr d'avoi rl'écran à jour


$("input").on('keyup', function(event){   //faut appeler ajax avec val de l'input puis controller php qui reçoit le parametre dans le get, valoriser les mm noms dans les id et pour les gets colonne (fonction générique pour créer des éléments html en fournissant les attributs selon leur valeur)
//controller appel service avec le parametre, 
//service appel dao avec le parametre,
//dao reçoit le parametre,
// ce qui ne change pas dans la requete : select e.* from employe as e inner join service as s on e.noserv= s.serv;
    const id=event.currentTarget.id;
    const value=event.target.value.toUpperCase();
    url="employeControler.php?id="+id +"&valeur="+value;

    


    $("tbody").empty();
    doGetJson(url); //cré
})

function doGetJson(url){
    $.getJSON(url,  function(){  //fonction raccourcis de l'appel AJAX
    
    console.log("coucou");
    
    })
}

