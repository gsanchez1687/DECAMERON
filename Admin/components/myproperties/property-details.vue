<template>
    <div class="property-details">
        <span class="font-roboto">{{ data.address }}</span>
        <nuxt-link to="https://sheltos-vue.vercel.app/property/single-property-8">
            <h3>{{ data.name }}</h3>
        </nuxt-link>
        <h6>{{ data.phone }}</h6>
        <h6>Habitaciones: {{ data.maximum_rooms }}</h6>
        <p class="font-roboto light-font">{{ data.description }}</p>
        <div class="property-btn d-flex">
            <span>{{ data.date }}</span>
            <nuxt-link to="https://sheltos-vue.vercel.app/property/single-property-8">
                <button type="button" class="btn btn-dashed btn-pill color-2">Detalles</button>
            </nuxt-link>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps({
    data:Object
})
</script>

<style scoped>

</style>