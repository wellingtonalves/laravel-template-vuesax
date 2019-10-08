<template>
    <div>
        <h4 class="title-page">{{title}}</h4>
        <div class="card w-full mh-100">
            <div class="card-body" v-if="visible">
                <div class="d-flex flex-row w-full pb-2">
                    <h5 class="card-title">Lista</h5>
                    <span class="ml-auto">
                        <button v-if="permission('products-store')" @click="$router.push('/products/create')"
                                class="btn btn-primary btn-sm">Novo</button>
                    </span>
                </div>
                <div class="table-responsive-sm">
                    <div v-if="data.length">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Nome</td>
                                <td class="text-right"></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in data" :key="item.id">
                                <td>{{item.name}}</td>
                                <td class="text-right">
                                    <button v-if="!permission('products-edit') && permission('products-view')"
                                            @click="editUser(item.uuid)" type="button" class="btn btn-info btn-sm">
                                        Visualizar
                                    </button>
                                    <button v-if="permission('products-edit')" @click="editUser(item.uuid)" type="button"
                                            class="btn btn-primary btn-sm">Editar
                                    </button>
                                    <button v-if="permission('products-destroy')" @click="deleteItem(item)" type="button"
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
                        <p>Nenhum registro encontrado</p>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL-->
        <vs-popup title="Excluir registro" :active.sync="modalDelete">
            <p>Deseja excluir o registro <b>{{modalData.name}}</b>?</p>
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
            this.getAll();
        },
        watch: {
            currentPage: function (val) {
                this.getAll('?page=' + val)
            }
        },
        methods: {
            getAll(filtro = '') {
                axios.get('/api/v1/products' + filtro).then(response => {
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
                this.$router.push(`/products/${uuid}/edit`);
            },
            sendDelete(uuid) {
                this.modalDelete = false;
                axios.delete('/api/v1/products/' + uuid).then(response => {
                    this.modalMessage = true;
                    this.modalMessageData = response.data.data;
                    this.getAll();
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
