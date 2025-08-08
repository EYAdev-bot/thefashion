
function updateComment(commentId) {
    fetch('ajax/seen_comment.php', {
        method: 'POST', // On envoie des données avec la méthode POST
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, // On précise le type de contenu
        body: `id=${commentId}` // On envoie l'ID du commentaire à mettre à jour
    })
    .then(response => response.text()) // On récupère la réponse du serveur (succès ou erreur)
        .then(data => {
            console.log(`comment_${commentId}`)
            console.log(data)
            if (data === "success") {
            setTimeout(() => {
                let element = document.getElementById(`comment_${commentId}`)
                if (element) {
                    element.remove();
                }
            }, 100);
        } else {
            console.error("Erreur lors de la mise à jour."); // On affiche un message en cas d'erreur
        }
    });
}

function deleteComment(commentId) {
    fetch('ajax/delete_comment.php', {
        method: 'POST', // On envoie des données avec la méthode POST
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, // On précise le type de contenu
        body: `id=${commentId}` // On envoie l'ID du commentaire à mettre à jour
    })
    .then(response => response.text()) // On récupère la réponse du serveur (succès ou erreur)
        .then(data => {
            console.log(`comment_${commentId}`)
            console.log(data)
            if (data === "success") {
            setTimeout(() => {
                let element = document.getElementById(`comment_${commentId}`)
                if (element) {
                    element.remove();
                }
            }, 100);
        } else {
            console.error("Erreur lors de la supression à jour."); // On affiche un message en cas d'erreur
        }
    });
}

