<template>
    <div class="container-fluid">
        <div class="row">
            <router-link :to="{ path: '/' }"> retour </router-link>
        </div>
        <div class="row containref">
            <div class="col-6 infos">
                <div class="row" v-if="ref">
                    <label for="inputEmail4">VOTRE REFERENCIEL : </label
                    ><br /><br />
                    <input
                        type="text"
                        class="form-control"
                        id="inputEmail4"
                        :value="ref"
                        placeholder="Votre Referenciel???"
                        readonly
                    />
                    <router-link
                        :to="{ path: '/rdv/' + ref }"
                        class="btn btn-primary btnref"
                        tag="button"
                        >ok</router-link
                    >
                </div>
                <div class="row refcont" v-else>
                    <label for="inputEmail4">VOTRE REFERENCIEL :</label
                    ><br /><br />
                    <input
                        type="text"
                        v-model="refl"
                        class="form-control"
                        id="inputEmail4"
                        placeholder="Votre Referenciel???"
                    />
                    <button class="btn btn-primary btnref" @click="search()">
                        ok
                    </button>
                    <div class="alert alert-danger" role="alert" v-if="erreur">
                        {{ erreur }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
/* eslint-disable */
export default {
    name: "Reference",
    data() {
        return {
            ref: "",
            refl: "",
            erreur: "",
        };
    },
    methods: {
        async search() {
           const response = await fetch(
                "http://localhost/br6-rdv/Api/Utilisateur/getone/" + this.refl
            );
            const data =await response.json();
             
                    if (data.message) {
                        this.erreur = data.message;
                        console.log(this.erreur);
                    } else {

                        this.$router.push("/rdv/" + this.refl);
                    }
               
        },
    },
    mounted: function () {
        this.ref = this.$route.params.ref;
    },
};
</script>
<style scoped>
.infos {
    position: absolute;
    top: 30%;
    left: 20%;
    text-align: center;
    color: #2475a0;
    font-weight: bold;
}
.btnref {
    /* width: 50vh; */
    /* float: right; */
    margin-top: 9%;
    align-content: center;
}
</style>
