<template>
    <div class="container-fluid">
        <div class="row">
            <router-link :to="{ path: '/' }"> retour</router-link>
        </div>
        <div class="containref">
            <div class="row">
                <div class="col-8 infos">
                    <div class="row" v-if="ref">
                        <label for="inputEmail4">Votre Referenciel</label
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
                            class="btn btn-primary"
                            style="width: 10vh; float: right"
                            tag="button"
                            >ok</router-link
                        >
                    </div>
                    <div class="row" v-else>
                        <label for="inputEmail4">Votre Referenciel</label
                        ><br /><br />
                        <input
                            type="text"
                            v-model="refl"
                            class="form-control"
                            id="inputEmail4"
                            placeholder="Votre Referenciel???"
                        />
                        <button
                            class="btn btn-primary"
                            style="width: 10vh; float: right"
                            @click="search()"
                        >
                            ok
                        </button>
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
        search() {
            fetch("http://localhost/br6-rdv/Api/Utilisateur/getone/" + this.refl)
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
<style>
.infos {
    background-color: #2475a0;
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    position: relative;
    top: 60%;
    left: 20%;
    color: #fff;
}
.infos button {
    margin: 20px;
}
.containref {
    padding: 40px;

    /* height:100vh; */
    /* background-color:#67E1E2; */
}
</style>
