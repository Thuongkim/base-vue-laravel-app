<template lang="html">
    <div class="mt-8">
        <div class="container mx-auto px-8">
            <!-- Start error -->
            <div
                v-if="error && typeof error === 'string'"
                class="text-center text-red mt-4"
            >
                <span>{{ error }}</span>
            </div>
            <!-- Start form -->
            <form
                class="flex flex-col justify-start space-y-6"
                @submit.prevent="onRegister()"
            >
                <div class="row">
                    <label class="flex flex-col items-center" for="fullName">
                        <span class="w-1/2">Full Name</span>
                        <input
                            id="fullName"
                            class="px-4 py-3 rounded-lg mt-1 border border-gray-100 w-1/2"
                            type="text"
                            placeholder="Full name"
                            v-model="name"
                        />
                        <span
                            v-if="error && error.name"
                            class="text-red w-1/2 mt-2"
                            >{{ error.name[0] }}</span
                        >
                    </label>
                </div>
                <div class="row">
                    <label class="flex flex-col items-center" for="email">
                        <span class="w-1/2">Email Address</span>
                        <input
                            id="email"
                            class="px-4 py-3 rounded-lg mt-1 border border-gray-100 w-1/2"
                            type="email"
                            placeholder="Email Address"
                            v-model="email"
                        />
                        <span
                            v-if="error && error.email"
                            class="text-red w-1/2 mt-2"
                            >{{ error.email[0] }}</span
                        >
                    </label>
                </div>
                <div class="row">
                    <label class="flex flex-col items-center" for="password">
                        <span class="w-1/2">Password</span>
                        <input
                            id="password"
                            class="px-4 py-3 rounded-lg mt-1 border border-gray-100 w-1/2"
                            type="password"
                            placeholder="Password"
                            v-model="password"
                        />
                        <span
                            v-if="error && error.password"
                            class="text-red w-1/2 mt-2"
                            >{{ error.password[0] }}</span
                        >
                    </label>
                </div>
                <div class="row">
                    <label
                        class="flex flex-col items-center"
                        for="password_confirmation"
                    >
                        <span class="w-1/2">Password Confirmation</span>
                        <input
                            id="password_confirmation"
                            class="px-4 py-3 rounded-lg mt-1 border border-gray-100 w-1/2"
                            type="password"
                            placeholder="Password Confirmation"
                            v-model="password_confirmation"
                        />
                        <span
                            v-if="error && error.password_confirmation"
                            class="text-red w-1/2 mt-2"
                            >{{ error.password_confirmation[0] }}</span
                        >
                    </label>
                </div>
                <div class="row text-center justify-center">
                    <button
                        type="submit"
                        class="py-3 text-center bg-primary text-white rounded-lg font-bold w-1/6"
                    >
                        {{ isPending ? "Loading..." : "Sign up" }}
                    </button>
                </div>
            </form>

            <!-- Start text -->
            <div class="w-full text-center mt-6">
                <span class="font-semibold">I'm already a member.</span>
                <span class="ml-1"
                    ><router-link
                        :to="{ name: 'login' }"
                        class="text-primary font-bold"
                        >Sign in</router-link
                    ></span
                >
            </div>
        </div>
    </div>
</template>
<script>
import { ref } from "vue";
import { useSignUp } from "@/composables/useSignUp";
import { useRouter } from "vue-router";

export default {
    setup() {
        const router = useRouter();
        const { error, isPending, signUp } = useSignUp();
        const name = ref("");
        const password_confirmation = ref("");
        const email = ref("");
        const password = ref("");
        async function onRegister() {
            await signUp(
                name.value,
                email.value,
                password.value,
                password_confirmation.value
            );
            if (!error.value) {
                router.push({ name: "home" });
            }
        }
        return {
            name,
            email,
            password,
            password_confirmation,
            error,
            isPending,
            onRegister,
        };
    },
};
</script>
<style lang=""></style>
