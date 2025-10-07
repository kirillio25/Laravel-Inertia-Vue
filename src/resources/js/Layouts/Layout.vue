<script setup>
</script>

<template>
    <Head>

    </Head>
    <div>
        <header class="bg-light py-2 mb-3">
            <nav class="container d-flex justify-content-start">


                <div v-if="$page.props.auth.user">
                    <span class="fw-semibold me-5">{{ $page.props.auth.user.name }}</span>
                    <img
                        :src="$page.props.auth.user?.avatar
                        ? `/storage/${$page.props.auth.user.avatar}`
                        : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'"
                        alt="User avatar"
                        class="img-thumbnail rounded-circle"
                        style="width: 50px; height: 50px; object-fit: cover;"
                    >


                    <Link :href="route('logout')" method="post" as="button" type="button"
                          class="text-decoration-none me-2 text-dark">Logout
                    </Link>
                    <Link :href="route('home')"  class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Home'}">Home
                    </Link>
                    <Link :href="route('dashboard')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Dashboard'}">Dashboard
                    </Link>
                    <Link :href="route('about')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'About'}">About
                    </Link>
                </div>
                <div v-else>
                    <Link :href="route('register')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Auth/Register'}">Register</Link>
                    <Link :href="route('login')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Auth/Login'}">Login</Link>
                </div>
            </nav>
        </header>

        <main class="container">
            <slot />
        </main>
    </div>
</template>



