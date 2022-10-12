document.getElementById('ajouter-button').onclick = () => {
    document.getElementById('ajouter-form').classList.remove('hidden');
    document.getElementById('index').classList.add('hidden');

}

function editPromo(promoID)
{
    document.getElementById('edit-form-' + promoID).classList.remove('hidden');
    document.getElementById('promo-' + promoID).classList.add('hidden');
}