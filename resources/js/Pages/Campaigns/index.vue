<template>
    <app-layout>

        <campaignFormModal v-if="isOpen" :campaign_form="campaign_form" 
                            @close_campaign_form="close_campaign_form" 
                            @save_campaign_form="save_campaign_form"
                            @update_campaign_form="update_campaign_form"> 
        </campaignFormModal>

        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Campaigns
                </h2>

                <div class="text-xl text-gray-800 leading-tight ml-auto">
                    <div class="w-max inline">
                        <a class="px-5 py-2 text-xs font-medium text-center text-white uppercase transition bg-gray-500 border-3 border-gray-500 rounded ripple hover:bg-gray-400 focus:outline-none" @click="new_campaign()">add a new campaign</a>
                    </div>
                </div>
            </div>

        </template>

        <div class="bg-white shadow overflow-hidden sm:rounded w-10/12 m-auto mt-6">
            <div class="flex flex-col m-4">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200 border-t-2 border-b-2">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th>

                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Campaign Id
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Enabled
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Start Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            End Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Voucher
                                        </th>

                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200" v-for="(campaign,index) in campaigns" :key="index">
                                    
                                    <campaignRow :campaign="campaign" @get_campaigns="get_campaigns" @edit_campaign="edit_campaign">
                                    </campaignRow>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import campaignRow from '@/Pages/Campaigns/campaignRow';
    import campaignFormModal from '@/Pages/Campaigns/campaign_form_modal';

    export default {
        props: ['campaigns'],
        data() {
            return {
                isOpen:false,
                campaigns:this.campaigns,
                campaign_form:
                {
                    title:null,
                    banner:null,
                    start_date:null,
                    end_date:null,
                    voucher:null
                }
            }
    
        },
        components: {
            AppLayout,
            Welcome,
            campaignRow,
            campaignFormModal
        },
        beforeMount()
        {
            this.get_campaigns()
        },
        methods:
        {
            get_campaigns()
            {
                var config = {
                method: 'get',
                url: 'http://127.0.0.1:8000/api/campaigns/get_campaigns',
                headers: 
                { 
                    'Accept': 'application/json'}
                };

                axios(config).then(Response =>
                {
                    this.campaigns = Response.data;
                }).catch(error => 
                {
                    console.log(error);
                });
            },
            new_campaign()
            {
                this.isOpen = true;
                this.campaign_form =
                {
                    title:null,
                    banner:null,
                    start_date:null,
                    end_date:null,
                    voucher_code:null
                }
            },
            edit_campaign(campaign)
            {   
                console.log(campaign);
                this.campaign_form = campaign;
                this.isOpen = true;
            },
            close_campaign_form()
            {
                this.isOpen = false;
            },
            save_campaign_form(campaign)
            {
                this.close_campaign_form();

                let formData = new FormData();

                formData.append("title", campaign.title);
                formData.append("banner_file", campaign.banner_file);
                formData.append("start_date", campaign.start_date);
                formData.append("end_date", campaign.end_date);
                formData.append("voucher_code", campaign.voucher_code);

                var config = {
                method: 'post',
                url: 'http://127.0.0.1:8000/api/campaigns/add_campaign',
                headers: 
                { 
                    'Accept': 'application/json'
                },
                data:formData
                };

                axios(config).then(Response => 
                {
                    console.log(Response);
                    this.get_campaigns();
                }).catch(error => 
                {
                    console.log(error);
                });
            },
            update_campaign_form(campaign)
            {
                this.close_campaign_form();

                let formData = new FormData();

                formData.append("id", campaign.id);
                formData.append("title", campaign.title);
                formData.append("banner_file", campaign.banner_file);
                formData.append("start_date", campaign.start_date);
                formData.append("end_date", campaign.end_date);
                formData.append("voucher_code", campaign.voucher_code);

                var config = {
                method: 'post',
                url: 'http://127.0.0.1:8000/api/campaigns/update_campaign',
                headers: 
                { 
                    'Accept': 'application/json'
                },
                    data:formData
                };

                axios(config).then(Response => 
                {
                    console.log(Response);
                    this.get_campaigns();
                }).catch(error => 
                {
                    console.log(error);
                });
            }
        }
    }
</script>
