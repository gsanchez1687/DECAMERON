<template>
    <div class="page-body">
        <CommonBreadcrumb title="Edit property" page="My properties"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-header pb-0">
                            <h5>Edit property details</h5>
                        </div>
                        <div class="card-body admin-form">
                            <form class="row gx-3">
                                <CommonInputfieldsTextfield classes="col-sm-4" placeholder="office,villa,apartment" value="villa" label="Property Type"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="status" label="Property Status" show="For Rent"/>
                                <CommonInputfieldsTextfield classes="col-sm-4" placeholder="$2800" label="Property Price" value="$3000"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="rooms" label="Max Rooms" show="3"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="rooms" label="Beds" show="2"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="rooms" label="Baths" show="1"/>
                                <CommonInputfieldsTextfield classes="col-sm-4" placeholder="85 sq ft" label="Area" vlaue="85 sq ft"/>
                                <CommonInputfieldsTextfield classes="col-sm-4" placeholder="$3000" label="Price" value="$3000"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="agency" label="Agencies" show="Premiere"/>
                                <CommonInputfieldsTextarea classes="col-sm-12" label="Description" value="Air conditioning unit, new furnace, all appliances included. Basement walks out to fenced backyard. Huge deck in back. Lots of updates." />
                                <CommonInputfieldsTextfield classes="col-sm-6" placeholder="Address of your property" label="Address" value="Mina Road, Bur Dubai, Dubai, United Arab Emirates"/>
                                <CommonInputfieldsTextfield classes="col-sm-6" placeholder="39702" label="Zip code" value="39702"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="country" label="Any Country" show="Austria"/>
                                <CommonInputfieldsStatusfield class="col-sm-4" :data="city" label="Any City" show="Amreli"/>
                                <CommonInputfieldsTextfield classes="col-sm-4" placeholder="landmark place name " label="Landmark" value="Bur Dubai, Dubai"/>
                            </form>
                            <div class="dropzone-admin">
                                <label>Media</label>
                                <DropZone  :maxFiles="Number(10000000000)"  url="http://localhost:5000/item" :uploadOnDrop="true" :multipleUpload="true" class="p-3" :parallelUpload="3"/>
                            </div>
                            <form class="row gx-3">
                                <div class="form-group col-sm-12">
                                    <label>video (mp4)</label>
                                    <input type="text" class="form-control" placeholder="mp4 video link" value="https://youtu.be/ATSgwZXOuUo12">
                                </div>
                                <div class="form-group col-sm-12 mb-0">
                                    <label>Additional features</label>
                                    <div class="additional-checkbox">
                                        <label :for="item.c_id" v-for="(item , index) in features" :key="index">
                                            <input class="checkbox_animated color-4" :id="item.c_id" type="checkbox" :checked="item.checked"> {{ item.name }}
                                        </label>
                                        
                                    </div>
                                </div>
                                <div class="form-btn col-sm-12">
                                    <button type="button" class="btn btn-pill btn-gradient color-4">Submit</button>
                                    <button type="button" class="btn btn-pill btn-dashed color-4">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { baseUrl } from "@/composable/apiurl";
interface check{
    c_id:string;
    name:string;
    checked:boolean
}
const {data} = await useFetch(baseUrl+'/data/inputs.json')
const status:string[] = data.value.status
const rooms:number[] = data.value.room
const agency:string[] = data.value.agencies
const country:string[] = data.value.country
const city:String[] = data.value.city
const features:check[] = data.value.features
</script>

<style scoped>

</style>