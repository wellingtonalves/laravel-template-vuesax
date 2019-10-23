(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[5],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ClientsForm__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ClientsForm */ "./resources/js/src/views/pages/Clients/ClientsForm.vue");
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
  name: "ClientsDetail",
  components: {
    ClientsForm: _ClientsForm__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      visible: false,
      title: this.$route.meta.title || '',
      data: '',
      modalMessage: false,
      modalMessageData: '',
      modalErrorMessage: false,
      modalErrorData: '',
      uuid: this.$route.params.uuid,
      subtitle: '',
      errors: {}
    };
  },
  watch: {
    modalMessage: function modalMessage(val, newVal) {
      var vm = this;

      if (!val) {
        vm.goTo('/clients');
      }
    }
  },
  mounted: function mounted() {
    this.getData(this.uuid);
  },
  methods: {
    getData: function getData(uuid) {
      var _this = this;

      axios.get('/api/v1/clients/' + uuid).then(function (response) {
        _this.data = response.data.data;
        _this.subtitle = _this.data.name || 'Novo registro';
      }).then(function () {
        _this.visible = true;
      });
    },
    update: function update(data) {
      this.data = data;
    },
    save: function save() {
      var _this2 = this;

      if (!this.data.password) {
        delete this.data.password;
      }

      axios.put('/api/v1/clients/' + this.uuid, this.data).then(function (response) {
        _this2.modalMessage = true;
        _this2.modalMessageData = response.data.data;
      })["catch"](function (error) {
        _this2.modalErrorMessage = true;
        _this2.modalErrorData = error.response.data.data || error.response.data.message;
        var result = {};
        Object.keys(error.response.data.errors).filter(function (item) {
          result[item] = error.response.data.errors[item][0];
        });
        _this2.errors = result;
      });
    },
    goTo: function goTo(url) {
      this.$router.push(url);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "clientsForm",
  props: ['data', 'errors'],
  data: function data() {
    return {
      dataResponse: this.data || {},
      permission: checkPermission('clients-edit'),
      errorData: {}
    };
  },
  watch: {
    dataResponse: function dataResponse(val) {
      this.$emit('update', val);
    },
    errors: function errors(val) {
      this.errorData = val;
      this.isFieldValid;
    }
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
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _c("h4", { staticClass: "title-page" }, [_vm._v(_vm._s(_vm.title))]),
      _vm._v(" "),
      _c("div", { staticClass: "card w-full mh-100" }, [
        _vm.visible
          ? _c(
              "div",
              { staticClass: "card-body" },
              [
                _c("h5", { staticClass: "card-title" }, [
                  _vm._v(_vm._s(_vm.subtitle))
                ]),
                _vm._v(" "),
                _c("vs-divider"),
                _vm._v(" "),
                _c("clients-form", {
                  attrs: { errors: _vm.errors, data: _vm.data },
                  on: { update: _vm.update },
                  scopedSlots: _vm._u(
                    [
                      {
                        key: "buttons",
                        fn: function() {
                          return [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-primary",
                                attrs: { type: "submit" },
                                on: { click: _vm.save }
                              },
                              [_vm._v("Salvar")]
                            ),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-danger",
                                attrs: { type: "submit" },
                                on: {
                                  click: function($event) {
                                    return _vm.goTo("/clients")
                                  }
                                }
                              },
                              [_vm._v("Cancelar")]
                            )
                          ]
                        },
                        proxy: true
                      }
                    ],
                    null,
                    false,
                    2110162512
                  )
                })
              ],
              1
            )
          : _vm._e()
      ]),
      _vm._v(" "),
      _c(
        "vs-popup",
        {
          attrs: { title: "Aviso", active: _vm.modalMessage },
          on: {
            "update:active": function($event) {
              _vm.modalMessage = $event
            }
          }
        },
        [_c("p", [_vm._v(_vm._s(_vm.modalMessageData))])]
      ),
      _vm._v(" "),
      _c(
        "vs-popup",
        {
          attrs: { title: "Erro", active: _vm.modalErrorMessage },
          on: {
            "update:active": function($event) {
              _vm.modalErrorMessage = $event
            }
          }
        },
        [_c("p", [_vm._v(_vm._s(_vm.modalErrorData))])]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=template&id=53455480&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=template&id=53455480&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************/
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
              _c("div", { staticClass: "col-md-6 mb-3" }, [
                _c("label", { attrs: { for: "name" } }, [_vm._v("Nome")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.dataResponse.name,
                      expression: "dataResponse.name"
                    }
                  ],
                  class: ["form-control", _vm.isFieldValid("name")],
                  attrs: {
                    type: "text",
                    id: "name",
                    placeholder: "Digite o nome ",
                    required: ""
                  },
                  domProps: { value: _vm.dataResponse.name },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.dataResponse, "name", $event.target.value)
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
              _c("div", { staticClass: "col-md-6 mb-3" }, [
                _c("label", { attrs: { for: "name" } }, [_vm._v("E-mail")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.dataResponse.email,
                      expression: "dataResponse.email"
                    }
                  ],
                  class: ["form-control", _vm.isFieldValid("email")],
                  attrs: {
                    type: "email",
                    id: "email",
                    placeholder: "Digite o e-mail",
                    required: ""
                  },
                  domProps: { value: _vm.dataResponse.email },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.dataResponse, "email", $event.target.value)
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
              ])
            ]),
            _vm._v(" "),
            _vm._t("buttons")
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    !_vm.permission && _vm.dataResponse
      ? _c("div", [
          _c("p", [
            _c("b", [_vm._v("Nome")]),
            _vm._v(": " + _vm._s(_vm.data.name))
          ]),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "btn btn-danger",
              on: {
                click: function($event) {
                  return _vm.$router.push("/clients")
                }
              }
            },
            [_vm._v("Voltar")]
          )
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/pages/Clients/ClientsDetail.vue":
/*!****************************************************************!*\
  !*** ./resources/js/src/views/pages/Clients/ClientsDetail.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ClientsDetail_vue_vue_type_template_id_8bcf6c66_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true& */ "./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true&");
