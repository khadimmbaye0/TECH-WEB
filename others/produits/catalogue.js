const produits = [
    {id: 1, nom: 'Tapis oriental', prix: '29 620', popularité: 4, catégorie: 'tapis', image: './../../assets/tapisOriental.jpeg'},
    {id: 2, nom: 'Lampe suspendue', prix: '39 000 ', popularité: 5, catégorie: 'luminaire', image: './../../assets/lampeSuspendu.jpeg'},
    {id: 3, nom: 'Canapé moderne', prix: '109 000', popularité: 3, catégorie: 'meuble', image: './../../assets/canapeModerne .jpeg'},
    {id: 4, nom: 'Tapis bohème', prix: '12 000', popularité: 5, catégorie: 'tapis', image: './../../assets/tapisBoheme.jpeg'},
    {id: 5, nom: 'Buffet vintage', prix: '13 000', popularité: 5, catégorie: 'meuble', image: './../../assets/buffetVintage.jpeg'},
    {id: 6, nom: 'Lampe de table', prix: '8 000', popularité: 4, catégorie: 'luminaire', image: './../../assets/lampeTable.jpeg'},
    {id: 7, nom: 'Tableau peinture', prix: '5 000', popularité: 4, catégorie: 'décoration', image: './../../assets/tableauPeinture.jpeg'},
    {id: 8, nom: 'Tableau abstrait', prix: '6 000', popularité: 5, catégorie: 'décoration', image: './../../assets/tableauAbstrait.jpeg'},
    {id: 9, nom: 'Chaise scandinave', prix: '15 000', popularité: 4, catégorie: 'meuble', image: './../../assets/chaiseScandinave.jpeg'},
    {id: 10, nom: 'Tapis berbère', prix: '20 000', popularité: 5, catégorie: 'tapis', image: './../../assets/tapisBerbere.jpeg'},
    {id: 11, nom: 'Étagère murale', prix: '10 000', popularité: 3, catégorie: 'meuble', image: './../../assets/etagereMurale.jpeg'},
    {id: 12, nom: 'Suspension industrielle', prix: '25 000', popularité: 4, catégorie: 'luminaire', image: './../../assets/suspensionIndustrielle.jpeg'},];

const produitsListe = document.getElementById('produitsListe');
const filtreCategorie = document.getElementById('filtreCategorie');
const trie = document.getElementById('trie');

const afficherProduits = (liste) => {
    produitsListe.innerHTML = '';
    liste.forEach(produit => {
        produitsListe.innerHTML += `
        <div class="produits-carte">
          <img src="${produit.image}" alt="${produit.nom}" class="produits-image">
          <div class="produits-details">
            <h3>${produit.nom}</h3>
            <p>${produit.prix} CFA</p>
            <p>⭐ ${produit.popularité}</p>
            <button class="btn-details" onclick="afficherFicheProduit('${produit.nom}', '${produit.prix}', '${produit.popularité}')">Voir fiche</button>
            <button class="btn-details det2">Ajouter au panier</button>
          </div>
        </div>`;
    });
};

const afficherFicheProduit = (nom, prix, popularite) => {
    alert(`Nom du produit : ${nom}\nPrix : ${prix} CFA\nPopularité : ${popularite} étoiles`);
};

const MAJProduits = () => {
    let filtres = [...produits];

    const cat = filtreCategorie.value;
    if (cat !== 'tous') {
        filtres = filtres.filter(produit => produit.catégorie === cat);
    }

    const tri = trie.value;
    if (tri === 'prix-bas') {
        filtres.sort((a, b) => parseInt(a.prix) - parseInt(b.prix));
    }
    else if (tri === 'prix-haut') {
        filtres.sort((a, b) => parseInt(b.prix) - parseInt(a.prix));
    }
    else if (tri === 'popularite') {
        filtres.sort((a, b) => b.popularité - a.popularité);
    }

    afficherProduits(filtres);
};

filtreCategorie.addEventListener('change', MAJProduits);
trie.addEventListener('change', MAJProduits);
MAJProduits();

const panier = [];
const panierListe = document.getElementById('panierListe');
const panierTotal = document.getElementById('panierTotal');
const iconePanier = document.getElementById('iconePanier');
const nbrProduits = document.getElementById('nbrProduits');
const pannierDiv  = document.getElementById('panier'); 
const btnPayer = document.getElementById('btnPayer');

const MAJPanier = () => {
    panierListe.innerHTML = '';
    let total = 0;

    panier.forEach((produit => {
        const prixNum = parseInt(produit.prix.trim().replace(/\s/g, ''));
        total += prixNum * produit.quantité;
        panierListe.innerHTML += `
            <li>${produit.nom} x ${produit.quantité} = ${prixNum * produit.quantité} CFA</li>
        `;

    }));

    panierTotal.textContent = total.toLocaleString() + ' CFA';
    nbrProduits.textContent = panier.reduce((sum, produit) => sum + produit.quantité, 0);
    btnPayer.style.display = total > 0 ? 'block' : 'none';
};

const ajouterAuPanier = (produit) => {
    const existant = panier.find(p => p.id === produit.id);
    if (existant) {
        existant.quantité++;
    }
    else {
        panier.push({ ...produit, quantité: 1 });
    }
    MAJPanier();
};

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('btn-details') && !e.target.classList.contains('det2')) return;
    const carte = e.target.closest('.produits-carte');
    const nomProduit = carte.querySelector('.produits-details h3').textContent;
    const produit = produits.find(p => p.nom === nomProduit);
    ajouterAuPanier(produit);
});

iconePanier.addEventListener('click', () => {
    pannierDiv.style.display = pannierDiv.style.display === 'none' ? 'block' : 'none';
});

btnPayer.addEventListener('click', () => {
    localStorage.setItem('commande', JSON.stringify(panier));
    window.location.href = 'commande.php'; 
});
