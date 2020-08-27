<template>
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                v-model="data.name"
                :class="{ 'is-invalid': errors.hasOwnProperty('name') }"
            >
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('name')">
                {{ errors.name[0] }}
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input
                type="email"
                class="form-control"
                id="email"
                v-model="data.email"
                :class="{ 'is-invalid': errors.hasOwnProperty('email') }"
            >
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('email')">
                {{ errors.email[0] }}
            </span>
        </div>

        <div class="form-group">
            <label for="question">Question</label>
            <textarea
                class="form-control"
                :class="{ 'is-invalid': errors.hasOwnProperty('question') }"
                id="question"
                v-model="data.question"
            ></textarea>
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('question')">
                {{ errors.question[0] }}
            </span>
        </div>

        <VueLoadingButton
            :styled="true"
            :loading="loading"
            @click.native="submitForm"
        ></VueLoadingButton>

        <div class="alert alert-success my-2" v-if="success">
            Email successfully sent
        </div>
    </form>
</template>

<script>
import VueLoadingButton from 'vue-loading-button'

export default {
    components: {
        VueLoadingButton,
    },
    data () {
        return {
            isLoading: false,
            isSuccess: false,
            data: {
                name: '',
                email: '',
                question: '',
            },
            errors: {}
        }
    },
    methods: {
        submitForm () {
            this.errors = {};
            this.isLoading = true;
            this.isSuccess = false;
            axios.post('/submit', this.data)
                .then(() => this.isSuccess = true)
                .catch(({response}) => {
                    if (response.status === 422) {
                        this.errors = response.data.errors;
                    }
                })
                .finally(() => this.isLoading = false);
        }
    }
}
</script>
