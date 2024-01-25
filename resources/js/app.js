import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "sube tu imagen",
    acceptedFiles: ".png, .jpg, jpeg",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivos",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = document.querySelector('[name="imagen"]').size;
            imagenPublicada.name =
                document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("sending", function (file, xhr, formData) {});

dropzone.on("success", function (file, response) {
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="imagen"]').value="";
});
