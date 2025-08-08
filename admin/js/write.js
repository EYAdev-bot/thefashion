// Fonction pour prévisualiser l'image principale
        function previewMainImage(input) {
            const preview = document.getElementById('mainPhotoPreview');
            const uploadContainer = input.parentElement.querySelector('.main-photo-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    uploadContainer.classList.add('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
}
        
 document.getElementById('imageUploader').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file && file.type.startsWith("image/")) {
                const formData = new FormData();
                formData.append('file', file);

                // Envoie vers ton script PHP pour sauvegarder l'image
                fetch('upload.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Insertion dans TinyMCE à l'endroit du curseur
                        tinymce.activeEditor.insertContent( `< img class="w-[75%] block" src = "admin/${data.location}" / > `);
                    })
                    .catch(error => {
                        console.error('Erreur upload :', error);
                    });
            }
        })