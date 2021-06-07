
var dossier = document.getElementById('dossierType');
var query = document.getElementById('query');
var x = document.querySelectorAll(".filter");
var e = document.getElementsByClassName('filter');
//console.log(x,e);

/*
Array.from(document.getElementsByClassName('filter')).forEach(item => {

     item.addEventListener('change', () => {
       console.log(item.value);
     })
   })*/



function filter1(dt) {

    //take value of search bar
    var query = document.getElementById('query').value;
    var dossierType = dt;

    // q = undefined => dossierType = true
    if (typeof query === "undefined") {
        query = true;
    }

    console.log("query : "+query+", dossierType : "+dossierType);

    /*
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {

          if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

              document.getElementById("table-container").innerHTML=xmlhttp.responseText;

          }

        }

        xmlhttp.open("GET","dossiers.php?dossierType="+dossierType+"&query="+q,true);

        xmlhttp.send();*/


}

function filter2(q) {
    //take value of search bar
    var query = q;
    var dossierType =document.getElementById('dossierType').value;

    // dt = 'a' => dossierType = true
    if (dossierType == "a") {
        dossierType = true;
    }
    console.log("query : "+query+", dossierType : "+dossierType);

    /*
  xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

        document.getElementById("table-container").innerHTML=xmlhttp.responseText;

    }

  }

  xmlhttp.open("GET","dossiers.php?dossierType="+dossierType+"&query="+q,true);

  xmlhttp.send();*/

}


dossier.addEventListener('change', () => {
    //take value of search bar
    var query = document.getElementById('query').value;
    var dossierType = dossier.value;

    // q = undefined => dossierType = true
    if (query === "") {
        query = true;
    }
    if (dossierType === "") {
        dossierType = true;
    }

    //console.log("query : "+query+", dossierType : "+dossierType);

    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            document.getElementById("table-container").innerHTML=xmlhttp.responseText;

        }

    }

    xmlhttp.open("GET","../views/filter-dossiers.php?dossierType="+dossierType+"&query="+query,true);

    xmlhttp.send();
});

query.addEventListener('change', () => {
    //take value of search bar
    var q = query.value;
    var dossierType =document.getElementById('dossierType').value;

    // dt = 'a' => dossierType = true
    if (dossierType == "") {
        dossierType = true;
    }

    //console.log("query : "+q+", dossierType : "+dossierType);
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            document.getElementById("table-container").innerHTML=xmlhttp.responseText;

        }

    }

    xmlhttp.open("GET","../views/filter-dossiers.php?dossierType="+dossierType+"&query="+q,true);

    xmlhttp.send();
});
