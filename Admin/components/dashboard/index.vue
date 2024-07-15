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
                                            <h4 class="mb-0">45</h4>
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
import { baseUrl } from "@/composable/apiurl";
interface property{
    src:string;
    totle:string;
    type:string
}
const {data} = await useFetch(baseUrl+'/data/dashboard.json');
const propertydata:property[] = data.value.properties
</script>

<style scoped>

</style>