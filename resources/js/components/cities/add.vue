<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">إضافة محافظة جديدة</h2>

      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إضافة محافظة جديدة</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">الاسم بالعربية</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.name"
                  />
                  <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الاسم بالإنجليزية</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.name_en"
                  />
                  <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">سعر الشحن</label>
                  <input
                    type="text"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                    v-model="form.price"
                  />
                  <span class="text-danger" v-if="errors.price">{{
                    errors.price[0]
                  }}</span>
                </div>
                <button
                  type="submit"
                  class="btn"
                  style="
                    background-color: #e4b75d;
                    color: aliceblue;
                    width: 100px;
                    font-weight: 600;
                  "
                >
                  تأكيد
                </button>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <img src="@/assets/signup.gif" alt="" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
import loadingPage from "../layouts/laoding.vue";

export default {
  name: "add_user",
  components: { loadingPage },
  data() {
    return {
      loading: false,
      form: {
        name: "",
        name_en: "",
        price: "",
      },
      errors: [],
    };
  },
  mounted() {},
  methods: {
    alert() {
      var toastMixin = this.$swal.mixin({
        toast: true,
        icon: "success",
        title: "General Title",
        animation: false,
        position: "top-right",
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
      });
      toastMixin.fire({
        animation: true,
        title: "تم إضافة المحافظة بنجاح",
      });
    },
    async saveForm() {
      this.loading = true;
      await axios
        .post(`api/dash/city/add`, this.form)
        .then(() => {
          this.$router.push({ name: "cities" });
          this.alert();
        })
        .catch((error) => {
          consle.log(error);
          this.errors = error.response.data.errors;
        });
      this.loading = false;
    },
  },
};
</script>

<style></style>
