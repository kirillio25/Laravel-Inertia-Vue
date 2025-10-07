<script setup>
import { useForm, Head, Link } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onError: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login" />

    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Вход</h2>

        <form @submit.prevent="submit" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    v-model="form.email"
                    class="form-control"
                    placeholder="Введите email"
                />
                <div v-if="form.errors.email" class="text-danger small">
                    {{ form.errors.email }}
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input
                    type="password"
                    id="password"
                    v-model="form.password"
                    class="form-control"
                    placeholder="Введите пароль"
                />
                <div v-if="form.errors.password" class="text-danger small">
                    {{ form.errors.password }}
                </div>
            </div>

            <div class="form-check mb-3">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember"
                    v-model="form.remember"
                />
                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    Нет аккаунта?
                    <Link :href="route('register')" class="text-decoration-none">
                        Зарегистрироваться
                    </Link>
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                    :disabled="form.processing"
                >
                    Войти
                </button>
            </div>
        </form>
    </div>
</template>
