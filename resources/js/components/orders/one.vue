<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <div class="container-fluid">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
          <h2 class="h5 mb-0">
            <a href="#" class="text-muted"></a> طلب {{ order.name }}
          </h2>
        </div>

        <!-- Main content -->
        <div class="row">
          <div class="col-lg-8">
            <!-- Details -->
            <div class="card mb-4">
              <div class="card-body">
                <div class="mb-3 d-flex justify-content-between">
                  <div>
                    <span class="me-3">{{ order.created_at }}</span>
                    <span class="me-3">#{{ order.id }}</span>
                    <span class="me-3">{{ order.pay_status }}</span>
                    <span class="badge rounded-pill bg-info">{{ order.status }}</span>
                  </div>
                </div>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex mb-2">
                          <div class="flex-shrink-0">
                            <img
                              :src="order.image"
                              alt="image"
                              width="100"
                              class="img-thumbnail"
                            />
                          </div>
                          <div
                            class="flex-lg-grow-1 ms-3"
                            style="margin-right: 20px; margin-top: 5px"
                          >
                            <h6 class="small mb-0">
                              {{ order.name }}
                            </h6>
                            <span class="small">{{ order.name }}</span>
                          </div>
                        </div>
                      </td>
                      <td
                        class="text-end"
                        style="margin-top: 25px; position: absolute; left: 20px"
                      >
                        {{ order.name }}
                      </td>
                    </tr>
                  </tbody>
                  <tfoot style="position: relative; top: 25px; right: 20px">
                    <tr>
                      <td colspan="2">سعر الطلب</td>
                      <td class="text-end" style="position: absolute; left: 20px">
                        {{ order.name }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">سعر الشحن</td>
                      <td class="text-end" style="position: absolute; left: 20px">
                        {{ order.name }}
                      </td>
                    </tr>
                    <tr class="fw-bold">
                      <td colspan="2">الإجمالي</td>
                      <td class="text-end" style="position: absolute; left: 20px">
                        {{ order.name }}
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- Payment -->
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <h3 class="h6">طريقة الدفع</h3>
                    الإجمالي: {{ order.name }} <br />
                    <span class="badge bg-success rounded-pill">{{ order.name }}</span>
                  </div>
                  <div class="col-lg-6">
                    <h3 class="h6">عنوان التوصيل</h3>
                    <address>
                      <strong>{{ order.name }}</strong
                      ><br />
                      <p>{{ order.name }}</p>
                      <p>{{ order.name }}</p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <!-- Customer Notes -->
            <div class="card mb-4">
              <div class="card-body">
                <h3 class="h6">ملاحظات العميل</h3>
                <p>{{ order.name }}</p>
              </div>
            </div>
            <div class="card mb-4">
              <!-- Shipping information -->
              <div class="card-body">
                <h3 class="h6">معلومات الشحن</h3>
                <hr />
                <h3 class="h6">العنوان</h3>
                <address>
                  <strong>{{ order.name }}</strong
                  ><br />
                  <p>{{ order.name }}</p>
                  <p>{{ order.name }}</p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import loadingPage from "../layouts/laoding.vue";
import axios from "axios";

export default {
  name: "one",
  components: { loadingPage },
  data() {
    return {
      order: {},
      loading: false,
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.fetchorder();
  },
  methods: {
    async fetchorder() {
      this.loading = true;
      await axios
        .get(`/api/dash/order/${this.id}`)
        .then((res) => {
          this.order = res.data.order;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },
  },
};
</script>

<style scoped>
.card {
  box-shadow: 0 0.5rem 1rem rgba(18, 38, 63, 0.05) !important;
}
</style>
