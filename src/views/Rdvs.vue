<template>
    <!-- eslint-disable -->
    <div class="container-fluid affcont">
        <div class="row">
            <router-link :to="{ path: '/'}">
                retour</router-link
            >
        </div>
        <div class="row">
            <div class="col-9" style="text-align:left">
            reference:{{ref}}
            </div>
            <div class="col-3 ">
            <router-link class="btn btn-primary" style="width:10vh" :to="{ path: '/reservation/' + ref }">+</router-link>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive tabcont">
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
                                <td><input v-model="editClient.date" type="date"></td>
                                <td><input v-model="editClient.horaire" type="text"></td>
                                <td><input v-model="editClient.typeCons" type="text"></td>
                                <td><button class="btn btn-danger btn-sm rounded-0" @click="update();" >Enregistrer</button> &nbsp;<button class="btn btn-info btn-sm rounded-0" @click="cancel();">Annuler</button></td>
                            </template>
                            <template v-else>
                                <td>{{ elemt.date }}</td> 
                                <td>{{ elemt.horaire }}</td>  
                                <td>{{ elemt.typeCons }}</td>
                                <td><button class="btn btn-danger btn-sm rounded-0" @click="slectU(elemt.id); del();" >supprimer</button> &nbsp;<button class="btn btn-info btn-sm rounded-0" @click="edit(elemt.id);">modifier</button></td>
                            </template>
                        </tr>
                    </tbody>
                </table>
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
          curentElment:'',
          editReser:'',
          editClient:{
              id:'',
              date:'',
              horaire:'',
              typeCons:''
          }
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
    edit(x){
        fetch('http://localhost/br6-rdv/Api/rdv/getoneRdv/'+x)
        .then(response => response.json())
        .then(data =>{
            this.editReser=data.id;
            this.editClient.id=data.id;
            this.editClient.date=data.date;
            this.editClient.horaire=data.horaire;
            this.editClient.typeCons=data.typeCons;
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
    }
  }
 
};
</script>
<style>
        .affcont{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    
    .btn-info{color:#fff;}
    </style>
