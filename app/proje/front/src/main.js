import { createSSRApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import { createRouter } from "./router";
import { createHead } from "@vueuse/head";

import "./assets/main.css";

export function createApp() {
  const app = createSSRApp(App);
  const router = createRouter();
  const pinia = createPinia();
  const head = createHead();
  app.use(router);
  app.use(pinia);
  app.use(head);
  return { app, router, head };
}
