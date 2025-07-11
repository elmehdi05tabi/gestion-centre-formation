let tr = document.querySelectorAll('tbody tr');
let search = document.getElementById('search');
// obtenire les donner de tabla est changer le sur un objet js 
let stagiaires = Array.from(tr).map(row => {
    return {
        idStagiaire: row.querySelector('.idStagiaire').textContent.trim(),
        nom: row.querySelector('.nom').textContent.trim(),
        prenom: row.querySelector('.prenom').textContent.trim(),
        emailStagiare: row.querySelector('.emailStagiare').textContent.trim(),
        Tel: row.querySelector('.Tel').textContent.trim(),
        nomFormation: row.querySelector('.nomFormation').textContent.trim(),
        dateNaissance: row.querySelector('.dateNaissance').textContent.trim(),
        PhotoStagiaire: row.querySelector('.PhotoStagiaire img').getAttribute("src"),
    };
});
search.addEventListener("keyup", function () {
    let filterName = this.value.toLowerCase().trim();
    let tbody = document.querySelector('#tb tbody');
    // vider le contenu de tableu 
    tbody.innerHTML = "" ; 
    // filter les stagier par nom ou prenom ou les deux 
    let resultats = stagiaires.filter(stagiaire => 
       (`${stagiaire.nom} ${stagiaire.prenom}`.toLowerCase().includes(filterName)) || 
       (stagiaire.nom.toLowerCase().includes(filterName) )||
       (stagiaire.prenom.toLowerCase().includes(filterName))
    )
    resultats.forEach(stagiaire=>{
        let tr = document.createElement("tr") ; 
        tr.innerHTML =`
       <tr>
                <td class='idStagiaire'>${stagiaire.idStagiaire}</td>
                <td class='nom'>${stagiaire.nom}</td>
                <td class='prenom'>${stagiaire.prenom}</td>
                <td class='emailStagiare'>${stagiaire.emailStagiare}</td>
                <td class='Tel'>${stagiaire.Tel}</td>
                <td class='nomFormation'>${stagiaire.nomFormation}</td>
                <td class='dateNaissance'>${stagiaire.dateNaissance}</td>
                <td class='PhotoStagiaire'><img src="${stagiaire.PhotoStagiaire}" alt="stagire image"></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $stagiare->id_stagiaire?>">modifier</a>
                    <a href="index.php?action=delete&id=<?= $stagiare->id_stagiaire?>">suprimer</a>
                </td>
            </tr> 
        `
        tbody.appendChild(tr) ; 
    }
    )
});
