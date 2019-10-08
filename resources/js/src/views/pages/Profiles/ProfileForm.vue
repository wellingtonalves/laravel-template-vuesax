<template>
    <div>
        <form @submit.prevent="save" class="needs-validation" novalidate v-if="permission">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name">Nome do perfil</label>
                    <input type="text" :class="['form-control', isFieldValid('name') ]" v-model="profile.name" id="name"
                           placeholder="Digite o nome do perfil"
                           required>
                    <div class="invalid-feedback">
                        {{errorData.name}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Acessos: </label>
                </div>
                <div class="col-md-3" v-for="item in roles">
                    <div class="form-check">
                        <input ref="role" :class="['form-check-input']" v-model="profile.role"
                               type="checkbox" :value="item"
                               :id="item.id">
                        <label class="form-check-label" :for="item.id">
                            <p>{{item.description}}</p>
                        </label>
                        <div class="invalid-feedback">
                            {{errorData.is_admin}}
                        </div>
                    </div>
                </div>

                <div class="invalid-feedback">
                    {{errorData.cnpj}}
                </div>
            </div>
            <slot name="buttons"></slot>
        </form>

        <div v-if="!permission && profile">
            <p><b>Loja</b>: {{data.name}}</p>

            <button class="btn btn-danger" @click="$router.push('/profiles')">Voltar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProfileForm",
        props: ['data', 'errors'],
        data() {
            return {
                profile: this.data || {role: []},
                permission: checkPermission('profiles-edit'),
                errorData: {},
                roles: []
            }
        },
        watch: {
            profile: function (val) {
                this.$emit('update', val);
            },
            errors: function (val) {
                this.errorData = val;
                this.isFieldValid
            }
        },
        mounted() {
            this.getRoles();
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
            getRoles() {
                axios.get('/api/v1/roles?pagination=false').then(response => {
                    this.roles = response.data.data;
                }).catch(error => {

                })
            }
        }
    }
</script>

<style scoped>

</style>