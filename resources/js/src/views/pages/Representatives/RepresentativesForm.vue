<template>
    <div>
        <form @submit.prevent="save" class="needs-validation" novalidate v-if="permission">
            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <label for="name">Nome</label>
                    <input type="text" :class="['form-control', isFieldValid('name') ]" v-model="dataResponse.name"
                           id="name"
                           placeholder="Digite o nome"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.name}}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">E-mail</label>
                    <input type="email" :class="['form-control', isFieldValid('email') ]" v-model="dataResponse.email"
                           id="email"
                           placeholder="Digite o e-mail"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.email}}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">CNPJ</label>
                    <input type="text" :class="['form-control', isFieldValid('cpf') ]" v-model="dataResponse.cnpj"
                           id="cnpj"
                           placeholder="Digite o CNPJ"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.cnpj}}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Telefone</label>
                    <input type="text" :class="['form-control', isFieldValid('phone') ]" v-model="dataResponse.phone"
                           id="phone"
                           placeholder="Digite o telefone"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.phone}}
                    </div>
                </div>

            </div>

            <hr>

            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <label for="name">UserName</label>
                    <input type="text" :class="['form-control', isFieldValid('user.username') ]" v-model="dataResponse.user.username"
                           id="username"
                           placeholder="Digite o username"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.user.username}}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Senha</label>
                    <input type="password" :class="['form-control', isFieldValid('password') ]" v-model="dataResponse.user.password"
                           id="password"
                           placeholder="Digite a senha"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.user.password}}
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="profile_id">Perfil</label>
                    <select :class="['form-control', isFieldValid('profile_id') ]" id="profile_id" v-model="dataResponse.user.profile_id" required>
                        <option value="null">Selecione</option>
                        <option :value="item.id" v-for="item in profiles" :key="item.id">{{item.name}}</option>
                    </select>
                    <div class="invalid-feedback">
                        {{errorData.user.profile_id}}
                    </div>
                </div>

            </div>

            <slot name="buttons"></slot>
        </form>

<!--        TODO colocar o data aqui-->
        <div v-if="!permission && dataResponse">
            <p><b>Nome</b>: {{data.name}}</p>

            <button class="btn btn-danger" @click="$router.push('/representatives')">Voltar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "representativesForm",
        props: ['data', 'errors'],
        data() {
            return {
                dataResponse: this.data || {
                    user: {}
                },
                permission: checkPermission('representatives-edit'),
                errorData: {
                    user:{}
                },
                profiles: [],
            }
        },
        watch: {
            dataResponse: function (val) {
                this.$emit('update', val);
            },
            errors: function (val) {
                this.errorData = val;
                this.isFieldValid
            }
        },
        mounted(){
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
