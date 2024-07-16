<template>
    <div class="page-body">
        <CommonBreadcrumb title="Dashboard" page="Dashboard"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 large-12">
                    <div class="row">
                        <div class="large-6 col-xl-12 col-md-6">
                            <div class="card all-properties">
                                <div class="card-body">
                                    <div class="media">
                                        <img src="/image/svg/icon/1.svg" class="img-fluid" alt="">
                                        <div class="media-body">
                                            <h4 class="mb-0">{{ count }}</h4>
                                            <h6 class="light-font">Hoteles</h6>
                                        </div>
                                        <nuxt-link to="/myproperties/propertylist" class="arrow-animated">
                                            Listar todos los hoteles
                                           <Icon name="material-symbols:chevron-right"  class="fs-2"/>
                                        </nuxt-link>
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
import { on } from "events";
import { ref, onMounted } from "vue";

// Variable reactiva que almacena el número de hoteles
const count = ref(0);


// Este código se ejecuta cuando el componente se monta en el DOM
onMounted(async () => {
    try {
        // Importa el módulo de servicios desde "@/services/services"
        const services = await import("@/services/services");
        // Realiza una petición para obtener el número de hoteles
        const res = await services.default.getHotelCount();
        // Asigna el resultado de la petición al valor de la variable "count"
        count.value = res.data;
    } catch (err) {
        // Si ocurre un error, se muestra en la consola
        console.log(err);
    }
});
</script>

<style scoped>

</style>