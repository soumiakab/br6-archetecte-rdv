<template>
    <div class="container">
        <div class="row">
            <form class="col-8">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Date</label>
                    <input
                        type="date"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="date"
                    />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Horaire</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>08:00-09-00</option>
                        <option>09:00-10-00</option>
                        <option>11:00-12-00</option>
                        <option>13:00-14-00</option>
                        <option>14:00-15-00</option>
                        <option>15:00-16-00</option>
                        <option>16:00-17-00</option>
                        <option>17:00-18-00</option>
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
export default {
    name: "upfrm",
    props: [],
    data() {
        return {
            rdvs: [],
            curentElment: "",
        };
    },
};
</script>
<style></style>
