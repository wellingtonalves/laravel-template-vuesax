(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Users/UserForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Users/UserForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "UserForm",
  props: ['data', 'errors'],
  data: function data() {
    return {
      user: this.data || {},
      permission: checkPermission('users-edit'),
      errorData: {},
      companies: [],
      profiles: []
    };
  },
  watch: {
    user: function user(val) {
      this.$emit('update', val);
    },
    errors: function errors(val) {
      this.errorData = val;
      this.isFieldValid;
    }
  },
  mounted: function mounted() {
    this.getCompanies();
    this.getProfiles();
  },
  methods: {
    save: function save($event) {
      if ($event.target.checkValidity() === false) {
        $event.preventDefault();
        $event.stopPropagation();
      }

      $event.target.classList.add('was-validated');
    },
    isFieldValid: function isFieldValid(field) {
      return Object.keys(this.errorData).includes(field) ? 'is-invalid' : '';
    },
    getCompanies: function getCompanies() {
      var _this = this;

      axios.get('/api/v1/companies?pagination=false').then(function (response) {
        _this.companies = response.data.data;
      })["catch"](function (error) {});
    },
    getProfiles: function getProfiles() {
      var _this2 = this;

      axios.get('/api/v1/profiles?pagination=false').then(function (response) {
        _this2.profiles = response.data.data;
      })["catch"](function (error) {});
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Users/UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Users/UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm.permission
      ? _c(
          "form",
          {
            staticClass: "needs-validation",
            attrs: { novalidate: "" },
            on: {
              submit: function($event) {
                $event.preventDefault()
                return _vm.save($event)
              }
            }
          },
          [
            _c("div", { staticClass: "form-row" }, [
              _c("div", { staticClass: "col-md-4 mb-3" }, [
                _c("label", { attrs: { for: "name" } }, [_vm._v("Nome")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.user.name,
                      expression: "user.name"
                    }
                  ],
                  class: ["form-control", _vm.isFieldValid("name")],
                  attrs: {
                    type: "text",
                    id: "name",
                    placeholder: "Digite o nome",
                    required: ""
                  },
                  domProps: { value: _vm.user.name },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.user, "name", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _c("div", { staticClass: "invalid-feedback" }, [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.errorData.name) +
                      "\n                "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4 mb-3" }, [
                _c("label", { attrs: { for: "email" } }, [_vm._v("Email")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.user.email,
                      expression: "user.email"
                    }
                  ],
                  class: ["form-control", _vm.isFieldValid("email")],
                  attrs: {
                    type: "email",
                    id: "email",
                    placeholder: "Digite o email",
                    required: ""
                  },
                  domProps: { value: _vm.user.email },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.user, "email", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _c("div", { staticClass: "invalid-feedback" }, [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.errorData.email) +
                      "\n                "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4 mb-3" }, [
                _c("label", { attrs: { for: "username" } }, [_vm._v("Login")]),
                _vm._v(" "),
                _c("div", { staticClass: "input-group" }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.user.username,
                        expression: "user.username"
                      }
                    ],
                    class: ["form-control", _vm.isFieldValid("username")],
                    attrs: {
                      type: "text",
                      id: "username",
                      placeholder: "Digite o login",
                      "aria-describedby": "inputGroupPrepend",
                      required: ""
                    },
                    domProps: { value: _vm.user.username },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.user, "username", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "invalid-feedback" }, [
                    _vm._v(
                      "\n                        " +
                        _vm._s(_vm.errorData.username) +
                        "\n                    "
                    )
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-row" }, [
              _c("div", { staticClass: "col-md-6 mb-3" }, [
                _c("label", { attrs: { for: "password" } }, [_vm._v("Senha")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.user.password,
                      expression: "user.password"
                    }
                  ],
                  class: ["form-control", _vm.isFieldValid("password")],
                  attrs: {
                    type: "password",
                    required: !_vm.data,
                    id: "password",
                    placeholder: "Digite a senha"
                  },
                  domProps: { value: _vm.user.password },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.user, "password", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _c("div", { staticClass: "invalid-feedback" }, [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.errorData.password) +
                      "\n                "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6 mb-3" }, [
                _c("label", { attrs: { for: "password_confirm" } }, [
                  _vm._v("Confirme a senha")
                ]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.user.password_confirmation,
                      expression: "user.password_confirmation"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "password",
                    required: !_vm.data,
                    id: "password_confirm",
                    placeholder: "Confirme a senha"
                  },
                  domProps: { value: _vm.user.password_confirmation },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(
                        _vm.user,
                        "password_confirmation",
                        $event.target.value
                      )
                    }
                  }
                }),
                _vm._v(" "),
                _c("div", { staticClass: "invalid-feedback" }, [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.errorData.password_confirmation) +
                      "\n                "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-row" }, [
              _c("div", { staticClass: "col-md-4 mb-3" }, [
                _c("label", { attrs: { for: "status" } }, [_vm._v("Status")]),
                _vm._v(" "),
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.user.status,
                        expression: "user.status"
                      }
                    ],
                    class: ["form-control", _vm.isFieldValid("status")],
                    attrs: { id: "status", required: "" },
                    on: {
                      change: function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.$set(
                          _vm.user,
                          "status",
                          $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        )
                      }
                    }
                  },
                  [
                    _c("option", { attrs: { value: "ativo" } }, [
                      _vm._v("Ativo")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "inativo" } }, [
                      _vm._v("Inativo")
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "invalid-feedback" }, [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.errorData.status) +
                      "\n                "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4 mb-3" }, [
                _c("label", { attrs: { for: "profile_id" } }, [
                  _vm._v("Perfil")
                ]),
                _vm._v(" "),
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.user.profile_id,
                        expression: "user.profile_id"
                      }
                    ],
                    class: ["form-control", _vm.isFieldValid("profile_id")],
                    attrs: { id: "profile_id", required: "" },
                    on: {
                      change: function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.$set(
                          _vm.user,
                          "profile_id",
                          $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        )
                      }
                    }
                  },
                  [
                    _c("option", { attrs: { value: "null" } }, [
                      _vm._v("Selecione")
                    ]),
                    _vm._v(" "),
                    _vm._l(_vm.profiles, function(item) {
                      return _c(
                        "option",
                        { key: item.id, domProps: { value: item.id } },
                        [_vm._v(_vm._s(item.name))]
                      )
                    })
                  ],
                  2
                ),
                _vm._v(" "),
                _c("div", { staticClass: "invalid-feedback" }, [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.errorData.profile_id) +
                      "\n                "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-row" }, [
              _c("div", { staticClass: "col mb-3" }, [
                _c("div", { staticClass: "form-check" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.user.is_admin,
                        expression: "user.is_admin"
                      }
                    ],
                    class: ["form-check-input", _vm.isFieldValid("is_admin")],
                    attrs: { type: "checkbox", value: "", id: "invalidCheck" },
                    domProps: {
                      checked: Array.isArray(_vm.user.is_admin)
                        ? _vm._i(_vm.user.is_admin, "") > -1
                        : _vm.user.is_admin
                    },
                    on: {
                      change: function($event) {
                        var $$a = _vm.user.is_admin,
                          $$el = $event.target,
                          $$c = $$el.checked ? true : false
                        if (Array.isArray($$a)) {
                          var $$v = "",
                            $$i = _vm._i($$a, $$v)
                          if ($$el.checked) {
                            $$i < 0 &&
                              _vm.$set(_vm.user, "is_admin", $$a.concat([$$v]))
                          } else {
                            $$i > -1 &&
                              _vm.$set(
                                _vm.user,
                                "is_admin",
                                $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                              )
                          }
                        } else {
                          _vm.$set(_vm.user, "is_admin", $$c)
                        }
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "label",
                    {
                      staticClass: "form-check-label",
                      attrs: { for: "invalidCheck" }
                    },
                    [
                      _vm._v(
                        "\n                        Administrador\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("div", { staticClass: "invalid-feedback" }, [
                    _vm._v(
                      "\n                        " +
                        _vm._s(_vm.errorData.is_admin) +
                        "\n                    "
                    )
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            _vm._t("buttons")
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    !_vm.permission && _vm.user
      ? _c("div", [
          _c("p", [
            _c("b", [_vm._v("Nome")]),
            _vm._v(": " + _vm._s(_vm.data.name))
          ]),
          _vm._v(" "),
          _c("p", [
            _c("b", [_vm._v("Email")]),
            _vm._v(": " + _vm._s(_vm.data.email))
          ]),
          _vm._v(" "),
          _c("p", [
            _c("b", [_vm._v("Login")]),
            _vm._v(": " + _vm._s(_vm.data.username))
          ]),
          _vm._v(" "),
          _c("p", [
            _c("b", [_vm._v("Status")]),
            _vm._v(": " + _vm._s(_vm.data.status))
          ]),
          _vm._v(" "),
          _c("p", [
            _c("b", [_vm._v("Tipo")]),
            _vm._v(": " + _vm._s(_vm.data.tipo_usuario))
          ]),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "btn btn-danger",
              on: {
                click: function($event) {
                  return _vm.$router.push("/users")
                }
              }
            },
            [_vm._v("Voltar")]
          )
        ])
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c(
        "span",
        { staticClass: "input-group-text", attrs: { id: "inputGroupPrepend" } },
        [_vm._v("@")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/pages/Users/UserForm.vue":
/*!*********************************************************!*\
  !*** ./resources/js/src/views/pages/Users/UserForm.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UserForm_vue_vue_type_template_id_1fbb58cb_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true& */ "./resources/js/src/views/pages/Users/UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true&");
/* harmony import */ var _UserForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UserForm.vue?vue&type=script&lang=js& */ "./resources/js/src/views/pages/Users/UserForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UserForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UserForm_vue_vue_type_template_id_1fbb58cb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UserForm_vue_vue_type_template_id_1fbb58cb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1fbb58cb",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/pages/Users/UserForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/pages/Users/UserForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/src/views/pages/Users/UserForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./UserForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Users/UserForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/pages/Users/UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Users/UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserForm_vue_vue_type_template_id_1fbb58cb_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Users/UserForm.vue?vue&type=template&id=1fbb58cb&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserForm_vue_vue_type_template_id_1fbb58cb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserForm_vue_vue_type_template_id_1fbb58cb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);