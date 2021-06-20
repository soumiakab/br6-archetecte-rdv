import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Rendv from "../views/Rdvs.vue";
import Inscription from "../views/Inscription.vue";
import Reference from "../views/Reference.vue";
import Reservation from "../views/Reservation.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/rdv/:ref",
    name: "RendezVous",
    component: Rendv,
  },
  {
    path: "/inscription",
    name: "Inscription",
    component: Inscription,
  },
  {
    path: "/reference/:ref",
    name: "Reference",
    component: Reference,
  },
  {
    path: "/reference",
    name: "Reference",
    component: Reference,
  },
  {
    path: "/reservation/:ref",
    name: "Reservation",
    component: Reservation,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
