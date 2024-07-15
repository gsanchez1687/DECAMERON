import Axios from "axios";
import path from "path";
const config: any = useRuntimeConfig();

const api = Axios.create({
    baseURL: config.public.baseURL,
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
    },
  });


  export default {

    //Guarda un nuevo hotel
    saveHotel(formData: Object) {
        return api.post(`/api/hotel/store`, formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          });
      },

      //Obtiene todos los hoteles
      getHotels(){
        return api.get(`/api/hotel/all`);
      }


  }
