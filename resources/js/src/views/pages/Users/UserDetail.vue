<template>
    <div>
        <h4 class="title-page">{{title}}</h4>
        <div class="card w-full mh-100">
            <div class="card-body" v-if="visible">
                <h5 class="card-title">{{subtitle}}</h5>
                <vs-divider></vs-divider>
                <user-form :errors="errors" :data="data" @update="update">
                    <template v-slot:buttons>
                        <button class="btn btn-primary" @click="save" type="submit">Salvar</button>
                        <button class="btn btn-danger" @click="goTo('/users')" type="submit">Cancelar</button>
                    </template>
                </user-form>
            </div>
        </div>

        <vs-popup title="Aviso" :active.sync="modalMessage">
            <p>{{modalMessageData}}</p>
        </vs-popup>

        <vs-popup title="Erro" :active.sync="modalErrorMessage">
            <p>{{modalErrorData}}</p>
        </vs-popup>
    </div>
</template>

<script>
    import UserForm from './UserForm';

    export default {
        name: "UserDetail",
        components: {
            UserForm
        },
        data() {
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
            }
        },
        watch: {
            modalMessage: function (val, newVal) {
                let vm = this;
                if (!val) {
                    vm.goTo('/users')
                }
            }
        },
        mounted() {
            this.getUser(this.uuid);
        },
        methods: {
            getUser(uuid) {
                axios.get('/api/v1/users/' + uuid).then(response => {
                    this.data = response.data.data;
                    this.subtitle = this.data.name || 'Novo usuário';
                }).then(() => {
                    this.visible = true;
                })
            },
            update(data) {
                this.data = data;
            },
            save() {

                if (!this.data.password) {
                    delete this.data.password;
                }

                axios.put('/api/v1/users/' + this.uuid, this.data).then(response => {
                    this.modalMessage = true;
                    this.modalMessageData = response.data.data;
                }).catch(error => {
                    this.modalErrorMessage = true;
                    this.modalErrorData = error.response.data.data ||error.response.data.message;
                    const result = {};
                    Object.keys(error.response.data.errors).filter(function (item) {
                        result[item] = error.response.data.errors[item][0];
                    });
                    this.errors = result
                })
            },
            goTo(url) {
                this.$router.push(url);
            }
        }
    }
</script>

<style scoped>

</style>