<template>
<div class="page-body">
    <CommonBreadcrumb title="Lista de Hoteles" page="Mis Hoteles" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="property-admin">
                    <div class="property-section section-sm">
                        <div class="row ratio_55 property-grid-2 property-map map-with-back">
                            <div class="col-xl-12">
                                <div class="property-2 row column-sm property-label property-grid">
                                    <MypropertiesListing :dataHotel="Hotels" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script setup lang="ts">
import services from "@/services/services";
import { ref, onMounted } from "vue";

// Data
const Hotels = ref([]);

// Get all hotels
onMounted(async () => {
    try {
        const res = await services.getHotels();
        Hotels.value = res.data;
    } catch (err) {
        console.log(err);
    }
});
</script>

<style scoped>

</style>
