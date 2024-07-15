<template>
    <div class="page-body">
        <CommonBreadcrumb title="Agregar Hotel" page="Mis Hoteles"/>
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

                                <div class="col-ms-6 col-md-6">
                                    <label for="room_id" class="form-label">Tipo de Habitaciones</label>
                                    <select v-model="form.room_id" class="form-control" name="room_id" id="room_id">
                                        <option value="">Selecciona una habitacion</option>
                                        <option v-for="room in Rooms" :key="room.id" :value="room.id">{{ room.name }}</option>
                                    </select>
                                </div>

                                <div class="col-ms-6 col-md-6">
                                    <label for="accommodation" class="form-label">Alojamiento</label>
                                    <select v-model="form.accommodation_id" class="form-control" name="room_id" id="room_id">
                                        <option value="">Selecciona un alojamiento</option>
                                        <option v-for="accommodation in Accommodations" :key="accommodation.id" :value="accommodation.id">{{ accommodation.name }}</option>
                                    </select>
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
    description: '',
    room_id: '',
    accommodation_id: ''
});


const Rooms = ref([]);
const Accommodations = ref([]);

onMounted(() => {
    
    services.getRooms().then((res: any) => {
        Rooms.value = res.data;
    });

    services.getAccommodations().then((res: any) => {
        Accommodations.value = res.data;
    });
})





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
    formData.append("room_id", form.value.room_id);
    formData.append("accommodation_id", form.value.accommodation_id);

    //validar que todos los campos esten llenos
    if(form.value.name == '' || form.value.address == '' || form.value.zip_code == '' || form.value.phone == '' || form.value.email == '' || form.value.website == '' || form.value.maximum_rooms == '' || form.value.description == '' || form.value.room_id == '' || form.value.accommodation_id == ''){
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