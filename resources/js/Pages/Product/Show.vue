<script>
    import DefaultTemplate from "@/layouts/DefaultTemplate.vue";
    export default {
        components: {
            DefaultTemplate,
        },
        props:{
          success: null,
          product: Object,
        }
    }
</script>

<template>
    <DefaultTemplate>
        <div style="display: flex;">
                  <div class="grid grid-cols-2 gap-5">
                    <div class="alert alert-success" v-if="$page.props.flash.success">
                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                            <div class="flex-1">
                                {{$page.props.flash.success}}
                            </div>
                        </div>
                    </div>
                    <div v-if="$page.props.flash.success">
                        <br>
                    </div>
                    <div class="card p-6">
                      <div class="flex justify-between mb-4">
                        <a href="#" class="inline-flex leading-5 text-slate-500 dark:text-slate-500 text-sm font-normal">
                          <span>
                                <iconify-icon icon="heroicons-outline:calendar" class="text-slate-400 dark:text-slate-500 ltr:mr-2 rtl:ml-2 text-lg"></iconify-icon>
                            </span>
                          <p>Creation Date</p>
                          <p>{{ new Date(product.created_at).toISOString().slice(0, 10) }}</p>
                        </a>
                      </div>
                      <h5 class="card-title text-slate-900">
                        <p>{{ product.name }}</p>
                      </h5>
                      <div class="card-text dark:text-slate-300 mt-4 space-y-4 leading-5 text-slate-600 text-sm border-b border-slate-100
                            dark:border-slate-700 pb-6" >
                        <div>
                          <p>
                            {{ product.description }}
                          </p>
                        </div>
                          <p class="font-medium text-base">
                            Product Photos
                          </p>
                        <div style="display: flex; gap:20px">
                          <div class="space-y-5" style="overflow-y: auto; width: 60%;">
                            <div style="display: flex; flex-direction: row;">
                              <img v-for="image in product.images" class="h-full" style="height: auto; flex: 0 0 auto;" :src="'/images/' + image.file_name">
                            </div>
                          </div>
                          <div style="background-color: gray; padding: 10px; border-radius: 5px; color: white; display: flex;
                          flex-direction: column; gap: 10px;">
                             <p><strong>SKU:</strong> {{ product.sku }}</p>
                             <p><strong>Type:</strong> {{ product.type }}</p>
                             <p><strong>Name:</strong> {{ product.name }}</p>
                             <p><strong>Price:</strong> {{ product.price }}</p>
                          </div>
                        </div>
                          
                      </div>
                      <div class="mt-6">
                        <ul class="lg:flex items-center lg:space-x-3 lg:rtl:space-x-reverse mt-4 border-b border-slate-100 dark:border-slate-700 pb-6">
                          <li class="dark:text-slate-300">Categories</li>
                          <li>
                            <!-- <p  v-for="image in product.categories" class="text-xs font-normal text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-600 py-1 px-3 rounded-full
                                            hover:bg-slate-900 hover:text-white transition duration-150">
                              <span>Food</span>
                            </p> -->
                          </li>
                        </ul>
                        <ul class="lg:flex items-center lg:space-x-3 lg:rtl:space-x-reverse mt-4 border-b border-slate-100 dark:border-slate-700 pb-6">
                          <li class="dark:text-slate-300">Brands</li>
                          <li>
                            <!-- <p  v-for="image in product.categories" class="text-xs font-normal text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-600 py-1 px-3 rounded-full
                                            hover:bg-slate-900 hover:text-white transition duration-150">
                              <span>Food</span>
                            </p> -->
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
    </DefaultTemplate>
</template>