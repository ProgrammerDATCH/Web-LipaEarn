"use strict";
const formAuthentication = document.querySelector("#formAuthentication");
document.addEventListener("DOMContentLoaded", function (e) {
    var t;
    formAuthentication &&
        FormValidation.formValidation(formAuthentication, {
            fields: {
                first_name: {
                    validators: {
                        notEmpty: { message: "Please enter your first name" },
                        stringLength: {
                            min: 3,
                            message: "firstname must be more than 6 characters",
                        },
                    },
                },
                username: {
                    validators: {
                        notEmpty: { message: "Please enter username" },
                        stringLength: {
                            min: 4,
                            message: "Username must be more than 6 characters",
                        },
                    },
                },
                
                lastName: {
                    validators: {
                        notEmpty: { message: "Please enter your lastname" },
                        stringLength: {
                            min: 3,
                            message: "lastnaname must be more than 6 characters",
                        },
                    },
                },
                email: {
                    validators: {
                        notEmpty: { message: "Please enter your email" },
                        emailAddress: {
                            message: "Please enter valid email address",
                        },
                    },
                },
                number: {
                    validators: {
                        notEmpty: { message: "Please enter your number" },
                        stringLength: {
                            min: 9,
                            max: 12,
                            message: "number you entered is invalid",
                        },
                    },
                },
                "email-username": {
                    validators: {
                        notEmpty: { message: "Please enter email / username" },
                        stringLength: {
                            min: 6,
                            message: "Username must be more than 6 characters",
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: { message: "Please enter your password" },
                        stringLength: {
                            min: 6,
                            message: "Password must be more than 6 characters",
                        },
                    },
                },
                password_confirmation: {
                    validators: {
                        notEmpty: { message: "Please confirm password" },
                        identical: {
                            compare: function () {
                                return formAuthentication.querySelector(
                                    '[name="password"]'
                                ).value;
                            },
                            message:
                                "The password and its confirm are not the same",
                        },
                        stringLength: {
                            min: 6,
                            message: "Password must be more than 6 characters",
                        },
                    },
                },
                terms: {
                    validators: {
                        notEmpty: {
                            message: "Please agree terms & conditions",
                        },
                    },
                },
                country: {
                    validators: {
                        notEmpty: {
                            message: "Please select your country",
                        },
                    },
                },
                profile: {
                    validators: {
                        notEmpty: {
                            message: "Please add profile picture",
                        },
                    },
                },
                
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: "",
                    rowSelector: ".mb-3",
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
            init: (e) => {
                e.on("plugins.message.placed", function (e) {
                    e.element.parentElement.classList.contains("input-group") &&
                        e.element.parentElement.insertAdjacentElement(
                            "afterend",
                            e.messageElement
                        );
                });
            },
        }),
        (t = document.querySelectorAll(".numeral-mask")).length &&
            t.forEach((e) => {
                new Cleave(e, { numeral: !0 });
            });
});