/* harmony import */ var _ClientsDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ClientsDetail.vue?vue&type=script&lang=js& */ "./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ClientsDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ClientsDetail_vue_vue_type_template_id_8bcf6c66_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ClientsDetail_vue_vue_type_template_id_8bcf6c66_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "8bcf6c66",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/pages/Clients/ClientsDetail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ClientsDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true& ***!
  \***********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsDetail_vue_vue_type_template_id_8bcf6c66_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsDetail.vue?vue&type=template&id=8bcf6c66&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsDetail_vue_vue_type_template_id_8bcf6c66_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsDetail_vue_vue_type_template_id_8bcf6c66_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/src/views/pages/Clients/ClientsForm.vue":
/*!**************************************************************!*\
  !*** ./resources/js/src/views/pages/Clients/ClientsForm.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ClientsForm_vue_vue_type_template_id_53455480_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ClientsForm.vue?vue&type=template&id=53455480&scoped=true& */ "./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=template&id=53455480&scoped=true&");
/* harmony import */ var _ClientsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ClientsForm.vue?vue&type=script&lang=js& */ "./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ClientsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ClientsForm_vue_vue_type_template_id_53455480_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ClientsForm_vue_vue_type_template_id_53455480_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "53455480",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/pages/Clients/ClientsForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ClientsForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=template&id=53455480&scoped=true&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=template&id=53455480&scoped=true& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsForm_vue_vue_type_template_id_53455480_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ClientsForm.vue?vue&type=template&id=53455480&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Clients/ClientsForm.vue?vue&type=template&id=53455480&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsForm_vue_vue_type_template_id_53455480_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ClientsForm_vue_vue_type_template_id_53455480_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);