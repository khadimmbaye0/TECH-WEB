const commande = JSON.parse(localStorage.getItem('commande')) || [];
const liste = document.getElementById('commandeListe');
const totalEl = document.getElementById('totalCommande');
let total = 0;

commande.forEach(p => {
    const prix = parseInt(p.prix.trim().replace(/\s/g, ''));
    total += prix * p.quantité;
    const li = document.createElement('li');
    li.textContent = `${p.nom} x ${p.quantité} = ${prix * p.quantité} CFA`;
    liste.appendChild(li);
});

totalEl.textContent = total.toLocaleString();

document.getElementById('formCommande').addEventListener('submit', function(e) {
    document.getElementById('donneesCommande').value = JSON.stringify(commande);
    document.getElementById('total').value = total;
});