import { ref } from "vue";

const error = ref(null);
const isPending = ref(false);

async function signUp(name, email, password, password_confirmation) {
    error.value = null;
    isPending.value = true;
    try {
        await axios.get("/sanctum/csrf-cookie");
        await axios.post("/register", {
            name,
            email,
            password,
            password_confirmation,
        });
    } catch (e) {
        if (e.response.status === 422) {
            error.value = e.response.data.errors;
        } else {
            error.value = "Something went wrong";
        }
    } finally {
        isPending.value = false;
    }
}

export function useSignUp() {
    return { error, isPending, signUp };
}
