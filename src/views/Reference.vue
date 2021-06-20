<template>
    <div class="container-fluid">
        <div class="row">
            <router-link :to="{ path: '/' }"> retour</router-link>
        </div>
        <div class="row containref">
            <div class="col-6 infos">
                <div class="row" v-if="ref">
                    <label for="inputEmail4">Votre Referenciel : </label
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
                    <label for="inputEmail4">Votre Referenciel :</label
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
        search() {
            fetch(
                "http://localhost/br6-rdv/Api/Utilisateur/getone/" + this.refl
            )
                .then((response) => response.json())
                .then((data) => {
                    if (data.message) {
                        this.erreur = data.message;
                        console.log(this.erreur);
                    } else {
                        // console.log("done");

                        this.$router.push("/rdv/" + this.refl);
                    }
                });
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
}
.btnref {
    /* width: 50vh; */
    /* float: right; */
    margin-top: 9%;
    align-content: center;
}
</style>
