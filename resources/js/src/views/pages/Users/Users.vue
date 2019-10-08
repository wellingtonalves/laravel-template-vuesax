<template>
    <div>
        <h4 class="title-page">{{title}}</h4>
        <div class="card w-full mh-100">
            <div class="card-body" v-if="visible">
                <div class="d-flex flex-row w-full pb-2">
                    <h5 class="card-title">Lista de usuários</h5>
                    <span class="ml-auto">
                        <button v-if="permission('users-store')" @click="$router.push('/users/create')"
                                class="btn btn-primary btn-sm">Novo usuário</button>
                    </span>
                </div>
                <div class="table-responsive-sm">
                    <div v-if="data.length">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Login</td>
                                <td>Tipo</td>
                                <td>Perfil</td>
                                <td>Status</td>
                                <td class="text-right"></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in data" :key="item.id">
                                <td>{{item.name}}</td>
                                <td>{{item.email}}</td>
                                <td>{{item.username}}</td>
                                <td>{{item.tipo_usuario}}</td>
                                <td>{{item.profile ? item.profile.name : ''}}</td>
                                <td>
                            <span :class="['badge p-2', item.status === 'ativo' ? 'badge-primary' : 'badge-danger']">
                                {{item.status}}
                            </span>
                                </td>
                                <td class="text-right">
                                    <button v-if="!permission('users-edit') && permission('users-view')"
                                            @click="editUser(item.uuid)" type="button" class="btn btn-info btn-sm">
                                        Visualizar
                                    </button>
                                    <button v-if="permission('users-edit')" @click="editUser(item.uuid)" type="button"
                                            class="btn btn-primary btn-sm">Editar
                                    </button>
                                    <button v-if="permission('users-destroy')" @click="deleteItem(item)" type="button"
                                            class="btn btn-danger btn-sm">Excluir
                                    </button>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                        <div class="pagination" v-if="pagination.total > pagination.per_page">
                            <vs-pagination :sizeArray="pagination.last_page" :total="pagination.last_page" :maxItems="5"
                                           v-model="currentPage" prev-icon="arrow_back"
                                           next-icon="arrow_forward"></vs-pagination>
                        </div>
                    </div>
                    <div v-else>
                        <p>Nenhum usuário cadastrado</p>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL-->
        <vs-popup title="Excluir usuário" :active.sync="modalDelete">
            <p>Deseja excluir o usuário <b>{{modalData.name}}</b>?</p>
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
            this.getUsers();
        },
        watch: {
            currentPage: function (val) {
                this.getUsers('?page=' + val)
            }
        },
        methods: {
            getUsers(filtro = '') {
                axios.get('/api/v1/users' + filtro).then(response => {
                    this.pagination = response.data;
                    this.data = response.data.data;
                }).then(() => {
                    this.visible = true;
                })
            },
            deleteItem(data) {
                this.modalData = data;
                this.modalDelete = true;
            },
            editUser(uuid) {
                this.$router.push(`/users/${uuid}/edit`);
            },
            sendDelete(uuid) {
                this.modalDelete = false;
                axios.delete('/api/v1/users/' + uuid).then(response => {
                    this.modalMessage = true;
                    this.modalMessageData = response.data.data;
                    this.getUsers();
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
