<template>
    <div>
        <h4 class="title-page">{{title}}</h4>
        <div class="card w-full mh-100">
            <div class="card-body" v-if="visible">
                <div class="d-flex flex-row w-full pb-2">
                    <h5 class="card-title">Lista de perfis</h5>
                    <span class="ml-auto">
                        <button v-if="permission('profiles-store')" @click="$router.push('/profiles/create')"
                                class="btn btn-primary btn-sm">Novo perfil</button>
                    </span>
                </div>
                <div class="table-responsive-sm">
                    <div v-if="data.length">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Total de acessos</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in data" :key="item.id">
                                <td>{{item.name}}</td>
                                <td>{{item.role.length}}</td>
                                <td class="text-right">
                                    <button v-if="!permission('profiles-edit') && permission('profiles-view')"
                                            @click="editUser(item.uuid)" type="button" class="btn btn-info btn-sm">
                                        Visualizar
                                    </button>
                                    <button v-if="permission('profiles-edit')" @click="editUser(item.uuid)"
                                            type="button"
                                            class="btn btn-primary btn-sm">Editar
                                    </button>
                                    <button v-if="permission('profiles-destroy')" @click="deleteItem(item)"
                                            type="button"
                                            class="btn btn-danger btn-sm">Excluir
                                    </button>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                        <div class="pagination w-100" v-if="pagination.total > pagination.per_page">
                            <vs-pagination :sizeArray="pagination.last_page" :total="pagination.last_page" :maxItems="5"
                                           v-model="currentPage" prev-icon="arrow_back"
                                           next-icon="arrow_forward"></vs-pagination>
                        </div>
                    </div>
                    <div v-else>
                        <p>Nenhum perfil cadastrado</p>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL-->
        <vs-popup title="Excluir loja" :active.sync="modalDelete">
            <p>Deseja excluir o perfil <b>{{modalData.name}}</b>?</p>
            <vs-divider></vs-divider>
            <button @click="sendDelete(modalData.uuid)" type="button" class="btn btn-primary btn-sm">Sim</button>
            <button @click="modalDelete = false" type="button" class="btn btn-danger btn-sm">Não</button>
        </vs-popup>

        <vs-popup title="Aviso" :active.sync="modalMessage">
            <p>{{modalMessageData}}</p>
            <vs-divider></vs-divider>
            <button @click="modalMessage = false" type="button" class="btn btn-danger btn-sm">Ok</button>
        </vs-popup>

    </div>
</template>


<script>
    export default {
        name: 'Profiles',
        components: {},
        data() {
            return {
                visible: false,
                title: this.$route.meta.title || '',
                data: '',
                pagination: {},
                modalDelete: false,
                modalData: '',
                modalMessage: false,
                modalMessageData: '',
                currentPage: 1
            }
        },
        mounted() {
            this.getProfiles();
        },
        watch: {
            currentPage: function (val) {
                this.getProfiles('?page=' + val)
            }
        },
        methods: {
            getProfiles(filtro = '') {
                axios.get('/api/v1/profiles' + filtro).then(response => {
                    this.pagination = response.data;
                    this.data = response.data.data;
                }).then(() => {
                    this.visible = true;
                }).catch(() => {
                    this.visible = true;
                })
            },
            deleteItem(data) {
                this.modalData = data;
                this.modalDelete = true;
            },
            editUser(uuid) {
                this.$router.push(`/profiles/${uuid}/edit`);
            },
            sendDelete(uuid) {
                this.modalDelete = false;
                axios.delete('/api/v1/profiles/' + uuid).then(response => {
                    this.modalMessage = true;
                    this.modalMessageData = response.data.data;
                    this.getProfiles();
                }).catch(error => {
                    this.modalMessage = true;
                    this.modalMessageData = error.response.data.data;
                });
            },
            permission(rule) {
                return checkPermission(rule);
            }
        }
    }
</script>
