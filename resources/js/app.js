/** @format */

import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
	dictDefaultMessage: "Sube aquí tu imagen",
	acceptedFiles: ".png,.jpg,.jpeg,.gif,.webp",
	addRemoveLinks: true,
	dictRemoveFile: "Borrar Archivo",
	maxFiles: 1,
	uploadMultiple: false,

	// Configuración para conservar imagen cuando se recarga la página o se da un error al enviar el formulario
	init: function () {
		if (document.querySelector('[name="imagen"]').value.trim()) {
			const imagenPublicada = {};
			imagenPublicada.size = 1234;
			imagenPublicada.name = document.querySelector('[name="imagen"]').value;

			// Asignación del nombre de la imagen a Dropzone
			this.options.addedfile.call(this, imagenPublicada);

			this.options.thumbnail.call(
				this,
				imagenPublicada,
				`/uploads/${imagenPublicada.name}`,
			);

			// Añadir clases a la imagen miniatura
			imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
		}
	},
});

dropzone.on("success", function (file, response) {
	document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on("error", function (file, message) {
	console.log(message);
});

dropzone.on("removedfile", function () {
	document.querySelector('[name="imagen"]').value = "";
});
