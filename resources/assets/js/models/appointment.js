export class Appointment {
    static all(){
        axios.get("api/appointments").then(function(response){
            console.log(response.data);
        });
    }

    static find(id){
        axios.get("api/appointments/" + id).then(function(response){

        });
    }
}