<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" :src="campaign.banner" alt="" v-if="campaign.banner">
                <img class="h-10 w-10 rounded-full" :src="'../storage/campaign_banners/place_holder.jpg'" alt="" v-else>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ campaign.id }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ campaign.title }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900" v-if="campaign.enabled == 0">True</div>
            <div class="text-sm text-gray-900" v-else>False</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ campaign.start_date }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ campaign.end_date }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ campaign.voucher_code }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a @click="edit_campaign()" href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
            <a @click="delete_campaign()" class="ml-4 text-red-600 hover:text-red-900">Delete</a>
        </td>
    </tr>
</template>

<script>

export default {
    props: ['campaign'],
    methods:
    {
        delete_campaign()
        {
            console.log('delete campaign');

            var config = {
            method: 'delete',
            url: 'http://127.0.0.1:8000/api/campaigns/delete_campaign/'+this.campaign.id,
            headers: 
            { 
                'Accept': 'application/json'
            }
            };

            axios(config).then(Response => 
            {
                console.log(Response);
                this.$emit('get_campaigns');
            }).catch(error => 
            {
                console.log(error);
            });
            
        },
        edit_campaign()
        {
            this.$emit('edit_campaign',this.campaign);
        }
        
    }
}
</script>
