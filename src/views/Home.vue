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
    <div class="row">
        <img alt="Vue logo" src="../assets/logo1.png"  />

    </div>
  </div>
</template>
<script>
/* eslint-disable */
export default {
  name: "Home",
};
</script>
<style scoped>
.cont {
  /* height: 100vh; */
  position: absolute;
  top:0;
  bottom: 0;
  text-align: center;
  margin: 0;
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
  left: 50%;
}
img{
    z-index: 100;
    width: 20%;
    position: relative;
    left: 40%;
    top:10%;
}
</style>
