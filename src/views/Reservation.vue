/* eslint-disable vue/no-unused-vars */
<template>
    <div class="container">
        <div class="row">
            <form class="crd col-8">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Date</label>
                    <input
                        type="date"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="date"
                        v-model="date"
                    />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Horaire</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option selected disabled>choisir un horaire</option>
                        <option
                            v-for="(el, index) in horairesPr"
                            :key="index"
                            :disabled="el.etat"
                        >
                            {{ el.val }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"
                        >Decrir le sujet de rdv</label
                    >
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="3"
                    ></textarea>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
/* eslint-disable */
export default {
    name: "Reservation",
    data() {
        return {
            date: "",
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
            horaires: [],
        };
    },
    methods: {
        async getTime(val) {
            console.log("im in");
            const response = await fetch(
                "http://localhost/br6-rdv/Api/rdv/afficherHr/" + val
            );
            const data = await response.json();
            this.horaires = data;
        },
    },
    watch: {
        date: async function (val) {
            await this.getTime(val);
            //    await (console.log(this.horaires.length));
            for (var i = 0; i < this.horairesPr.length; i++) {
                for (var j = 0; j < this.horaires.length; j++) {
                    if (this.horairesPr[i].val == this.horaires[j]) {
                        console.log( this.horairesPr[i].etat);
                        this.horairesPr[i].etat = true;
                        console.log(i+"///eg///"+ this.horairesPr[i].etat);
                        // break;
                    }
                    else{
                        this.horairesPr[i].etat = false;
                        console.log(i+"//////"+ this.horairesPr[i].etat);
                    }

                }
                // console.log( this.horairesPr[i].etat);
            }
        },
    },
};
</script>
<style>
.crd {
    position: absolute;
    top: 20%;
    left: 20%;
}
</style>
