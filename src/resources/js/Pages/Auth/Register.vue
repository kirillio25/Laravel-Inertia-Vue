<script setup>

import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const sudmit = () => {
    console.log(form);
    form.post(route("register"), {
        onError: () => form.reset("password", "password_confirmation"), // сбросить форму если есть ошибка
    });
};

</script>
<template>
    <Head title="Register"/>

    <h1>register</h1>

    <form @submit.prevent="sudmit">
        <TextInput
            name="name"
            v-model="form.name"
            :message="form.errors.name"
        />

        <TextInput
            name="email"
            type="email"
            v-model="form.email"
            :message="form.errors.email"
        />

        <TextInput
            name="password"
            type="password"
            v-model="form.password"
            :message="form.errors.password"
        />

        <TextInput
            name="password_confirmation"
            type="password"
            v-model="form.password_confirmation"
        />

        Войти ? <a :href="route('login')">тут</a>

        <button :disabled="form.processing">Зарегистрироваться</button>
    </form>
</template>

