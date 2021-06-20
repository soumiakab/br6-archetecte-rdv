<template>
  <!-- eslint-disable -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 cont new">
        <router-link to="/inscription" class="btn" tag="button"
          >Nouveau Client</router-link
        >
      </div>
      <div class="col-6 cont old">
        <router-link to="/Reference" class="btn" tag="button"
          >Client Fidel</router-link
        >
      </div>
    </div>
  </div>
</template>
<script>
/* eslint-disable */
export default {
  name: "Home",
};
</script>
<style>
.cont {
  height: 100vh;
  text-align: center;
}
.cont button {
  position: relative;
  top: 50%;
  color: #fff;
  font-weight: bold;
  font-size: 5vh;
}
.new {
  background-color: #2475a0;
}
.old {
  background-color: #67e1e2;
}
</style>
