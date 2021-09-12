<template>
    <breeze-validation-errors class="mb-4" />

    <form @submit.prevent="submit" id="register-form">
        <div>
            <breeze-label for="name" value="Name" />
            <breeze-input id="name" type="text" class="form-control" v-model="form.name" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <breeze-label for="email" value="Email" />
            <breeze-input id="email" type="email" class="form-control" v-model="form.email" required autocomplete="username" />
        </div>

        <div class="mt-4">
            <breeze-label for="password" value="Password" />
            <breeze-input id="password" type="password" class="form-control" v-model="form.password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <breeze-label for="password_confirmation" value="Confirm Password" />
            <breeze-input id="password_confirmation" type="password" class="form-control" v-model="form.password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="buttons">
            <inertia-link :href="route('login')" class="btn btn-outline-success item">
                Already registered?
            </inertia-link>

            <input type="submit" class="btn btn-outline-primary item" value="Register">
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'
    import Input from "@/Components/Input";

    export default {

        components: {
            Input,
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
