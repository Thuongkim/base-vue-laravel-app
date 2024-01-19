import { ref } from "vue";

const error = ref(null);
const isPending = ref(false);

async function signIn(email, password) {
    error.value = null;
    isPending.value = true;
    try {
        await axios.get("/sanctum/csrf-cookie");
        await axios.post("/login", { email, password });
    } catch (e) {
        if (e.response.status === 422) {
            error.value = "Wrong email or password";
        } else {
            error.value = "Something went wrong";
        }
    } finally {
        isPending.value = false;
    }
}

export function useSignIn() {
    return { error, isPending, signIn };
}
