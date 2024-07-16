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
let props = defineProps({
    dataHotel:Object
});

function getdataHotel(){
    return props.dataHotel
}
</script>

<style scoped>

</style>