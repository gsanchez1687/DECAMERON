<template>
    <div class="page-body">
        <CommonBreadcrumb title="Add Agent" page="Agents"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Add agent details</h5>
                        </div>
                        <div class="card-body admin-form">
                            <form class="row gx-3">
                                <CommonInputfieldsTextfield label="First name" placeholder="enter your name" classes="col-md-4 col-sm-6" star="*"/>
                                <CommonInputfieldsTextfield label="Last name" placeholder="enter your surname" classes="col-md-4 col-sm-6" star="*"/>
                                <CommonInputfieldsStatusfield label="Gender" show="Gender" classes="col-md-4 col-sm-6" :data="Gender" star="*"/>
                                <CommonInputfieldsNumberfield label="Phone number" placeholder="enter your mobile number" classes="col-md-4 col-sm-6" star="*"/>
                                <div class="col-md-4 col-sm-6">
                                    <label>Date of birth <span class="font-danger">*</span></label>
                                    <VueDatePicker v-model="date"></VueDatePicker>                                    
                                </div>
                                <CommonInputfieldsTextfield label="Email Address" type="email" placeholder="enter your email" classes="col-md-4 col-sm-6" star="*"/>
                                <CommonInputfieldsTextfield label="Password" type="password" placeholder="Enter your password" classes=" col-sm-6" star="*"/>
                                <CommonInputfieldsTextfield label="Confirm Password" type="password" placeholder="Enter your password" classes=" col-sm-6" star="*"/>
                                <CommonInputfieldsTextarea classes="col-sm-12" label="Description" />
                                <CommonInputfieldsTextfield label="Address" placeholder="Enter your Address" classes=" col-sm-6" star="*"/>
                                <CommonInputfieldsNumberfield label="Zip code" placeholder="Enter pin code" classes="col-sm-6" star="*"/>
                                <div class="dropzone-admin">
                                    <label>Media</label>
                                    <DropZone  :maxFiles="Number(10000000000)"  url="http://localhost:5000/item" :uploadOnDrop="true" :multipleUpload="true" class="p-3" :parallelUpload="3"/>
                                </div>
                                <div class="form-btn">
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
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
let Gender:string[] = ['Male' , 'Female']
let date = ref()
</script>

<style scoped>

</style>