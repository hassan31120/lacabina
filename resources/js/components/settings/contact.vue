<template>
  <p class="pb-5" v-html="settings.contact"></p>
</template>

<script>
import axios from "axios";

export default {
  name: "contact",
  data() {
    return {
      settings: [],
    };
  },
  mounted() {
    this.fetchSettings();
  },
  methods: {
    async fetchSettings() {
      await axios
        .get(`api/dash/settings`)
        .then((res) => {
          this.settings = res.data.settings;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
    },
  },
};
</script>

<style></style>
