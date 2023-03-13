<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <!-- <h2>Section title</h2> -->
          <h2 class="h5 page-title mt-3">مرحبا {{ user.name }} !</h2>
          <p class="text-muted">مرحبا بك في لوحة التحكم الخاصة بموقع المنى للتسويق</p>

          <div class="row mt-5">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.users }}</span>
                      <p class="small text-muted mb-2">عدد المسؤولين</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-user text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.team }}</span>
                      <p class="small text-muted mb-2">عدد الأعضاء</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-users text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.partners }}</span>
                      <p class="small text-muted mb-2">المحافظات</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-user-plus text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.articles }}</span>
                      <p class="small text-muted mb-2">الأقسام الرئيسية</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-book-open text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.appCats }}</span>
                      <p class="small text-muted mb-2">الأقسام الفرعية</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-tag text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.apps }}</span>
                      <p class="small text-muted mb-2">عدد المنتجات</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-code text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- .row -->
    </div>
    <footer>
      <p class="text-center">كل الحقوق محفوظة</p>
    </footer>
  </main>
</template>

<script>
import loadingPage from "./layouts/laoding.vue";

export default {
  name: "home",
  components: { loadingPage },
  data() {
    return { user: {}, data: {}, loading: false };
  },
  mounted() {
    this.getUser();
    this.getData();
  },
  methods: {
    async getUser() {
      this.loading = true;
      await axios
        .get(`api/user`)
        .then((res) => {
          this.user = res.data;
        })
        .catch(() => {
          //   this.$router.push({ name: "error500" });
        });
      this.loading = false;
    },
    async getData() {
      this.loading = true;
      await axios
        .get(`/api/dash/all`)
        .then((res) => {
          this.data = res.data;
        })
        .catch(() => {
          //   this.$router.push({ name: "error500" });
        });
      this.loading = false;
    },
  },
};
</script>

<style></style>
