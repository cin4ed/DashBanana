<script>
    import DefaultTemplate from '@/Layouts/DefaultTemplate.vue'
    import { router } from '@inertiajs/vue3'
    export default {
        data () {
            return {
                popUpDelete: false,
                selectedId: 0,
                selectedElement: null
            }
        },
        components: {
            DefaultTemplate,
        },    
        props:{
            shipping_companies: {
                type: Array,
                required: true
            }
        },
        methods: {
            deleteConfirmation (company) {
                this.selectedElement = company
                this.selectedId = company.id
                this.popUpDelete = true
            },
            cancelElimination () {
                this.popUpDelete = false
            },
            confirmElimination () {
                this.popUpDelete = false
                router.delete(`/shipping-companies/${this.selectedId}`)
            }
        }
    }
</script>

<template>
    <div class="relative rounded-lg shadow " id="deletepopup" v-if=popUpDelete style="border-radius: 20px; background-color: white;
        justify-content: center; align-items: center; position: fixed; z-index: 10; top: 50%; left: 50%; transform: translate(-50%,-50%);">
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">
            <h3 class="text-base font-medium text-white dark:text-white capitalize">
                Delete Element
            </h3>
            <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                    dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal" @click="cancelElimination">
                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-6 space-y-4">
        <p class="text-base dark:text-black text-black leading-6">
            Are you sure to delete this element?
        </p>
        <p class="text-base text-slate-600 leading-6">
            Once the element gets deleted, there is no possible way to recover <br> the data without calling an administrator.<br><br>
            Please confirm the element you choose is the one listed below:
            <ul>
                <li><strong>ID: {{ selectedElement.id }}</strong></li>
                <li><strong>Name: {{ selectedElement.name }}</strong></li>
                <li><strong>Creation Date: {{ selectedElement.created_at }}</strong></li>
            </ul>
        </p>
        </div>
            <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
            <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-danger-500"  @click="confirmElimination">Accept</button>
            <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-green-500"  @click="cancelElimination">Cancel</button>
        </div>
    </div>
    <DefaultTemplate>
        <div class="mb-5 flex justify-between">
            <ul class="m-0 p-0 list-none flex gap-2">
                <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                <a href="/" class="flex gap-2">
                    <Icon icon="heroicons-outline:home"></Icon>
                    <Icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></Icon>
                </a>
                </li>
                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                    Shipment Companies
                </li>
            </ul>
            <div>
                <Link href="/shipping-companies/create" class="btn btn-dark m-1 inline-flex justify-center dark:bg-slate-700 dark:text-slate-300 ">
                    <span class="flex items-center">
                        <Icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"/>
                        <span>Add Company</span>
                    </span>
                </Link>
            </div>
        </div>
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
        <div>
            <div>
                <div>
                    <div>
                        <div id="content_layout">
                        <div class=" space-y-5">
                            <div class="card">
                            <header class=" card-header noborder">
                                <h4 class="card-title">Shipment Companies</h4>
                            </header>
                            <div class="card-body px-6 pb-6">
                                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                <span class=" col-span-8  hidden"></span>
                                <span class="  col-span-4 hidden"></span>
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                            <tr>
                                                <th scope="col" class=" table-th ">
                                                    Id
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Shipment Company Name
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Creation Date
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Created By
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Phone
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            <tr v-for="(company, index) in shipping_companies" :key="index">
                                                <td class="table-td">{{ company.id }}</td>
                                                <td class="table-td">
                                                    <span class="flex">
                                                        <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{ company.name }}</span>
                                                    </span>
                                                </td>
                                                <td class="table-td">{{ new Date(company.created_at).toISOString().slice(0, 10) }}</td>
                                                <td class="table-td" v-if="company.create_author">{{ company.create_author.name }}</td>
                                                <td class="table-td" v-else>Unknown</td>
                                                <td class="table-td">{{ company.phone }}</td>
                                                <td class="table-td">
                                                    <div class="dropstart relative">
                                                    <button class="inline-flex items-center justify-center" type="button" id="tableDropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        <Icon class="text-xl ltr:ml-2 rtl:mr-2" icon="heroicons-outline:dots-vertical"/>
                                                    </button>
                                                    <ul class="dropdown-menu absolute z-[2] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-sm text-slate-700 shadow dark:bg-slate-700 dark:text-white">
                                                        <li>
                                                        <Link :href="'/shipping-companies/' + company.id"
                                                            class="flex w-full cursor-pointer items-center space-x-2 border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm capitalize  first:rounded-t last:mb-0 last:rounded-b hover:bg-slate-900 hover:text-white rtl:space-x-reverse dark:text-slate-300 dark:hover:bg-slate-600  dark:hover:bg-opacity-70">
                                                            <Icon icon="heroicons-outline:eye"/>
                                                            <span>View</span>
                                                        </Link>
                                                        </li>
                                                        <li>
                                                        <Link :href="'/shipping-companies/' + company.id + '/edit'"
                                                            class="flex w-full cursor-pointer items-center space-x-2 border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm capitalize first:rounded-t last:mb-0 last:rounded-b hover:bg-slate-900 hover:text-white rtl:space-x-reverse dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:bg-opacity-70">
                                                            <Icon icon="clarity:note-edit-line"/>
                                                            <span>Edit</span>
                                                        </Link>
                                                        </li>
                                                        <li>
                                                        <button @click="deleteConfirmation(company)"
                                                            class="flex w-full cursor-pointer items-center space-x-2 border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm capitalize first:rounded-t last:mb-0 last:rounded-b hover:bg-slate-900 hover:text-white rtl:space-x-reverse dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:bg-opacity-70">
                                                            <Icon icon="fluent:delete-28-regular"/>
                                                            <span>Delete</span>
                                                        </button>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </DefaultTemplate>
</template>
