<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<style lang="scss">
  @import "./App.scss";
</style>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { $config,  } from "@/services";

@Component({
})
export default class App extends Vue {

  get config() {
    return $config.config;
  }

}
</script>
