<!-- =========================================================================================
    File Name: Login.vue
    Description: Login Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuesax Admin - VueJS Dashboard Admin Template
    Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img" id="page-login">
        <div class="w-100">
            <div class="card col-md-10 offset-lg-1 offset-md-1 mt-lg-5 mt-md-5">
                <div slot="no-body" class="full-page-bg-color">
                    <div class="row justify-content-md-center">
                        <div class="col d-none d-lg-block mx-auto self-center">
                            <img src="@assets/images/pages/logo-login.jpeg" alt="login" class="mx-auto">
                        </div>
                        <div class="col mx-auto self-center d-theme-dark-bg">
                            <div class="p-8">
                                <div class=" mb-8">
                                    <h4 class="mb-4">Login</h4>
                                </div>
                                <form action="" @submit.prevent="onSubmit" novalidate class="needs-validation">
                                    <div class="form-group">
                                        <label for="username">Usuário</label>
                                        <input v-model="username" type="text" required class="form-control"
                                               id="username"
                                               placeholder="Digite o usuário">
                                        <div class="invalid-feedback">
                                            {{errors.username}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input type="password" v-model="password" required class="form-control"
                                               id="password" placeholder="Digite a senha">
                                        <div class="invalid-feedback">
                                            {{errors.password}}
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-lg mt-4">Entrar</button>

                                    <div class="clearfix"></div>
                                    <div class="row mt-5" v-if="error_message">
                                        <div class="col">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                                 v-model="error_alert">
                                                {{error_message}}
                                                <button type="button" class="close" @click="error_message = ''">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                username: '',
                password: '',
                checkbox_remember_me: false,
                errors: {},
                error_message: '',
                error_alert: false
            }
        },
        methods: {
            onReset() {
            },
            onSubmit(event) {
                let vm = this;
                event.preventDefault();
                event.target.classList.add('was-validated');
                let form = {username: this.username, password: this.password}
                axios.post('/api/v1/auth/login', form).then(response => {
                    this.$store.dispatch('setAuthenticated', response.data.data).then(() => {
                        vm.$router.push('/dashboard')
                    });
                }).catch(error => {

                    if (error.response.data.errors) {
                        const result = {};
                        this.errors = error.response.data.errors.filter(res => {
                            result[res.field] = res.message;
                        });
                        vm.errors = result;
                        return true;
                    }
                    vm.error_message = error.response.data.message;
                    vm.error_alert = true;
                })
            }
        }
    }
</script>

<style lang="scss">
    #page-login {
        .social-login {
            .bg-facebook {
                background-color: #1551b1;
            }

            .bg-twitter {
                background-color: #00aaff;
            }

            .bg-google {
                background-color: #1551b1;
            }

            .bg-github {
                background-color: #333;
            }
        }
    }
</style>
