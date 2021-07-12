<template>

    <form @submit.prevent="submit" id="login-form">
        <div>
            <breeze-label for="email" value="Email" />
            <breeze-input id="email" type="email" class="form-control" v-model="form.email" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <breeze-label for="password" value="Password" />
            <breeze-input id="password" type="password" class="form-control" v-model="form.password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <breeze-checkbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Forgot your password?
            </inertia-link>

            <breeze-button  class="btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </breeze-button>
        </div>
    </form>
    <div id="login-status">
        <breeze-validation-errors class="input-group has-validation" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
    </div>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from "@/Layouts/Guest"
    import BreezeInput from '@/Components/Input'
    import BreezeCheckbox from '@/Components/Checkbox'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {


        components: {
            BreezeButton,
            BreezeInput,
            BreezeCheckbox,
            BreezeLabel,
            BreezeValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
            }
        }
    }
</script>
