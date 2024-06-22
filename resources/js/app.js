import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone( '#dropzone', {
    dictDefaultMessage: "Sube Tu Imagen Aquí",
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.webp",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
} )
