<template>
    <div class="page-body">
        <CommonBreadcrumb title="Registrat Hotel" page="Mis Hoteles"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-header pb-0">
                            <h5>Agregar Hotel</h5>
                        </div>
                        <div class="card-body admin-form">
                            <form class="row gx-3" @submit.prevent="saveHotel">
                                
                                <div class="col-sm-2 col-md-4">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" v-model="form.name" class="form-control" id="name" placeholder="Nombre">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="address" class="form-label">Direccion</label>
                                    <input type="text" v-model="form.address" class="form-control" id="address" placeholder="Direccion">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="address" class="form-label">Codigo postal</label>
                                    <input type="number" v-model="form.zip_code" class="form-control" id="zip_code" placeholder="Codigo postal">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="number" v-model="form.phone" class="form-control" id="phone" placeholder="Teléfono">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" v-model="form.email" class="form-control" id="email" placeholder="Correo">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="website" class="form-label">Web</label>
                                    <input type="text" v-model="form.website" class="form-control" id="website" placeholder="web">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="maximum_rooms" class="form-label">Numero de habitaciones</label>
                                    <input type="number" v-model="form.maximum_rooms" class="form-control" id="maximum_rooms" placeholder="Numero de habitaciones">
                                </div>

                                <div class="col-sm-2 col-md-4">
                                    <label for="description" class="form-label">Descripcion</label>
                                    <input type="text" v-model="form.description" class="form-control" id="description" placeholder="Descripcion">
                                </div>

                                <div class="form-btn col-sm-12">
                                    <button type="button" @click="saveHotel" class="btn btn-pill btn-gradient color-4">Guardar</button>
                                    <button type="button" class="btn btn-pill btn-dashed color-4">Cancelar</button>
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
import { ref } from 'vue';
import services from '@/services/services';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';


const form = ref({
    name: '',
    address: '',
    zip_code: '',
    phone: '',
    email: '',
    website: '',
    maximum_rooms: '',
    description: ''
});

function saveHotel() {
    const formData = new FormData();
    formData.append("name", form.value.name);
    formData.append("address", form.value.address);
    formData.append("zip_code", form.value.zip_code);
    formData.append("phone", form.value.phone);
    formData.append("email", form.value.email);
    formData.append("website", form.value.website);
    formData.append("maximum_rooms", form.value.maximum_rooms);
    formData.append("description", form.value.description);

    //validar que todos los campos esten llenos
    if(form.value.name == '' || form.value.address == '' || form.value.zip_code == '' || form.value.phone == '' || form.value.email == '' || form.value.website == '' || form.value.maximum_rooms == '' || form.value.description == ''){
        toast("Todos los campos son obligatorios", {
            "theme": "auto",
            "type": "error",
            "position": "bottom-center",
            "transition": "slide",
            "dangerouslyHTMLString": true
        })
    }else{
        services.saveHotel(formData).then((response) => {
        toast("Se ha registrado el Hotel", {
            "theme": "auto",
            "type": "success",
            "position": "bottom-center",
            "transition": "slide",
            "dangerouslyHTMLString": true
        }); // ToastOptions
    }).catch((error) => {
        toast("Error al registrar el Hotel", {
            "theme": "auto",
            "type": "error",
            "position": "bottom-center",
            "transition": "slide",
            "dangerouslyHTMLString": true
        })
    });
    }
}
</script>

<style scoped>

</style>