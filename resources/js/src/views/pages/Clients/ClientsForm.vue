<template>
    <div>
        <form @submit.prevent="save" class="needs-validation" novalidate v-if="permission">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" :class="['form-control', isFieldValid('name') ]" v-model="dataResponse.name"
                           id="name"
                           placeholder="Digite o nome "
                           required>
                    <div class="invalid-feedback">
                        {{errorData.name}}
                    </div>
                </div>            
            </div>
            <slot name="buttons"></slot>
        </form>

        <div v-if="!permission && dataResponse">
            <p><b>Nome</b>: {{data.name}}</p>

            <button class="btn btn-danger" @click="$router.push('/clients')">Voltar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "clientsForm",
        props: ['data', 'errors'],
        data() {
            return {
                dataResponse: this.data || {},
                permission: checkPermission('clients-edit'),
                errorData: {}
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
        }
    }
</script>

<style scoped>

</style>