<template>
    <div class="container-fluid containfos">
        <div class="row">
            <router-link :to="{ path: '/' }"> retour</router-link>
        </div>
        <div class="row">
            <div class="col-8">
                <form class="infos" v-on:submit.prevent="Submt">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="inputEmail4">Nom:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="inputEmail4"
                                placeholder="Nom"
                                v-model="clientData.nom"
                            />
                        </div>
                        <div class="col-6 form-group">
                            <label for="inputPassword4">Prenom:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="inputPassword4"
                                placeholder="prenom"
                                v-model="clientData.prenom"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="inputCity">Email:</label>
                            <input
                                type="email"
                                class="form-control"
                                id="inputCity"
                                v-model="clientData.email"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="inputAddress">Tel:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="inputAddress"
                                placeholder="06-"
                                v-model="clientData.tel"
                            />
                        </div>
                        <div class="col-6 form-group">
                            <label for="inputAddress2">Age:</label>
                            <input
                                type="number"
                                class="form-control"
                                id="inputAddress2"
                                placeholder="Age?"
                                v-model="clientData.age"
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        style="float: right; margin: 20px"
                    >
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Inscription",
    data() {
        return {
            ref: "",
            erer: "",
            clientData: {
                reference: "",
                nom: "",
                prenom: "",
                age: "",
                email: "",
                tel: "",
            },
        };
    },
    methods: {
        async Submt() {
            // GET request using fetch with async/await
            const response = await fetch(
                "http://localhost/br6-rdv/Api/utilisateur/ajouterUtil",
                {
                    method: "POST", // or 'PUT'
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.clientData),
                }
            );
            const data = await response.json();
            this.ref = data.reference;
            console.log(this.ref);
            this.ref = "";
            this.clientData.nom = "";
            this.clientData.prenom = "";
            this.clientData.age = "";
            this.clientData.email = "";
            this.clientData.tel = "";
            this.$router.push("/reference/" + data.reference);
        },
        async Submte() {
            fetch("http://localhost/br6-rdv/Api/utilisateur/ajouterUtil", {
                method: "POST", // or 'PUT'
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(this.clientData),
            })
                .then((response) => response.json())
                .then(function (data) {
                    console.log(data.reference);

                    this.erer = data.reference;
                    console.log(this.erer);
                });
        },
        onSubmit() {
            fetch("http://localhost/br6-rdv/Api/utilisateur/ajouterUtil", {
                method: "POST", // or 'PUT'
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(this.clientData),
            })
                // .then(console.log(JSON.stringify(this.clientData)))
                .then((response) => response.json())
                .then((data) => {
                    this.ref = data.reference;
                    console.log(this.ref + "///dataa///" + data.reference);
                });
            console.log(JSON.stringify(this.clientData));
            this.clientData.nom = "";
            this.clientData.prenom = "";
            this.clientData.age = "";
            this.clientData.email = "";
            this.clientData.tel = "";
            console.log(this.ref + "//console");
            // this.$router.push("/reference/" + this.reference);
        },
    },
};
</script>
<style>
/* .containfos{
            background-color:#2475A0;
            height:100vh;
        } */
div {
    margin-bottom: 20px;
}
.infos {
    color: #fff;
    background-color: #2475a0;
    padding: 40px;
    position: relative;
    top: 30%;
    left: 20%;
}
</style>
