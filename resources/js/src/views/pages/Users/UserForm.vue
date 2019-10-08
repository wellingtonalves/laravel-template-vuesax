<template>
    <div>
        <form @submit.prevent="save" class="needs-validation" novalidate v-if="permission">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Nome</label>
                    <input type="text" :class="['form-control', isFieldValid('name') ]" v-model="user.name" id="name"
                           placeholder="Digite o nome"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.name}}
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email</label>
                    <input type="email" :class="['form-control', isFieldValid('email') ]" id="email" placeholder="Digite o email"
                           v-model="user.email" required>
                    <div class="invalid-feedback">
                        {{errorData.email}}
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="username">Login</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" :class="['form-control', isFieldValid('username') ]" id="username" v-model="user.username"
                               placeholder="Digite o login" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            {{errorData.username}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="password">Senha</label>
                    <input type="password" :required="!data" :class="['form-control', isFieldValid('password') ]" id="password" placeholder="Digite a senha"
                           v-model="user.password">
                    <div class="invalid-feedback">
                        {{errorData.password}}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirm">Confirme a senha</label>
                    <input type="password" :required="!data" class="form-control" id="password_confirm"
                           placeholder="Confirme a senha"
                           v-model="user.password_confirmation">
                    <div class="invalid-feedback">
                        {{errorData.password_confirmation}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="status">Status</label>
                    <select :class="['form-control', isFieldValid('status') ]" id="status" v-model="user.status" required>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                    <div class="invalid-feedback">
                        {{errorData.status}}
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profile_id">Perfil</label>
                    <select :class="['form-control', isFieldValid('profile_id') ]" id="profile_id" v-model="user.profile_id" required>
                        <option value="null">Selecione</option>
                        <option :value="item.id" v-for="item in profiles" :key="item.id">{{item.name}}</option>
                    </select>
                    <div class="invalid-feedback">
                        {{errorData.profile_id}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col mb-3">
                    <div class="form-check">
                        <input :class="['form-check-input', isFieldValid('is_admin') ]" v-model="user.is_admin" type="checkbox" value=""
                               id="invalidCheck">
                        <label class="form-check-label" for="invalidCheck">
                            Administrador
                        </label>
                        <div class="invalid-feedback">
                            {{errorData.is_admin}}
                        </div>
                    </div>
                </div>
            </div>
            <slot name="buttons"></slot>
        </form>

        <div v-if="!permission && user">
            <p><b>Nome</b>: {{data.name}}</p>
            <p><b>Email</b>: {{data.email}}</p>
            <p><b>Login</b>: {{data.username}}</p>
            <p><b>Status</b>: {{data.status}}</p>
            <p><b>Tipo</b>: {{data.tipo_usuario}}</p>

            <button class="btn btn-danger" @click="$router.push('/users')">Voltar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserForm",
        props: ['data', 'errors'],
        data() {
            return {
                user: this.data || {},
                permission: checkPermission('users-edit'),
                errorData: {},
                companies: [],
                profiles: [],
            }
        },
        watch: {
            user: function (val) {
                this.$emit('update', val);
            },
            errors: function (val) {
                this.errorData = val;
                this.isFieldValid
            }
        },
        mounted(){
          this.getCompanies();
          this.getProfiles();
        },
        methods: {
            save($event) {
                if ($event.target.checkValidity() === false) {
                    $event.preventDefault();
                    $event.stopPropagation();
                }
                $event.target.classList.add('was-validated');
            },
            isFieldValid(field) {
                return Object.keys(this.errorData).includes(field) ? 'is-invalid' : '';
            },
            getCompanies(){
                axios.get('/api/v1/companies?pagination=false').then(response =>{
                    this.companies = response.data.data;
                }).catch(error =>{

                })
            },
            getProfiles(){
                axios.get('/api/v1/profiles?pagination=false').then(response =>{
                    this.profiles = response.data.data;
                }).catch(error =>{

                })
            }
        }
    }
</script>

<style scoped>

</style>