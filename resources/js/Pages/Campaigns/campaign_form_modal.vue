<template>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-70 antialiased">
                <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl bg-gray-50">
                    <div class="flex flex-row justify-between p-4 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                        <p class="font-semibold text-gray-800">Campaign Form</p>
                        <svg class="w-6 h-6" @click="close_campaign_form()"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <div class="px-6 py-4 mx-2" v-if="campaign_form.id">
                        <label class="leading-loose">ID : {{ campaign_form.id }}</label>
                    </div>

                    <div class="px-6 py-4 mx-2">
                        <input type="file" name="banner" class="form-control-file" id="banner" @change="onFileChange">
                        <div>
                            <img class="m-auto max-h-60" :src="this.campaign_form.banner" v-if="campaign_form.banner">
                            <img class="m-auto max-h-60" :src="'../storage/campaign_banners/place_holder.jpg'" v-else>
                        </div>
                    </div>

                    <div class="px-6 py-4 mx-2">
                        <label class="leading-loose">title</label>
                        <input v-model="campaign_form.title" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full text-sm border-gray-300 rounded focus:outline-none text-gray-600">
                    </div>

                    <div class="flex flex-col px-6 pb-4">
                        <div class="items-center flex">      
                            <div class="flex-1 mx-2">
                                <label class="leading-loose">start_date</label>
                                <input v-model="campaign_form.start_date" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full text-sm border-gray-300 rounded focus:outline-none text-gray-600" placeholder="2021-05-01">
                            </div>

                            <div class="flex-1 mx-2">
                                <label class="leading-loose">end_date</label>
                                <input v-model="campaign_form.end_date" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full text-sm border-gray-300 rounded focus:outline-none text-gray-600" placeholder="2021-05-01">
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 mx-2">
                        <label class="leading-loose">voucher</label>
                        <input v-model="campaign_form.voucher_code" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full text-sm border-gray-300 rounded focus:outline-none text-gray-600">
                    </div>
                    <div class="flex flex-row items-center justify-between p-4 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">
                        <p class="font-semibold text-gray-600" @click="close_campaign_form()">Cancel</p>
                        <button class="px-4 py-1 text-white font-semibold bg-blue-500 rounded" @click=" campaign_form.id ? update_campaign_form() : save_campaign_form()">Save</button>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>

export default {
    props: ['campaign_form'],
    data: function () 
    {
        return {
            campaign_form:this.campaign_form
        }
    },
    methods:
    {
        close_campaign_form()
        {
            this.campaign_form =
            {
                title:null,
                banner:null,
                start_date:null,
                end_date:null,
                voucher_code:null
            }

            this.$emit('close_campaign_form');
        },
        save_campaign_form()
        {
            this.$emit('save_campaign_form', this.campaign_form);
            this.close_campaign_form();
        },
        update_campaign_form()
        {
            this.$emit('update_campaign_form', this.campaign_form);
            this.close_campaign_form();
        },
        onFileChange(e) 
        {
            const file = e.target.files[0];
            this.campaign_form.banner_file = e.target.files[0];

            this.campaign_form.banner = URL.createObjectURL(file);
        }
    }
}
</script>
