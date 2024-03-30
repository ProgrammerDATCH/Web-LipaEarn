"use strict";
$(function () {
    var e = $(".select2");
    e.length &&
        e.each(function () {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                dropdownParent: e.parent(),
            });
        });
}),
    document.addEventListener("DOMContentLoaded", function () {
        document
            .getElementById("addNewAddress")
            .addEventListener("show.bs.modal", function (e) {
                window.Helpers.initCustomOptionCheck();
            }),
            FormValidation.formValidation(
                document.getElementById("addNewAddressForm"),
                {
                    fields: {
                        modalAddressFirstName: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter your first name",
                                },
                                regexp: {
                                    regexp: /^[a-zA-Zs]+$/,
                                    message:
                                        "The first name can only consist of alphabetical",
                                },
                            },
                        },
                        modalAddressLastName: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter your last name",
                                },
                                regexp: {
                                    regexp: /^[a-zA-Zs]+$/,
                                    message:
                                        "The last name can only consist of alphabetical",
                                },
                            },
                        },
                        number: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter Payment Number",
                                },
                                regexp: {
                                    regexp: /^[0-9]+$/,
                                    message:
                                        "The last number You entered is invalid",
                                },
                                stringLength: {
                                    min: 9,
                                    max: 10,
                                    message:
                                        "The Number must be at least 9 characters long",
                                },
                            },
                        },
                        file: {
                            validators: {
                                notEmpty:
                                 { message: "Please select the screenshot" },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: ".col-12",
                        }),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        autoFocus: new FormValidation.plugins.AutoFocus(),
                    },
                }
            );
    });
