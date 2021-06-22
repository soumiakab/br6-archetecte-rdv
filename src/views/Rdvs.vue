<template>
    <!-- eslint-disable -->
    <div class="container-fluid affcont">
        <div class="row">
            <router-link :to="{ path: '/'}">
                retour</router-link
            >
        </div>
        <div class="row rdvherd">
            <div class="col-10" style="text-align:left">
           
            </div>
            <div class="col-2 ">
            <router-link class="btn btn-primary" style="width:10vh" :to="{ path: '/reservation/' + ref }">+</router-link>
            </div>
        </div>
        <div class="row">
            <div class="card-body">
                Reference : {{ref}}
        <div class="table-responsive">
          <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Type Consultation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="elemt in rdvs" v-bind:key="elemt.id">
                            <template v-if="editClient.id == elemt.id">
                                <td><input v-model="date" type="date"></td>
                                <!-- <td><input v-model="editClient.horaire" type="text"></td> -->
                                <td> <select
                        class="form-control"
                        id="exampleFormControlSelect1"
                        v-model="editClient.horaire"
                    >
                        <option disabled>choisir un horaire</option>
                        <option
                            v-for="(el, index) in horairesPr"
                            :key="index"
                            :disabled="el.etat"
                        >
                            {{ el.val }}
                        </option>
                    </select> </td>
                                <td><input v-model="editClient.typeCons" type="text"></td>
                                <td><button class="btn btn-success btn-sm rounded-0" @click="update();" > <i class="fa fa-check"></i></button> &nbsp;<button class="btn btn-sm rounded-0" @click="cancel();"> <i class="fa fa-ban"></i></button></td>
                            </template>
                            <template v-else>
                                <td>{{ elemt.date }}</td> 
                                <td>{{ elemt.horaire }}</td>  
                                <td>{{ elemt.typeCons }}</td>
                                <td><button class="btn btn-danger btn-sm rounded-0" @click="slectU(elemt.id); del();" ><i class="fa fa-trash"></i></button> &nbsp;<button class="btn btn-primary btn-sm rounded-0" @click="edit(elemt.id);"><i class="fa fa-pencil fa-fw" aria-hidden="true" style="color:#fff;"></i> </button></td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
/* eslint-disable */
export default {
    name: "RendezVous",
  data(){
      return{
          rdvs:[],
          ref:'',
          date: '',
          curentElment:'',
          editReser:'',
          editClient:{
              id:'',
              date:'',
              horaire:'',
              typeCons:''
          },
            horairesPr: [
                { val: "08:00-09-00", etat: false },
                { val: "09:00-10-00", etat: false },
                { val: "10:00-11-00", etat: false },
                { val: "11:00-12-00", etat: false },
                { val: "13:00-14-00", etat: false },
                { val: "14:00-15-00", etat: false },
                { val: "15:00-16-00", etat: false },
                { val: "16:00-17-00", etat: false },
                { val: "17:00-18-00", etat: false },
            ],
            horaires:[],
      }
  },
  async mounted(){
    await this.refer();
     await this.getAll();
      
  },
  methods:{
    async getAll(){
    const response = await fetch('http://localhost/br6-rdv/Api/rdv/afficherRdv/'+this.ref);
    const data = await response.json();
    console.log(data);
    this.rdvs=data;
    },
    refer(){this.ref = this.$route.params.ref},
    slectU(x){
       this.curentElment=x;
    },

    async del() {
        await fetch('http://localhost/br6-rdv/Api/rdv/supprimerRdv/'+this.curentElment,{
            method:"DELETE",
        });
       await this.getAll();
    },
    async edit(x){
        fetch('http://localhost/br6-rdv/Api/rdv/getoneRdv/'+x)
        .then(response => response.json())
        .then(data =>{
            this.editReser=data.id;
            this.editClient.id=data.id;
            this.editClient.date=data.date;
            this.date=data.date;
            this.editClient.horaire=data.horaire;
            this.editClient.typeCons=data.typeCons;
            this.filtrerH(data.date);
            // console.log(this.editClient.horaire);
        })
    },
   async update(){
        console.log(JSON.stringify(this.editClient));
       await fetch(' http://localhost/br6-rdv/Api/rdv/modifierRdv/'+this.editClient.id,{
            method: 'PUT',
            headers:{
                'Content-Type': 'application/json',
            },
            body:JSON.stringify(this.editClient),
        });
        await this.getAll();
        this.editReser='';
        this.editClient.id='';
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeCons='';
        console.log(JSON.stringify(this.editClient));
        
    },
    cancel(){
        this.editReser='';
        this.editClient.id=''
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeCons='';
    },
     async getTime(val) {
            console.log("im in");
            const response = await fetch(
                "http://localhost/br6-rdv/Api/rdv/afficherHr/" + val
            );
            const data = await response.json();
            this.horaires = data;
        },
         async filtrerH (val) {
            console.log("eeeeeeee");
            await this.getTime(val);
            await (this.editClient.date = val);
            await (this.editClient.reference = this.$route.params.ref);
            await console.log(this.editClient);
            //    await (console.log(this.horaires.length));
             for (var i = 0; i < this.horairesPr.length; i++) {
                await (this.horairesPr[i].etat = false);
                for (var j = 0; j < this.horaires.length; j++) {
                    if (this.horairesPr[i].val == this.horaires[j]) {
                        // console.log(this.horairesPr[i].etat);
                         await (this.horairesPr[i].etat = true);
                        console.log( this.horaires[j] + "///eg///");
                       
                    }
                }
            }
        }
  },
  watch: {
        date: async function (val) {
            this.editClient.horaire = "choisir un horaire";
            this.filtrerH (val);
        },
    },
 
};
</script>
<style>
        .affcont{
            position: absolute;
            /* top: 10%; */
            padding: 5%;
            /* left: 5%; */
            /* transform: translate(-50%, -50%); */
        }
    .rdvherd{
        height: 20vh;
    }
    .btn-info{color:#fff;}
    table th{
        color: #2475a0;
    }

    </style>
