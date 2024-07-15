<template>
    <div class="col-xl-4 col-md-6 xl-6" v-for="(item , index) in getdataHotel()" :key="index">
        <div class="property-box">
            <div class="property-image">
            </div>
            <MypropertiesPropertyDetails :data="item"/>
        </div>
    </div>

</template>

<script setup lang="ts">
import { Swiper, SwiperSlide  } from "swiper/vue"
import { Navigation, Pagination } from 'swiper/modules';

let props = defineProps({
    dataHotel:Object
});


let parpagedata = ref<number>(6)
let currentpage = ref<number>(1)
let totalpage:number = Math.ceil(props.dataHotel.length / parpagedata.value);

function getdataHotel(){
    let start = (currentpage.value - 1) * parpagedata.value;
    let end = start + parpagedata.value
    return props.dataHotel.slice(start , end)
}


function pageview(page:number){
currentpage.value = page
}
let modules = [Navigation , Pagination]
</script>

<style scoped>

</style>