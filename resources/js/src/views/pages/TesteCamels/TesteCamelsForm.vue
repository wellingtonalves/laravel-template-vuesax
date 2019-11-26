<template>
    <div>
        <form @submit.prevent="save" class="needs-validation" novalidate v-if="permission">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" :class="['form-control', isFieldValid('name') ]" v-model="dataResponse.name"
                           id="name"
                           placeholder="Digite name"
                           required>
                    <div class="invalid-feedback">
                        {{errorData['name']}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="cpf">Cpf</label>
                    <input type="text" :class="['form-control', isFieldValid('cpf') ]" v-model="dataResponse.cpf"
                           id="cpf"
                           placeholder="Digite cpf"
                           required>
                    <div class="invalid-feedback">
                        {{errorData['cpf']}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="age">Age</label>
                    <input type="number" :class="['form-control', isFieldValid('age') ]" v-model="dataResponse.age"
                           id="age"
                           placeholder="Digite age"
                           required>
                    <div class="invalid-feedback">
                        {{errorData['age']}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="end_date">End_date</label>
                    <input type="date" :class="['form-control', isFieldValid('end_date') ]" v-model="dataResponse.end_date"
                           id="end_date"
                           placeholder="Digite end_date"
                           required>
                    <div class="invalid-feedback">
                        {{errorData['end_date']}}
                    </div>
                </div>
            </div>
            
            <slot name="buttons"></slot>
        </form>

        <div v-if="!permission && dataResponse">
            <p><b>Nome</b>: {{data.name}}</p>

            <button class="btn btn-danger" @click="$router.push('/teste-camels')">Voltar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "teste-camelsForm",
        props: ['data', 'errors'],
        data() {
            return {
                dataResponse: this.data || {},
                permission: checkPermission('teste-camels-edit'),
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