(function ($) {
    'use strict';
    $(function () {
        $("#Form").validate({
            errorClass: "is-invalid",
            validClass: "is-valid",
            errorPlacement: function (label, element) {
                label.addClass('invalid-feedback');
                label.insertAfter(element);
            },
            highlight: function (element, errorClass) {
                $(element).addClass(errorClass)
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass)
            }
        });
        // validate signup form on keyup and submit
        $("#entriForm").validate({
            errorClass: "is-invalid",
            validClass: "is-valid",
            rules: {
                noarsip: {
                    required: true,
                    minlength: 2
                },
                tanggal: {
                    required: true,
                },
                pencipta: {
                    required: true,
                },
                unitpengolah: {
                    required: true,
                },
                kode: {
                    required: true,
                },
                uraian: {
                    required: true,
                },
                lokasi: {
                    required: true,
                },
                media: {
                    required: true,
                },
                file: {
                    required: true,
                },
            },
            messages: {
                noarsip: {
                    required: "No Arsip harus diisi",
                    minlength: "Minimal 2 karakter"
                },
                tanggal: {
                    required: "Tanggal harus dipilih",
                },
                pencipta: {
                    required: "Pencipta harus dipilih",
                },
                unitpengolah: {
                    required: "Unit Pengolah harus dipilih",
                },
                kode: {
                    required: "Kode Klasifikasi harus dipilih",
                },
                uraian: {
                    required: "Uraian harus diisi",
                },
                lokasi: {
                    required: "Lokasi harus dipilih",
                },
                media: {
                    required: "Media harus dipilih",
                },
                file: {
                    required: "File harus dipilih",
                },
            },
            errorPlacement: function (label, element) {
                label.addClass('invalid-feedback');
                label.insertAfter(element);
            },
            highlight: function (element, errorClass) {
                $(element).addClass(errorClass)
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass)
            }
        });
    });
})(jQuery);